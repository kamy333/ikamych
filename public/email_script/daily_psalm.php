<?php
// Original location: Inspinia/papa/email/daily_psalm.php
header('Content-Type: text/html; charset=utf-8');
require_once(__DIR__ . '/../../includes/initialize.php');

require_configured_get_token('DAILY_PSALM_TOKEN');

function daily_psalm_lines(array $data, string $key, string $fallback): string
{
    if (!isset($data[$key]) || !is_array($data[$key]) || empty($data[$key])) {
        return h($fallback);
    }

    return implode("<br>", array_map(function ($line) {
        return h(daily_psalm_clean_text((string)$line));
    }, $data[$key]));
}

function daily_psalm_clean_text(string $line): string
{
    $line = html_entity_decode($line, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $line = strip_tags($line);
    $line = preg_replace('/[\x{2009}\x{200A}\x{200B}]+/u', ' ', $line) ?? $line;
    $line = preg_replace('/[ \t]+/u', ' ', $line) ?? $line;

    return trim($line);
}

function daily_psalm_link(string $url, string $label): string
{
    return "<a href='" . h($url) . "' target='_blank' rel='noopener noreferrer'>" . h($label) . "</a>";
}

$psalmNumber = random_int(1, 150);

$sefariaUrl = "https://www.sefaria.org/api/texts/Psalms.$psalmNumber?lang=he&commentary=0&context=0";
$context = stream_context_create([
    'http' => [
        'timeout' => 15,
    ],
]);

$response = @file_get_contents($sefariaUrl, false, $context);
if ($response === false) {
    http_response_code(502);
    echo "Failed to fetch psalm from Sefaria.";
    exit;
}

$data = json_decode($response, true);
if (!is_array($data)) {
    http_response_code(502);
    echo "Failed to decode psalm response.";
    exit;
}

$hebrew = daily_psalm_lines($data, 'he', 'Texte hébreu indisponible.');
$english = daily_psalm_lines($data, 'en', 'English text unavailable.');
$englishLink = daily_psalm_link("https://www.sefaria.org/Psalms.$psalmNumber?lang=en", "Psalm $psalmNumber (English)");
$commentaryLink = daily_psalm_link("https://www.sefaria.org/Psalms.$psalmNumber.1?with=Rashi&lang=bi", "Rashi commentary on Sefaria");
$transliterationLink = daily_psalm_link("https://theisraelbible.com/bible/psalms-$psalmNumber/", "Psaume $psalmNumber (Hébreu)");
$hatikvahLink = daily_psalm_link("https://www.youtube.com/watch?v=1DPqNHkm1bM", "Hatikvah");

$senderName = 'Psaume du jour - ikamy.ch';
$subject = "Psaume du jour - Psaume $psalmNumber";
$body = "
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <title>" . h($subject) . "</title>
</head>
<body>
    <h2>" . h($subject) . "</h2>

    <h3>Texte en hébreu :</h3>
    <p style='direction: rtl; text-align: right; font-family: serif; margin-right: 200px; font-size: 24px;'>$hebrew</p>

    <h3>Commentary :</h3>
    <p>$commentaryLink</p>

    <h3>English:</h3>
    <p>$english</p>
    <p>$englishLink</p>

    <h3>Transliteration:</h3>
    <p>$transliterationLink</p>

    <h3>$hatikvahLink</h3>

    <h3>Français :</h3>
    <p>Traduction française indisponible pour ce psaume pour le moment.</p>

    <p><em>Envoyé automatiquement par votre script PHP quotidien.</em></p>
</body>
</html>
";

$mail = new MyPHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setFrom($mail->From, $senderName, false);
$mail->addAddress('nafisspour@bluewin.ch');
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AltBody = "Psaume du jour - Psaume $psalmNumber";

try {
    $mail->send();
    echo "<pre>Email sent with Psalm " . h($psalmNumber) . ".</pre>";
} catch (Throwable $e) {
    error_log('Daily psalm email error: ' . $e->getMessage());
    http_response_code(500);
    echo "Email could not be sent.";
}

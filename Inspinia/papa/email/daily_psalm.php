<?php
// Set content type for HTML email (if testing in browser)
header('Content-Type: text/html; charset=utf-8');

// Generate a random psalm number between 1 and 150
$psalmNumber = rand(1, 150);

// Build Sefaria API URL
$sefariaUrl = "https://www.sefaria.org/api/texts/Psalms.$psalmNumber?lang=he&commentary=0&context=0";


$sefariaLink = "https://www.sefaria.org/Psalms.$psalmNumber.1?with=Rashi&lang=bi";


// Get content from the API
$response = file_get_contents($sefariaUrl);
if (!$response) {
    die("Failed to fetch psalm from Sefaria.");
}
$data = json_decode($response, true);

// Extract Hebrew and English
$hebrew = isset($data['he']) ? implode("<br>", $data['he']) : "Texte hébreu indisponible.";
$english = isset($data['en']) ? implode("<br>", $data['en']) : "English text unavailable.";

// Optional: Hebrew (placeholder)
$english.="<br><br><a href='https://www.sefaria.org/Psalms.$psalmNumber?lang=en'>Psalm $psalmNumber (English)</a>";

$rachi="<a href='$sefariaLink' target='_blank'>Rachi commentary of Psalm  $psalmNumber; on Sefaria</a>";

$transliteration="Transliteration unavailable for this psalm.";
$transliteration_link="<a href='https://theisraelbible.com/bible/psalms-{$psalmNumber}/'>Psaume $psalmNumber (Hébreu)</a>";

// Optional: French (placeholder)
$french = "Traduction française indisponible pour ce psaume pour le moment.";

$hatikvah_link='<a href="https://www.youtube.com/watch?v=1DPqNHkm1bM">Hativah</a>';

$hatikvah = "
<table style='width: 100%; border: 1px solid black'>
    <tr>
            <td style='border: 1px solid black; text-align: center;width: 40%; font-size: x-large'>
            <div lang='hebrew' dir='rtl'>
                <h2>התקווה</h2>
                <p>כל עוד בלבב פנימה,</p>
                <p>נפש יהודי הומיה,</p>
                <p>ולפאתי מזרח קדימה,</p>
                <p>עין לציון צופיה.</p>

                <p>עוֹד לֹא אָבְדָה תִּקְוָתֵנוּ,</p>
                <p>הַתִּקְוָה בַּת שְׁנוֹת אַלְפַּיִם,</p>
                <p>לִהְיוֹת עַם חָפְשִׁי בְּאַרְצֵנוּ,</p></p>
                <p>אֶרֶץ צִיּוֹן וִירוּשָׁלַיִם.</p>

            </div>
        </td>
        
        <td style='border: 1px solid black;text-align: center;width: 30%;'>
        <div lang='french' dir='ltr'>
        <h2>Hativah</h2>
            <p>Aussi longtemps qu’au fond du cœur
            <p>L \’âme juive vibre,
            <p>Vers les confins de l’Orient
            <p>Un œil sur Sion observe.
            <p>Nous n’avons pas encore perdu notre espoir
            <p>Vieux de deux mille ans,
            <p>De vivre en peuple libre sur notre terre,
            <p>Terre de Sion et de Jérusalem.
            <p>Vivre en peuple libre sur notre terre,
            <p>Terre de Sion et de Jérusalem.</p>
</div>
</td>
        <td style='border: 1px solid black; text-align: center; width: 30%;'>
            <div lang='english' dir='ltr'>
                <h2>Hatikvah</h2>
                <p>As long as in the heart within,</p>
                <p>The Jewish soul yearns,</p>
                <p>And forward, to the East,</p>
                <p>To Zion, an eye looks.</p>

                <p>Our hope is not yet lost,</p>
                <p>It is two thousand years old,</p>
                <p>To be a free nation in our land,</p>
                <p>The land of Zion and Jerusalem.</p>
            </div>
        </td>

    </tr>
</table>
";


// Compose email content
$subject = "🕊 Psaume du jour – Psaume $psalmNumber";
$body = "
<h2>$subject</h2>
<h3>📜 Texte en hébreu :</h3>
<p style='direction: rtl; text-align: right; font-family: serif; margin-right: 200px; font-size: 24px;''>$hebrew</p>

<h3>🔍 Rabbi commentary :</h3>
<p>👉 $rachi</p>

<h3>🇬🇧 English:</h3>
<p>$english</p>

<h3>🔍 $transliteration:</h3>
<p>👉 $transliteration_link</p>

<h3>$hatikvah_link</h3>
$hatikvah

<h3>🇫🇷 Français :</h3>
<p>$french</p>


<p><em>Envoyé automatiquement par votre script PHP quotidien.</em></p>
";



// Email settings
$to = "nafisspour@bluewin.ch"; // ← Replace with your email
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: Psaumes Automatique <no-reply@yourdomain.com>\r\n";

// Send the email
mail($to, $subject, $body, $headers);

// Optional: echo if running in browser
echo "<pre>Email sent with Psalm $psalmNumber.</pre>";
?>

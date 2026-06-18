<?php

class CalendarEmail
{
    public static function send_current_planning()
    {
        global $server_local_names;

        if (isset($server_local_names) && in_array($_SERVER['SERVER_NAME'], $server_local_names, true)) {
            return '';
        }

        $kamy = User::find_by_username("kamy");
        if (!$kamy || empty($kamy->email)) {
            return '';
        }

        $is_past = static::is_past_mode();
        $sections = static::sections($is_past);

        $mail = new MyPHPMailer();
        $mail->addAddress($kamy->email, $kamy->nom);
        $mail->Subject = static::subject($is_past);
        $mail->isHTML(true);
        $mail->Body = static::render($sections, $is_past);
        $mail->AltBody = static::render_text($sections, $is_past);

        if (!$mail->send()) {
            echo "Calendar Email Error: " . $mail->ErrorInfo;
        }

        return $mail->Body;
    }

    public static function preview_current_planning()
    {
        $is_past = static::is_past_mode();

        return static::render(static::sections($is_past), $is_past);
    }

    private static function is_past_mode()
    {
        return isCalendarPast();
    }

    private static function subject($is_past)
    {
        [$date] = Calendar::basic_values();

        if ($is_past) {
            return "ATTENTION: Past Planning " . $date->format('l d.m.Y');
        }

        return "Planning " . $date->format('l d.m.Y');
    }

    private static function sections($is_past)
    {
        [$date, $dtTime, $dt, $datetomorrow, $tomorrow, $hour_minus_1, $hour_add_1, $hour_minus_1_comp, $hour_add_1_comp, $date_after_tomorrow, $after_tomorrow] = Calendar::basic_values();

        if ($is_past) {
            return [
                [
                    'title' => "ATTENTION: Past appointments before " . $date->format('l d.m.Y'),
                    'appointments' => Calendar::find_by_sql_prepared(
                        "SELECT * FROM calendar WHERE start_date < ? ORDER BY start_datetime DESC",
                        [$dt],
                        "s"
                    ),
                    'tone' => 'danger',
                ],
            ];
        }

        return [
            [
                'title' => "Coming up now",
                'appointments' => Calendar::find_by_sql_prepared(
                    "SELECT * FROM calendar WHERE start_datetime >= ? AND start_datetime < ? ORDER BY start_datetime",
                    [$hour_minus_1_comp, $hour_add_1_comp],
                    "ss"
                ),
                'tone' => 'soon',
            ],
            [
                'title' => "Today " . $date->format('l d.m.Y'),
                'appointments' => Calendar::find_by_sql_prepared(
                    "SELECT * FROM calendar WHERE start_date = ? ORDER BY start_datetime",
                    [$dt],
                    "s"
                ),
                'tone' => 'today',
            ],
            [
                'title' => "Tomorrow " . $datetomorrow->format('l d.m.Y'),
                'appointments' => Calendar::find_by_sql_prepared(
                    "SELECT * FROM calendar WHERE start_date = ? ORDER BY start_datetime",
                    [$tomorrow],
                    "s"
                ),
                'tone' => 'tomorrow',
            ],
            [
                'title' => "Upcoming in the future",
                'appointments' => Calendar::find_by_sql_prepared(
                    "SELECT * FROM calendar WHERE start_datetime >= ? ORDER BY start_datetime",
                    [$after_tomorrow],
                    "s"
                ),
                'tone' => 'future',
            ],
        ];
    }

    private static function render(array $sections, $is_past)
    {
        [$date] = Calendar::basic_values();
        $count = static::appointment_count($sections);
        $preheader = $count . " calendar item" . ($count === 1 ? "" : "s") . " ready for review.";

        $body = "<!doctype html><html><head><meta charset='UTF-8'><meta name='viewport' content='width=device-width, initial-scale=1.0'></head>";
        $body .= "<body style='margin:0;background:#f5f7fb;color:#172033;font-family:Arial,Helvetica,sans-serif;'>";
        $body .= "<div style='display:none;max-height:0;overflow:hidden;color:#f5f7fb;line-height:1px;opacity:0;'>" . h($preheader) . "</div>";
        $body .= "<table role='presentation' width='100%' cellspacing='0' cellpadding='0' style='width:100%;background:#f4f7fb;padding:12px 8px;'>";
        $body .= "<tr><td align='center'>";
        $body .= "<table role='presentation' width='680' cellspacing='0' cellpadding='0' style='width:100%;max-width:680px;background:#ffffff;border:1px solid #dfe5ef;border-radius:12px;overflow:hidden;'>";
        $body .= static::render_header($date, $count, $is_past);
        $body .= "<tr><td style='padding:12px 14px 6px 14px;'>";

        foreach ($sections as $section) {
            if (empty($section['appointments'])) {
                continue;
            }

            $body .= static::render_section($section, $is_past);
        }

        if ($count === 0) {
            $body .= static::render_empty_state();
        }

        $body .= "</td></tr>";
        $body .= static::render_footer();
        $body .= "</table>";
        $body .= "</td></tr>";
        $body .= "</table>";
        $body .= "</body></html>";

        return $body;
    }

    private static function render_header(DateTimeImmutable $date, $count, $is_past)
    {
        $calendar_url = SITE_URL . "/public/calendar.php";
        $logo = defined('IKAMY_LOGO_NAV_COMPACT_URL') ? IKAMY_LOGO_NAV_COMPACT_URL : (defined('IKAMY_LOGO_NAV_URL') ? IKAMY_LOGO_NAV_URL : '');
        $heading = static::subject($is_past);
        $subheading = "Geneva " . $date->format('l d.m.Y H:i');
        $header_background = $is_past ? "#b42318" : "#075985";

        $output = "<tr><td style='background:" . h($header_background) . ";padding:8px 12px;color:#ffffff;'>";
        $output .= "<table role='presentation' width='100%' cellspacing='0' cellpadding='0'><tr>";
        $output .= "<td style='vertical-align:middle;width:38px;padding-right:9px;'>";
        if ($logo !== '') {
            $output .= "<img src='" . h($logo) . "' alt='ikamy.ch' width='32' style='display:block;width:32px;max-width:32px;height:auto;margin:0;'>";
        }
        $output .= "</td>";
        $output .= "<td style='vertical-align:middle;padding-right:10px;'>";
        $output .= "<div style='font-size:17px;line-height:21px;font-weight:700;color:#ffffff;white-space:nowrap;'>" . h($heading) . " <span style='font-size:12px;font-weight:400;color:#dbeafe;'>(" . h($count) . ")</span> <span style='font-size:12px;line-height:16px;font-weight:400;color:#e0f2fe;white-space:nowrap;'>" . h($subheading) . "</span></div>";
        $output .= "</td>";
        $output .= "<td align='right' style='vertical-align:middle;width:122px;font-size:0;white-space:nowrap;'>";
        $output .= "<a href='" . h($calendar_url) . "' style='display:inline-block;padding:7px 10px;border-radius:7px;background:#ffffff;color:" . h($header_background) . ";font-size:12px;line-height:15px;font-weight:700;text-decoration:none;'>Open calendar</a>";
        $output .= "</td></tr></table>";
        $output .= "</td></tr>";

        return $output;
    }

    private static function render_toolbar()
    {
        $add_url = SITE_URL . "/public/admin/crud/ajax/new_ajax.php?class_name=Calendar";
        $calendar_url = SITE_URL . "/public/calendar.php";
        $past_url = isCalendarPast() ? $calendar_url : SITE_URL . "/public/calendar.php?type=Past";
        $past_label = isCalendarPast() ? "View future" : "View past";

        $output = "";
        $output .= static::button($add_url, "Add event", "#0891b2", "#ffffff", "#7dd3fc");
        $output .= static::button($calendar_url, "Web", "#ffffff", "#075985", "#7dd3fc");
        $output .= static::button($past_url, $past_label, "#ffffff", "#be185d", "#f9a8d4");

        return $output;
    }

    private static function render_section(array $section, $is_past)
    {
        $appointments = $section['appointments'];
        $count = count($appointments);
        $accent = static::tone_color($section['tone']);
        $section_background = $is_past ? "#fff1f2" : "#f8fafc";
        $section_text = $is_past ? "#991b1b" : "#172033";

        $output = "<table role='presentation' width='100%' cellspacing='0' cellpadding='0' style='margin:0 0 12px 0;border:1px solid #dfe5ef;border-radius:9px;overflow:hidden;'>";
        $output .= "<tr><td style='padding:9px 11px;background:" . h($section_background) . ";border-left:5px solid " . h($accent) . ";'>";
        $output .= "<h2 style='margin:0;color:" . h($section_text) . ";font-size:15px;line-height:19px;font-weight:800;'>" . h($section['title']) . " <span style='color:#637083;font-weight:400;'>(" . h($count) . ")</span></h2>";
        $output .= "</td></tr>";

        $date_counts = static::date_counts($appointments);
        $current_date = "";

        foreach ($appointments as $index => $appointment) {
            if ($current_date !== $appointment->start_date) {
                $current_date = $appointment->start_date;
                $output .= static::render_date_group($current_date, $date_counts[$current_date] ?? 0, $accent, $is_past);
            }

            $output .= static::render_appointment($appointment, $accent, $is_past);
            if ($index !== $count - 1) {
                $output .= "<tr><td style='height:5px;line-height:5px;font-size:0;background:#ffffff;border-top:1px solid #ffffff;border-bottom:1px solid #ffffff;'>&nbsp;</td></tr>";
            }
        }

        $output .= "</table>";

        return $output;
    }

    private static function render_date_group($start_date, $count, $accent, $is_past)
    {
        $date = date_create($start_date);
        $date_text = $date ? $date->format('l d.m.Y') : (string)$start_date;
        $offset = static::day_offset($start_date, date_sql(), static::tomorrow_sql());
        $count_text = " (" . $count . ")";
        $background = $is_past ? "#fee2e2" : "#eef4fb";
        $text_color = $is_past ? "#991b1b" : "#172033";

        return "<tr><td style='padding:7px 10px;background:" . h($background) . ";border-top:1px solid #dfe5ef;border-left:5px solid " . h($accent) . ";color:" . h($text_color) . ";font-size:13px;line-height:17px;font-weight:800;'>" . h($date_text) . " <span style='color:" . h($text_color) . ";font-weight:500;'>" . h($offset) . h($count_text) . "</span></td></tr>";
    }

    private static function render_appointment($appointment, $accent, $is_past)
    {
        [$date, $dtTime, $dt, $datetomorrow, $tomorrow, $hour_minus_1, $hour_add_1, $hour_minus_1_comp, $hour_add_1_comp] = Calendar::basic_values();

        $appointment_id = (int)$appointment->id;
        $person = static::person_label($appointment->person);
        $palette = static::person_palette($person);
        $start = static::format_start($appointment);
        $end = static::format_end($appointment);
        $offset = static::day_offset($appointment->start_date, $dt, $tomorrow);
        $status = $is_past ? "Past" : static::status_label($appointment, $dtTime, $dt, $hour_minus_1_comp, $hour_add_1_comp);
        $edit_url = SITE_URL . "/public/admin/crud/ajax/edit_ajax.php?class_name=Calendar&id=" . u($appointment_id);
        $delete_url = SITE_URL . "/public/admin/crud/ajax/delete_ajax.php?class_name=Calendar&id=" . u($appointment_id) . "&return_to=" . u("/public/calendar.php");

        $output = "<tr><td style='padding:8px 10px;border-top:1px solid #e8edf5;background:" . h($palette['background']) . ";border-left:5px solid " . h($palette['border']) . ";'>";
        $output .= "<table role='presentation' width='100%' cellspacing='0' cellpadding='0'><tr>";
        $output .= "<td style='vertical-align:top;padding-right:8px;'>";
        $output .= "<div style='font-size:15px;line-height:19px;font-weight:800;color:#020617;margin-bottom:3px;'>";
        $output .= "<a href='" . h($edit_url) . "' style='display:inline-block;color:" . h($palette['person']) . ";border:1px solid " . h($palette['border']) . ";border-radius:4px;padding:1px 5px;font-size:11px;font-weight:800;line-height:14px;vertical-align:1px;text-decoration:none;'>" . h($person) . "</a> ";
        $output .= h($appointment->title);
        if ($status !== '') {
            $status_color = $is_past ? "#b42318" : $accent;
            $output .= " <span style='display:inline-block;background:" . h($status_color) . ";color:#ffffff;border-radius:4px;padding:1px 5px;font-size:10px;font-weight:700;line-height:13px;vertical-align:1px;'>" . h($status) . "</span>";
        }
        $output .= "</div>";
        $output .= "<div style='font-size:12px;line-height:16px;color:#020617;'><strong>" . h($start) . "</strong>" . h($end) . " <span style='color:#020617;'>" . h($offset) . "</span></div>";
        if (!empty($appointment->comment)) {
            $output .= "<div style='margin-top:6px;padding:5px 0 2px 9px;border-left:3px solid " . h($palette['border']) . ";color:#020617;font-size:12px;line-height:16px;'>" . static::render_comment($appointment->comment, $palette) . "</div>";
        }
        $output .= "</td>";
        $output .= "<td align='right' style='vertical-align:top;width:118px;padding:2px 2px 0 8px;'>";
        $output .= "<table role='presentation' cellspacing='0' cellpadding='0' style='margin-left:auto;'><tr>";
        $output .= "<td style='padding-right:6px;'>" . static::icon_button($edit_url, "Edit", "edit", "#0f766e") . "</td>";
        $output .= "<td>" . static::icon_button($delete_url, "Delete", "delete", "#dc2626") . "</td>";
        $output .= "</tr></table>";
        $output .= "</td>";
        $output .= "</tr></table>";
        $output .= "</td></tr>";

        return $output;
    }

    private static function render_empty_state()
    {
        $output = "<table role='presentation' width='100%' cellspacing='0' cellpadding='0' style='margin:0 0 20px 0;border:1px solid #dfe5ef;border-radius:10px;background:#ffffff;'>";
        $output .= "<tr><td style='padding:28px 22px;text-align:center;color:#435166;'>";
        $output .= "<div style='font-size:18px;font-weight:700;color:#172033;margin-bottom:8px;'>No calendar items found</div>";
        $output .= "<div style='font-size:14px;line-height:20px;'>There are no appointments in this calendar view.</div>";
        $output .= "</td></tr></table>";

        return $output;
    }

    private static function render_footer()
    {
        $output = "<tr><td style='padding:18px 24px;background:#f8fafc;border-top:1px solid #dfe5ef;color:#6b7788;font-size:12px;line-height:18px;'>";
        $output .= "Buttons open protected ikamy.ch pages. You may need to log in before editing or deleting a calendar item.";
        $output .= "</td></tr>";

        return $output;
    }

    private static function button($url, $label, $background, $color, $border)
    {
        return "<a href='" . h($url) . "' style='display:inline-block;margin:0 5px 5px 0;padding:6px 9px;border-radius:6px;border:1px solid " . h($border) . ";background:" . h($background) . ";color:" . h($color) . ";font-size:12px;line-height:15px;font-weight:700;text-decoration:none;'>" . h($label) . "</a>";
    }

    private static function small_button($url, $label, $background, $color, $border)
    {
        return "<a href='" . h($url) . "' style='display:block;margin:0 0 5px auto;padding:6px 9px;border:0;outline:0;border-radius:0;background:" . h($background) . ";color:" . h($color) . ";font-size:11px;line-height:14px;font-weight:700;text-align:center;text-decoration:none;box-shadow:none;'>" . h($label) . "</a>";
    }

    private static function icon_button($url, $label, $icon, $color)
    {
        return "<a href='" . h($url) . "' title='" . h($label) . "' aria-label='" . h($label) . "' style='display:inline-block;min-width:48px;padding:7px 9px;border:1px solid rgba(255,255,255,0.9);border-radius:6px;background:#ffffff;color:" . h($color) . ";text-align:center;text-decoration:none;line-height:15px;box-shadow:none;'>" . static::svg_icon($icon, $color) . "<span style='font-size:11px;line-height:15px;font-weight:800;color:" . h($color) . ";vertical-align:middle;'>" . h($label) . "</span></a>";
    }

    private static function svg_icon($icon, $color)
    {
        $safe_color = h($color);

        if ($icon === "delete") {
            return "<svg width='13' height='13' viewBox='0 0 24 24' aria-hidden='true' style='display:inline-block;vertical-align:-2px;margin-right:3px;' fill='none' stroke='" . $safe_color . "' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round'><path d='M3 6h18'/><path d='M8 6V4h8v2'/><path d='M19 6l-1 16H6L5 6'/><path d='M10 11v6'/><path d='M14 11v6'/></svg>";
        }

        return "<svg width='13' height='13' viewBox='0 0 24 24' aria-hidden='true' style='display:inline-block;vertical-align:-2px;margin-right:3px;' fill='none' stroke='" . $safe_color . "' stroke-width='2.2' stroke-linecap='round' stroke-linejoin='round'><path d='M12 20h9'/><path d='M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4 12.5-12.5z'/></svg>";
    }

    private static function tone_color($tone)
    {
        switch ($tone) {
            case 'danger':
                return '#b42318';
            case 'soon':
                return '#0f766e';
            case 'today':
                return '#1c3f5f';
            case 'tomorrow':
                return '#7c5800';
            default:
                return '#4f46e5';
        }
    }

    private static function person_label($person)
    {
        if (strtolower((string)$person) === "mum" || (string)$person === "1") {
            return "Mum";
        }

        return "Kamy";
    }

    private static function person_palette($person)
    {
        if ($person === "Mum") {
            return [
                'background' => '#f65aa8',
                'border' => '#db2777',
                'person' => '#be185d',
            ];
        }

        return [
            'background' => '#00dce3',
            'border' => '#0891b2',
            'person' => '#075985',
        ];
    }

    private static function render_comment($comment, array $palette)
    {
        $comment = trim((string)$comment);
        if ($comment === '') {
            return '';
        }

        $parts = preg_split('/(https?:\/\/[^\s<]+)/i', $comment, -1, PREG_SPLIT_DELIM_CAPTURE);
        if ($parts === false) {
            return nl2br(h($comment));
        }

        $output = '';
        foreach ($parts as $part) {
            if ($part === '') {
                continue;
            }

            if (preg_match('/^https?:\/\//i', $part)) {
                $url = rtrim($part, ".,);]");
                $trailing = substr($part, strlen($url));
                $output .= "<a href='" . h($url) . "' style='color:" . h($palette['person']) . ";font-weight:800;text-decoration:underline;'>" . h(static::link_label($url)) . "</a>" . h($trailing);
            } else {
                $output .= nl2br(h($part));
            }
        }

        return $output;
    }

    private static function link_label($url)
    {
        $parts = parse_url($url);
        $host = strtolower($parts['host'] ?? '');
        $host = preg_replace('/^www\./', '', $host);

        if ($host === '') {
            return 'Open link';
        }

        if (strpos($host, 'google.') !== false) {
            $query = [];
            if (!empty($parts['query'])) {
                parse_str($parts['query'], $query);
            }

            if (!empty($query['q'])) {
                return 'Google: ' . static::short_text(str_replace('+', ' ', (string)$query['q']), 42);
            }

            return 'Google link';
        }

        $label = $host;
        if (!empty($parts['path']) && $parts['path'] !== '/') {
            $path = trim($parts['path'], '/');
            $path_parts = explode('/', $path);
            $last_path = end($path_parts);
            if ($last_path !== false && $last_path !== '') {
                $label .= ': ' . str_replace(['-', '_'], ' ', $last_path);
            }
        }

        return static::short_text($label, 46);
    }

    private static function short_text($text, $limit)
    {
        $text = trim(preg_replace('/\s+/', ' ', (string)$text));
        if (strlen($text) <= $limit) {
            return $text;
        }

        return substr($text, 0, $limit - 3) . '...';
    }

    private static function format_start($appointment)
    {
        $timestamp = strtotime($appointment->start_date . " " . $appointment->start_time);

        if ($timestamp === false) {
            return (string)$appointment->start_date . " " . (string)$appointment->start_time;
        }

        return date("l d.m.Y", $timestamp) . " @ " . date("H:i", $timestamp);
    }

    private static function format_end($appointment)
    {
        if (empty($appointment->end_time) || $appointment->end_time === "00:00:00") {
            return "";
        }

        $timestamp = strtotime($appointment->start_date . " " . $appointment->end_time);

        if ($timestamp === false) {
            return " to " . (string)$appointment->end_time;
        }

        return " to " . date("H:i", $timestamp);
    }

    private static function day_offset($start_date, $today, $tomorrow)
    {
        if ($start_date === $today) {
            return "Today";
        }

        if ($start_date === $tomorrow) {
            return "Tomorrow";
        }

        $date1 = date_create(date_sql());
        $date2 = date_create($start_date);

        if (!$date1 || !$date2) {
            return "";
        }

        return date_diff($date1, $date2)->format("%R%a days");
    }

    private static function tomorrow_sql()
    {
        $tomorrow = date_create(date_sql());
        if (!$tomorrow) {
            return "";
        }

        date_add($tomorrow, date_interval_create_from_date_string("1 day"));

        return date_format($tomorrow, "Y-m-d");
    }

    private static function date_counts(array $appointments)
    {
        $counts = [];

        foreach ($appointments as $appointment) {
            $date = (string)$appointment->start_date;
            if (!isset($counts[$date])) {
                $counts[$date] = 0;
            }
            $counts[$date]++;
        }

        return $counts;
    }

    private static function status_label($appointment, $now, $today, $hour_minus_1_comp, $hour_add_1_comp)
    {
        $appointment_datetime = $appointment->start_date . " " . $appointment->start_time;

        if ($appointment->start_date !== $today || $appointment_datetime < $hour_minus_1_comp || $appointment_datetime > $hour_add_1_comp) {
            return "";
        }

        return $appointment_datetime < $now ? "In past" : "Coming up";
    }

    private static function appointment_count(array $sections)
    {
        $count = 0;

        foreach ($sections as $section) {
            $count += empty($section['appointments']) ? 0 : count($section['appointments']);
        }

        return $count;
    }

    private static function render_text(array $sections, $is_past)
    {
        $lines = [];
        $lines[] = static::subject($is_past);
        $lines[] = SITE_URL . "/public/calendar.php";
        $lines[] = "";

        foreach ($sections as $section) {
            if (empty($section['appointments'])) {
                continue;
            }

            $lines[] = $section['title'] . " (" . count($section['appointments']) . ")";
            foreach ($section['appointments'] as $appointment) {
                $lines[] = "- " . static::person_label($appointment->person) . ": " . $appointment->title . " - " . static::format_start($appointment) . static::format_end($appointment);
            }
            $lines[] = "";
        }

        if (count($lines) === 3) {
            $lines[] = "No calendar items found.";
        }

        return implode("\n", $lines);
    }
}

<?php
function roundToNearestFiveMinutes($time) {
    // Split the input time into hours and minutes
    list($hours, $minutes) = explode(':', $time);

    // Convert to integers
    $hours = (int)$hours;
    $minutes = (int)$minutes;

    // Round minutes to the nearest 5
    $roundedMinutes = round($minutes / 5) * 5;

    // Handle edge case where minutes round to 60
    if ($roundedMinutes == 60) {
        $roundedMinutes = 0;
        $hours = ($hours + 1) % 24; // Increment hour, and roll over at 24 hours
    }

    // Format hours and minutes with leading zeros if needed
    $formattedHours = str_pad($hours, 2, '0', STR_PAD_LEFT);
    $formattedMinutes = str_pad($roundedMinutes, 2, '0', STR_PAD_LEFT);

    // Return the rounded time in 'HH:MM' format
    return $formattedHours . ':' . $formattedMinutes;
}
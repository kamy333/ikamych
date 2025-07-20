<?php $IS_PRODUCTION = false; ?>
<?php require_once('../../../includes/initialize.php'); ?>

<?php

if ($IS_PRODUCTION) {
    $secure_password = "myDoctoriswaiting";

// Security Check
    if (!isset($_GET['password']) || $_GET['password'] !== $secure_password) {
        http_response_code(403);
        die("Forbidden: Invalid Password.");
    }
}


// Load JSON content from file into a string
$jsonContent = file_get_contents('data_date anni_deces.json');



// Decode JSON into associative array
$data = json_decode($jsonContent, true);

// Check for errors
if (json_last_error() !== JSON_ERROR_NONE) {
    die("JSON Error: " . json_last_error_msg());
}

$todays_date = date("Y-m-d");

// Iterate through the array and print data
foreach ($data as $entry) {
    echo "Année Hébraïque 23 shevat veille du : " . $entry["hebrew_year"] . "<br>";
    echo "Date Grégorienne (approx.): " . $entry["Date Gregorian (approx.)"] . "<br><br>";

    // $entry["Date Gregorian (approx.)"] dd.mm.yyyy converrted to date format
    $entry_date = date_create_from_format("d.m.Y", $entry["Date Gregorian (approx.)"]);

    if ($entry["Date Gregorian (approx.)"] == $todays_date) {
        echo "Today is the anniversary of the death of " . $entry["Name"] . "<br>";
    }


}



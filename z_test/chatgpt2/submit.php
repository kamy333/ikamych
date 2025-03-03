<?php


// In submit.php
$country_name = $_POST['country'];     // The selected country name
$country_id = $_POST['country_id'];    // The selected country ID

// You can now store these values in the database or use them as needed
echo "Selected Country: " . $country_name . "<br>";
echo "Country ID: " . $country_id;


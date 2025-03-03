<?php
require_once('../../includes/initialize.php');

//if (isset($_GET['term'])) {
//    $searchTerm = $_GET['term'];
//    echo "Search term: " . $searchTerm;
//} else {
//    echo "No term provided.";
//}
//exit;

// Database connection
$host = DB_SERVER ; //'localhost';
$dbname = DB_NAME ;         //'your_database_name';
$username = DB_USER ;       // 'your_database_user';
$password = DB_PASS ;       //'your_database_password';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if there is a search term
    if (isset($_GET['term'])) {
        $term = '%' . $_GET['term'] . '%';

        // Prepare and execute SQL statement
        $stmt = $pdo->prepare("SELECT country_name FROM country WHERE country_name LIKE ?");
        $stmt->execute([$term]);

        // Fetch all results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return JSON response
        echo json_encode($results);
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}


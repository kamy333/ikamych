<?php
require_once('../../includes/initialize_transmed.php');

// Database connection
$host = DB_SERVER;
$dbname = DB_NAME;
$username = DB_USER;
$password = DB_PASS;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Check if there is a search term
    if (isset($_GET['field']) && isset($_GET['query'])) {
        $field = $_GET['field'];
        $query = $_GET['query'];

        if ($field === 'pseudo') {
//            $sql = "SELECT pseudo FROM DatabaseClient WHERE pseudo LIKE ?";
            $sql = "SELECT pseudo FROM DataBaseClient WHERE pseudo LIKE ?";
        } // Fetch data for 'depart' and 'arrivee' from DatabaseCourse table
        elseif ($field === 'depart_arrivee') {

            $sql = "
        SELECT location 
        FROM (
            SELECT DISTINCT `depart` AS location FROM `DatabaseCourse`
            UNION
            SELECT DISTINCT `arrivee` AS location FROM `DatabaseCourse`
        ) AS combined_locations
        WHERE location LIKE ?
        ORDER BY location;
";


        } // Fetch data for 'chauffeur' from chauffeurs table
        elseif ($field === 'chauffeur') {
            $sql = "SELECT chauffeur_name as chauffeur FROM chauffeurs WHERE chauffeur_name LIKE ?";
        }

        $term = '%' . $query . '%';

        // Prepare and execute SQL statement
        $stmt = $pdo->prepare($sql);

        $stmt->execute([$term]);

        // Fetch all results as an associative array
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Return JSON response
        echo json_encode($results);
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

















//
//$conn = new mysqli($host, $username, $password, $dbname);
//
//if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//}


//// Check if query parameters are set
//if (isset($_GET['field']) && isset($_GET['query'])) {
//    $field = $_GET['field'];
//    $query = $_GET['query'];
//
//    $response = [];
//
//    // Fetch data for the 'pseudo' field from the DatabaseClient table
//    if ($field === 'pseudo') {
//        $sql = "SELECT pseudo FROM DatabaseClient WHERE pseudo LIKE ?";
//    } // Fetch data for 'depart' and 'arrivee' from DatabaseCourse table
//    elseif ($field === 'depart_arrivee') {
//        $sql = "SELECT DISTINCT depart FROM DatabaseCourse WHERE depart LIKE ? UNION SELECT DISTINCT arrivee FROM DatabaseCourse WHERE arrivee LIKE ?";
//    } // Fetch data for 'chauffeur' from chauffeurs table
//    elseif ($field === 'chauffeur') {
//        $sql = "SELECT name FROM chauffeurs WHERE name LIKE ?";
//    }
//
//    if ($stmt = $conn->prepare($sql)) {
//        $likeQuery = "%" . $query . "%";
//        $stmt->bind_param("s", $likeQuery);
//        $stmt->execute();
//        $result = $stmt->get_result();
//
//        while ($row = $result->fetch_assoc()) {
//            $response[] = $row['pseudo'] ?? $row['depart'] ?? $row['name'];
//        }
//        echo json_encode($response);
//    }
//    $stmt->close();
//}
//$conn->close();


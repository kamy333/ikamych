<?php
require_once 'lib/functions.php';
$mytime = roundToNearestFiveMinutes(date('H:i'));
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autocomplete</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery and jQuery UI (for autocomplete) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="assets/js/autocomplete.js"></script> <!-- Your custom JS file -->
</head>

<body>


<div class="container">
    <h1 class="mt-5">Course Form</h1>
    <form action="submit.php" method="POST" id="courseForm">
        <div class="form-group">
            <label for="datacourse">Date Course</label>
            <input type="date" id="datacourse" name="datacourse" class="form-control" value="<?= date('Y-m-d') ?>" required>
        </div>

        <div class="form-group">
            <label for="heurecourse">Heure Course</label>
            <input type="time" id="heurecourse" name="heurecourse" class="form-control" value="<?= $mytime; ?>" required>
        </div>

        <div class="form-group">
            <label for="pseudo">Pseudo Client</label>
            <input type="text" id="pseudo" name="pseudo" class="form-control" autocomplete="off" required>
        </div>

        <div class="form-group" id="autresGroup" style="display: none;">
            <label lang="fr" for="autres">Autres</label>
            <input type="text" id="autres" name="autres" class="form-control">
        </div>

        <div class="form-group">
            <label lang="fr" for="depart">Depart</label>
            <input type="text" id="depart" name="depart" class="form-control" required>
        </div>

        <div class="form-group">
            <label lang="fr" for="arrivee">Arrivee</label>
            <input type="text" id="arrivee" name="arrivee" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="chauffeur">Chauffeur</label>
            <input type="text" id="chauffeur" name="chauffeur" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



</body>
</html>


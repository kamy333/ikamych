<?php
require_once '../lib/function/functions.php';
$mytime = roundToNearestFiveMinutes(date('H:i'));
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap & jQuery Autocomplete</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- jQuery UI CSS (for autocomplete styling) -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- jQuery UI JS (for autocomplete functionality) -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- my Autocomplete Plugin -->
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
            <label for="arrivee">Arrivee</label>
            <input type="text" id="arrivee" name="arrivee" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="chauffeur">Chauffeur</label>
            <input type="text" id="chauffeur" name="chauffeur" class="form-control" required>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- JavaScript for autocomplete and conditional logic -->
</body>
</html>

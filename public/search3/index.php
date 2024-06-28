<?php require_once('../../includes/initialize.php'); ?>

<?php

function getExpPerson()
{
    $output = "";
    $expensePerson = new MyExpensePerson();
    $all_exp_person = $expensePerson::find_all();

    foreach ($all_exp_person as $person) {
        $output .=  "<option value='{$person->person_name}'>{$person->person_name}</option><br>";
    }

    return $output;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>jQuery UI Autocomplete - Combobox</title>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<!--    <link rel="stylesheet" href="/resources/demos/style.css">-->
    <link rel="stylesheet" type="text/css" href="<?php echo $Nav->path_public; ?>css/bootstrap.min.css">
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script src="script.js"></script>

</head>
<body>






<?php echo str_repeat("<br>", 5) ?>
<?php getExpPerson() ?>

<div class="ui-widget">
    <label for="combobox">Pseudo: </label>
    <select id="combobox">
        <option value="">Select one...</option>
        <?php echo getExpPerson() ?>
    </select>
</div>
<!--<button id="toggle">Show underlying select</button>-->

<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"-->
<!--        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"-->
<!--        crossorigin="anonymous"></script>-->

<!--<script src="https://code.jquery.com/jquery-3.7.1.js"></script>-->
<!--<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>-->
<!--<script src="script.js"></script>-->

<!--<script src="//code.jquery.com/jquery-latest.min.js"></script>-->
<?php //include(SITE_ROOT . DS . 'public' . DS . 'search/layouts' . DS . "footer.php") ?>

<!--</body>-->
<!--</html>-->


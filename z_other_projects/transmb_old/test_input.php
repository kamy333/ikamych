<?php

require_once('../includes/initialize_transmed.php');
$session->confirmation_protected_page();

?>

<!doctype html>
<html lang="en">
<head>
    <title>Hello, world!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<!--    <link rel="stylesheet" href="/resources/demos/style.css">-->

</head>
<body>


<div class="container">




<h4 class="text-center">Formulaire Course</h4>

<p><b>Rentrer les données de la course:</b></p>
<form>

    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control input-pseudo" name="pseudo" list="input-pseudo" id="pseudo" aria-describedby="pseudoHelp" placeholder="Find Pseudo">
    </div>


    <div class="form-group">
        <label for="depart">Depart</label>
        <input type="text" class="form-control input-adresse" name="depart" list="input-adresse" id="depart" aria-describedby="adresseHelp" placeholder="Adresse depart">
    </div>

    <div class="form-group">
        <label for="arrivee">Arrivee</label>
        <input type="text" class="form-control input-adresse" name="arrivee" list="input-adresse" id="arrivee" aria-describedby="arriveeHelp" placeholder="Adresse arrivee">
    </div>

    <div class="form-group">
        <label for="chauffeur">chauffeur</label>
        <input type="text" class="form-control" name="chauffeur" list="input-chauffeur" id="chauffeur" aria-describedby="chauffeurHelp" placeholder="Chauffeur">
    </div>

    <div class="form-group date" id="datepicker" >
        <label for="course_date">course_date</label>
        <input type="text" class="form-control" name="course_date"  id="course_date" aria-describedby="dateHelp" >
    </div>

    <div class="form-group">
        <label for="heure">Heure</label>
        <input type="time" class="form-control" name="heure"  id="heure" aria-describedby="timeHelp" placeholder="heure">
    </div>


    <p>Format options:<br>
        <label for="format"></label><select id="format">
            <option value="mm/dd/yy">Default - mm/dd/yy</option>
            <option value="yy-mm-dd"  selected >ISO 8601 - yy-mm-dd</option>
            <option value="d M, y">Short - d M, y</option>
            <option value="d MM, y">Medium - d MM, y</option>
            <option value="DD, d MM, yy">Full - DD, d MM, yy</option>
            <option value="&apos;day&apos; d &apos;of&apos; MM &apos;in the year&apos; yy">With text - 'day' d 'of' MM 'in the year' yy</option>
        </select>
    </p>

<!--    <label for="datepicker"></label><input id="datepicker" width="276" />-->

    <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
    <button type="submit" name="cancel" id="cancel" class="btn btn-default">Cancel</button>


</form>




</div>
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->

<!--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<!--<script src="https://code.gijgo.com/1.5.1/js/gijgo.js" type="text/javascript"></script>-->
<!--<link href="https://code.gijgo.com/1.5.1/css/gijgo.css" rel="stylesheet" type="text/css" />-->

<script>


    $(document).ready(function () {

//       document.getElementById("course_date").innerHTML = d.getDay();

        $(".input-pseudo").keyup(function () {
            str = $(this).val();
            str = str.trimRight();
            if (str.length < 3) {
                //   $("#txtHint").html("");
            } else {
                var url = "admin/ajax/ajax_pseudo.php?q=" + str;
                $("#txtHint").load(url);
            }
        });

        $(".input-adresse").keyup(function () {
            str = $(this).val();
            str = str.trim();
            if (str.length == 0) {
                //      $("#txtHint").html("");
            } else {
                var url = "admin/ajax/ajax_adresse.php?q=" + str;
                $("#txtHint").load(url);
                hintAdresse();
            }
        });




//            $('#datepicker').datepicker({
//                uiLibrary: 'bootstrap4',
//                iconsLibrary: 'fontawesome'
//            });

//        $( "#course_date" ).val('hhhhhh');

//        $( "#course_date" ).val('2017-10-25');



//        $( "#course_date" ).val('2017-10-25');
//        $('#course_date').datepicker({
//            format: 'yy-mm-dd',
//            startDate: '-3d'
//        });

        $( "#course_date" ).datepicker();

        $( "#format" ).on( "change", function() {
//        $( "#course_date" ).datepicker( "option", "dateFormat", $( this ).val() );
        $( "#course_date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
        });


        function hintAdresse() {

            $("li.hint-adresse ").on("click", function () {
//                    event.preventDefault();
//                    var txt= $(this).val();
                alert("xxxx");
            });

        }


    });


</script>

</body>
</html>
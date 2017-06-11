<?php

require_once('../includes/initialize_transmed.php');
$session->confirmation_protected_page();

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Docuxxxxxx</title>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script>

        $(document).ready(function () {
            $(".input-pseudo").keyup(function () {
                str = $(this).val();
                str = str.trimRight();
                if (str.length < 3) {
                    $("#txtHint").html("");
                } else {
                    var url = "admin/ajax/ajax_pseudo.php?q=" + str;
                    $("#txtHint").load(url);
                }
            });

            $(".input-adresse").keyup(function () {
                str = $(this).val();
                str = str.trim();
                if (str.length == 0) {
                    $("#txtHint").html("");
                } else {
                    var url = "admin/ajax/ajax_adresse.php?q=" + str;
                    $("#txtHint").load(url);
//                    $( "p" ).click(function() {
//                        $( this ).slideUp();
//                    });
                    hintAdresse();
                }
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


</head>
<body>

<p><b>Start typing a name in the input field below:</b></p>
<form>
    <!--    First name: <input type="text" onkeyup="showHintPseudo(this.value)">-->
    First name: <input class="input-pseudo" type="text">
    Adresse: <input class="input-adresse" type="text">
    Result: <input class="input-result" type="text">
</form>
<p>Suggestions:
<div id="txtHint"></div>
</p>

<p>Suggestions: <span id="txtinput"></span></p>

<p>Suggestions: <span id="txtinputless"></span></p>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rav Ammar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #fafafa;
            font-family: "Georgia", serif;
            margin: 20px;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2, h3, h4 {
            text-align: center;
            color: #555;
            margin-top: 0;
        }

        .image-container {
            text-align: center;
            margin: 20px 0;
        }

        .image-container img {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .caption {
            text-align: center;
            font-size: 0.9em;
            color: #666;
        }

        @media screen and (max-width: 600px) {
            .container {
                padding: 15px;
            }
        }

    </style>

    <?php include 'assets/css/css.php'; ?>

</head>
<body>
<div class="container">

    <?php $lang = 'fr' ?>
    <?php require 'functions/functions_1.php' ?>
    <?php include 'assets/layout/menu.php'; ?>
    <?php echo $h1 . $h2 . $h3 . $h4; ?>


    <div>
        <h1>Rav Ammar</h1>

        <div class="image-container">
            <img src="/Inspinia/papa/assets/img/2025-03-01%20Rav%20Amar%20doc.jpg" alt="Rav Ammar">

            <img src="/Inspinia/papa/assets/img/2025-03-01%20Rav%20Amar%20doc%202.jpg" alt="Rav Ammar">

<!--            <img src="/Inspinia/papa/assets/img/2025-03-02%20rav_amar_bulletin.jpg" alt="Rav Ammar">-->

            <?php

            if (1 == 2) {
                echo '<img src="/Inspinia/papa/assets/img/2025-03-02_rav_amar_bulletin.jpg" alt="Rav Ammar">';

            ?>

            <a href="https://www.ikamy.ch/Inspinia/papa/assets/img/2025-03-02_rav_amar_bulletin.jpg" target="_blank">Rav Ammar bulletin</a>

            <p class="caption">
                voici le nom de l'association et les coordonnées :<br>

                IBAN : FR76 1751 5900 0008 2960 1825 969<br>

                ACID ASSOCIATION CULTUELLE ISRAÉLITE DE DRANCY<br>
                8-10 boulevard Saint-Simon<br>
                93700 Drancy.
            </p>

            <hr>

            <a href="https://www.ikamy.ch/Inspinia/papa/assets/img/2025-02-26_ElieBenhamou_RIB.pdf" target="_blank">Elie Benhamou rib</a>

            <p class="caption">

                IBAN : FR76 3006 6109 3000 0200 1870 137<br>

                ETABLISSEMENT ELIE BENHAMOU<br>
                34 av du Cimetière Parisien<br>
                93500 Pantin<br>

                Voici notre RIB. Merci de préciser en libellé de virement : NAFISSPOUR Said.<br>
                EUR: 1328.30

                Merci Monsieur bien reçu. Je vous virerai soit vendredi ou lundi prochain.

            <div style="margin-left: 10em;margin-right: 10em">
            <table width="100%">
                <tr>
                    <th>Description</th>
                    <th>Montant</th>
                </tr>
                <tr>
                    <td>Soit Facture:</td>
                    <td>7128.30</td>
                </tr>
                <tr>
                    <td> Moins pris sur compte de mon père selon Mr Cohen</td>
                    <td>-5800.00</td>
                </tr>
                <tr>
                    <td>Net à payer</td>
                    <td><em>1328.30</em></td>
            </table>
            </div>

            <?php } ?>

        </div>


    </div>
</div>
<?php include 'assets/js/js.php'; ?>

</body>
</html>

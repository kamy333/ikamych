<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cérémonie de Recueillement</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            line-height: 1.8;
            margin: 40px 15%;
            background-color: #f4f4f4;
            color: #333;
        }

        h1, h2 {
            color: #2c3e50;
        }

        a {
            color: #2980b9;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .psalm {
            background-color: #ffffff;
            padding: 15px;
            margin-bottom: 20px;
            border-left: 5px solid #2980b9;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #ecf0f1;
        }
    </style>
    <?php include 'assets/css/css.php';?>
</head>
<body>
<div class="container">

    <?php $lang = 'fr' ?>
    <?php require 'functions/functions_1.php' ?>
    <?php include 'assets/layout/menu.php'; ?>
    <?php echo $h1 . $h2 . $h3 . $h4; ?>
    <h1>Cérémonie de Recueillement</h1>

    <h2>1. Allumage de la bougie commémorative (Ner Neshama)</h2>
    <p>Allumez une bougie en mémoire du défunt, symbole de l'âme et de la lumière éternelle.</p>

    <h2>2. Lecture des Psaumes</h2>
    <p>Récitez les Psaumes suivants, qui apportent réconfort et élévation spirituelle :</p>

    <h2>3. Moment de silence et de méditation</h2>
    <p>Après la lecture des Psaumes, observez un moment de silence pour réfléchir aux souvenirs partagés avec le défunt
        et à son impact sur vos vies.</p>

    <h2>4. Partage de souvenirs</h2>
    <p>Si vous êtes en groupe, chacun peut partager une anecdote ou un souvenir en l'honneur du défunt, renforçant ainsi
        le lien communautaire et perpétuant sa mémoire.</p>

    <h2>5. Conclusion par une prière personnelle</h2>
    <p>Terminez la cérémonie par une prière personnelle, demandant à l'Éternel de veiller sur l'âme du défunt et
        d'apporter réconfort aux proches.</p>


    <div class="psalm">
        <h3>Psaume 23</h3>
        <p>« L'Éternel est mon berger, je ne manquerai de rien. »</p>
        <a href="https://www.sefaria.org/Psalms.23?lang=bi" target="_blank">Lire le Psaume 23 (hébreu + français)</a>
    </div>

    <div class="psalm">
        <h3>Psaume 121</h3>
        <p>« Je lève mes yeux vers les montagnes... D'où me viendra le secours ? »</p>
        <a href="https://www.sefaria.org/Psalms.121?lang=bi" target="_blank">Lire le Psaume 121 (hébreu + français)</a>
    </div>

    <div class="psalm">
        <h3>Psaume 130</h3>
        <p>« Du fond de l'abîme, je t'invoque, ô Éternel ! »</p>
        <a href="https://www.sefaria.org/Psalms.130?lang=bi" target="_blank">Lire le Psaume 130 (hébreu + français)</a>
    </div>

    <div class="psalm">
        <h3>Psaume 20</h3>
        <p>« Que l'Éternel te réponde au jour de la détresse ! »</p>
        <a href="https://www.sefaria.org/Psalms.20?lang=bi" target="_blank">Lire le Psaume 20 (hébreu + français)</a>
    </div>

    <div class="psalm">
        <h3>Psaume 33</h3>
        <p>« Exultez en l'Éternel, vous les justes ! »</p>
        <a href="https://www.sefaria.org/Psalms.33?lang=bi" target="_blank">Lire le Psaume 33 (hébreu + français)</a>
    </div>

    <div class="psalm">
        <h3>Psaume 90</h3>
        <p>« Seigneur, tu as été pour nous un refuge de génération en génération. »</p>
        <a href="https://www.sefaria.org/Psalms.90?lang=bi" target="_blank">Lire le Psaume 90 (hébreu + français)</a>
    </div>

    <div class="psalm">
        <h3>Psaume 91</h3>
        <p>« Celui qui demeure sous l'abri du Très-Haut repose à l'ombre du Tout-Puissant. »</p>
        <a href="https://www.sefaria.org/Psalms.91?lang=bi" target="_blank">Lire le Psaume 91 (hébreu + français)</a>
    </div>

    <div class="psalm">
        <h3>Psaume 104</h3>
        <p>« Mon âme, bénis l'Éternel ! »</p>
        <a href="https://www.sefaria.org/Psalms.104?lang=bi" target="_blank">Lire le Psaume 104 (hébreu + français)</a>
    </div>
</div>
<?php include 'assets/js/js.php'; ?>

</body>
</html>

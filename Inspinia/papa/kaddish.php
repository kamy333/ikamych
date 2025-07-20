<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mourner's Kaddish in Aramaic</title>
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
<style>
    .video-container {
        position: relative;
        padding-bottom: 56.25%;
        padding-top: 30px;
        height: 0;
        overflow: hidden;
    }

    .video-container iframe, .video-container object, .video-container embed {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
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
</style>
<body>
<div class="container">

    <?php $lang = 'fr' ?>
    <?php require 'functions/functions_1.php' ?>
    <?php include 'assets/layout/menu.php'; ?>
    <?php echo $h1 . $h2 . $h3 . $h4; ?>


    <div>
        <h1>Mourner's Kaddish</h1>

        <h4>
            The Mourner's Kaddish is a prayer recited by mourners during the mourning period and on the anniversary of a
            loved one's passing. It is a prayer that praises God and expresses the hope for the coming of the Messiah
            and the establishment of God's kingdom on earth. The Kaddish is recited in Aramaic, the language of the
            Talmud, and is traditionally recited by a minyan, a quorum of ten Jewish adults.

        </h4>
        <h5>
            <a href="https://www.shiva.com/learning-center/resources/psalms?srsltid=AfmBOoqp46ugN_yKgyRuHcwOHzBqOHDAcFpezVpBP57QvThInB7VOIqo"
            target="_blank">Psalm
                Of David</a>

            <a href="https://www.shiva.com/learning-center/prayers/yizkor" target="_blank">Yitshor</a>
        </h5>

        <div class="video-container" style="text-align: center">


            <iframe width="560" height="315" src="https://www.youtube.com/embed/b5dUVhQxLDM?si=V5aOodElnoUtMGhE"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <div class="image-container">
            <!-- Replace 'path/to/your-image.jpg' with the actual URL or file path of your image -->
            <img src="/Inspinia/papa/assets/img/_kadish.jpg" alt="Mourner's Kaddish in Aramaic">
            <img src="/Inspinia/papa/assets/img/2025-03-01_Rav_Amar_kaddish.jpg" alt="Sefarade Mourner's Kaddish in Aramaic">
            <img src="/Inspinia/papa/assets/img/2025-03-01_Rav_Amar_kaddish_french.jpg" alt="Sefarade french Mourner's Kaddish in Aramaic">
        </div>

        <p class="caption">
            <!--        Image courtesy of <a href="https://www.sefaria.org" target="_blank">Sefaria</a>-->
        </p>
    </div>
</div>
<?php include 'assets/js/js.php'; ?>

</body>
</html>

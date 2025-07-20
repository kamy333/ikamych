<?php
// Define the directory that holds your photos
$photoDir = 'assets/img/photos/';
// Retrieve all image files (adjust the extensions as needed)
$photos = glob($photoDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Photo Album</title>
    <style>
        body {
            background-color: #f4f4f9;
            font-family: "Georgia", serif;
            margin: 40px;
            line-height: 1.6;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .container2 {
            /*max-width: 1200px;*/
            margin: auto;
            background: #fff;
            padding: 60px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        h1, h2, h3, h4 {
            text-align: center;
            color: #555;
        }

        p {
            text-indent: 2em;
            margin: 20px 0;
        }

        .signature {
            text-align: right;
            margin-top: 40px;
            font-style: italic;
        }

        #gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .thumb {
            width: 150px;
            height: 150px;
            object-fit: cover;
            cursor: pointer;
        }

        #modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        #modal img {
            max-width: 90%;
            max-height: 80%;
        }

        #modal .close {
            position: absolute;
            top: 20px;
            right: 30px;
            font-size: 30px;
            color: white;
            cursor: pointer;
        }

        #modal .nav-buttons {
            margin-top: 10px;
        }

        #modal button {
            margin: 0 10px;
            padding: 5px 10px;
        }

        #loadMore {
            margin: 20px auto;
            display: block;
        }
    </style>
    <?php include 'assets/css/css.php'; ?>
</head>
<body
">
<!--<div style="margin-top: 4rem;">-->
<div class="container2">

    <h1>Photo Album</h1>
    <?php $lang = 'en'; ?>
    <?php require 'functions/functions_1.php'; ?>
    <?php include 'assets/layout/menu.php'; ?>
    <?php echo $h2 . $h3 . $h4; ?>



<div style="display: flex; gap: 20px;">
    <div>
        <p style="font-size: smaller;text-align: center;color: royalblue">Papa dancing 2016 -Desiree</p>
        <video width="320" height="240" controls>
            <source src="/Inspinia/papa/assets/video/papa_dancing_2016_dancing.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
    <div>
        <p style="font-size: smaller;text-align: center;color: royalblue">Papa Tribute from Ameh Farideh 29 March 2025</p>
        <video width="320" height="240" controls>
            <source src="/Inspinia/papa/assets/video/papa_tribute_ameh_farideh.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>
</div>

    <div id="gallery"></div>
    <button id="loadMore">Load More</button>

    <!-- Modal for full image view -->
    <div id="modal">
        <span class="close">&times;</span>
        <img src="" alt="Full view">
        <div class="nav-buttons">
            <button id="prev">Prev</button>
            <button id="next">Next</button>
        </div>
    </div>
</div>

<!-- Pass PHP array to JavaScript -->
<script>
    // The photos array is populated from PHP using glob
    const photos = <?php echo json_encode($photos); ?>;

    const chunkSize = 200; // Number of photos per chunk
    let currentChunk = 0;
    const gallery = document.getElementById('gallery');

    function loadChunk() {
        const start = currentChunk * chunkSize;
        const end = start + chunkSize;
        for (let i = start; i < end && i < photos.length; i++) {
            const img = document.createElement('img');
            img.src = photos[i];
            img.classList.add('thumb');
            img.dataset.index = i;  // Store index for modal navigation
            img.addEventListener('click', openModal);
            gallery.appendChild(img);
        }
        currentChunk++;
        // Hide "Load More" if all photos are loaded
        if (currentChunk * chunkSize >= photos.length) {
            document.getElementById('loadMore').style.display = 'none';
        }
    }

    document.getElementById('loadMore').addEventListener('click', loadChunk);

    // Initial load of the first chunk
    loadChunk();

    // Modal functionality for viewing photos
    const modal = document.getElementById('modal');
    const modalImg = modal.querySelector('img');
    let currentIndex = 0;

    function openModal(e) {
        currentIndex = parseInt(e.target.dataset.index);
        modalImg.src = photos[currentIndex];
        modal.style.display = 'flex';
    }

    function closeModal() {
        modal.style.display = 'none';
    }

    function showPrev() {
        if (currentIndex > 0) {
            currentIndex--;
            modalImg.src = photos[currentIndex];
        }
    }

    function showNext() {
        if (currentIndex < photos.length - 1) {
            currentIndex++;
            modalImg.src = photos[currentIndex];
        }
    }

    modal.querySelector('.close').addEventListener('click', closeModal);
    document.getElementById('prev').addEventListener('click', showPrev);
    document.getElementById('next').addEventListener('click', showNext);

    // Optionally, clicking outside the image closes the modal
    modal.addEventListener('click', function (e) {
        if (e.target === modal) closeModal();
    });
</script>

<?php include 'assets/js/js.php'; ?>
</div>
</html>

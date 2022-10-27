<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song Detail</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="flex">
        <!-- navbar -->
        <aside id="navbar">

        </aside>
        <section class="main-section">
            <div id="account-info">

            </div>
            <div id="song-detail-container">
                <img id="song-image" class="song-image-detail"/>
                <div>
                    <div id="song-title" class="song-title-detail"></div>
                    <div id="singer" class="song-detail-fields"></div>
                    <div id="publish-date" class="song-detail-fields"></div>
                    <div id="genre" class="song-detail-fields"></div>
                    <button> <a id="ref-to-album-detail-page">On Album</a></button>
                </div>
            </div>
       </section>
       <footer id="player" class="player-container">

        </footer>
</body>
<?php
    // add global js and styles
    require '../../global.php';
    echoGlobal();
?>
<!-- script -->
<script src="script.js"></script>

</html>
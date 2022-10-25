<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail album</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <div class="flex">
        <!-- navbar -->
        <div id="navbar"></div>
        <div>

            <div id="account-info"></div>
            <div id="album-detail">
                <div id="album-title"></div>
                <div id="singer"></div>
                <div id="publish-date"></div>
                <div id="total-duration"></div>
            </div>
            <div id="genre"></div>
            <!-- image -->
            <img id="album-image" src="" alt="">
            <div id="song-count"></div>
            <div id="song-list" class="mb-32">
            </div>
        </div>
    </div>
    <div id="player">
    </div>
    </div>
</body>
<?php
    // add global js and styles
    require '../../global.php';
    echoGlobal();
?>
<!-- script -->
<script src="./script.js"></script>

</html>
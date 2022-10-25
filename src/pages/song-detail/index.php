<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail song</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div>
        <!-- navbar -->
        <div id="navbar"></div>
        <div>
            <div id="account-info"></div>
            <div id="song-detail">
                <div id="song-title"></div>
                <div id="singer"></div>
                <div id="publish-date"></div>
                <div id="genre"></div>
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
<script src="script.js"></script>

</html>
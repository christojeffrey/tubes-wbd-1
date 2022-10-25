<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>

    <div class="flex">
        <!-- navbar -->
        <div id="navbar"></div>

        <div id="content">
            <div id="account-info"></div>
            <h1>
                Home
            </h1>
            <div class="move-page-button-container">
                <button onclick="movePage(true)" class="move-page-button" id="back-button">
                    < </button>
                        <button onclick="movePage(false)" class="move-page-button" id="next-button">></button>
            </div>
            <div id="cards">
            </div>
        </div>

    </div>
    <div id="player-home">
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
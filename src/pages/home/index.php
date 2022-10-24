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
    <div>
        <h1>
            Home
        </h1>
        <div id="cards">
        <div id="player-home">
        </div>
    </div>
</body>
<?php
    // add global js and styles
    require '../../global.php';
    require '../../components/songCard/songCard.php';
    require '../../components/player/player.php';
    echoGlobal();
?>
<!-- script -->
<script src="./script.js"></script>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>album list</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="wiwiw">
        <div class="heading">
            <h1 class="title">
                <b>Albums</b>
            </h1>
            <p class="see-all">
                <a href="#">See All</a>
            </p>
        </div>
        <div id="albums" class="albums">
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
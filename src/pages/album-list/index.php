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
    <div class="flex">
        <div id="navbar">
    
        </div>
        <div>
            <div id="account-info">

            </div>
            <div class="wiwiw">
                <div class="heading">
                    <h1 class="title">
                        <b>Albums</b>
                    </h1>
                    <p class="move-page-container">
                    <button onclick="movePage(true)" class="move-page-button" id="back-button">
                    < </button>
                        <button onclick="movePage(false)" class="move-page-button" id="next-button">></button>
                    </p>
                </div>
                <div id="albums" class="albums">
                </div>
            </div>
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
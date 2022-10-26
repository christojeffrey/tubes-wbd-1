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
    <div class="flex-column">
        <div class="flex">
            <aside id="navbar">

            </aside>
            <section class="main-section">
                <div id="account-info">

                </div>
                <div class="list-header-container">
                    <h1 class="list-title">
                        <b>Songs</b>
                    </h1>
                    <div class="move-page-button-container">
                        <button onclick="movePage(true)" class="move-page-button" id="back-button">
                            < </button>
                                <button onclick="movePage(false)" class="move-page-button" id="next-button">></button>
                    </div>
                </div>
                <div class="song-list-content">

                    <div id="cards">

                    </div>
                </div>
            </section>
        </div>

        <footer id="player-home">

        </footer>
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
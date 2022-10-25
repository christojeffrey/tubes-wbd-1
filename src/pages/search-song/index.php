<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search-song</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="flex">

        <div id="navbar"></div>
        <section>
            <div id="account-info"></div>
            <!-- drop down. option is title, singer, and year -->
            <select name="option" id="search-option" class="bg-black">
                <option value="title">title</option>
                <option value="singer">singer</option>
                <option value="year">year</option>
            </select>
            <!-- textbox -->
            <input class="bg-black" type="text" id="search-text" placeholder="Search for songs">
            <!-- search button -->
            <button id="search-button" onclick="onSearchClick()">Search</button>
            <!-- search result -->
            <div id="song-list"></div>
        </section>
    </div>
    <div id="player"></div>
</body>
<?php
    // add global js and styles
    require '../../global.php';
    echoGlobal();
?>
<!-- script -->
<script src="script.js"></script>

</html>
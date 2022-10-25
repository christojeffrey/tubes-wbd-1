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
    <div>
        <!-- textbox -->
        <input type="text" id="search-text" placeholder="Search for songs">
        <!-- search button -->
        <button id="search-button">Search</button>
        <!-- search result -->
        <div id="search-result"></div>
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
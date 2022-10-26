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
            <label for="sort">sort by</label>
            <select name="sort" id="sort" class="bg-black">
                <option value="">none</option>
                <option value="year-asc">year asc</option>
                <option value="year-desc">year desc</option>
                <option value="title-asc">title asc</option>
                <option value="title-desc">title desc</option>
            </select>

            <label for="filter">filter by genre</label>
            <select name="filter" id="filter" class="bg-black">
                <option value="">none</option>

                <?php
                 $GENRE_LIST = array("alternative",
                 "blues",
                 "children",
                 "classical",
                 "country",
                 "EDM",
                 "Electronic",
                 "Folk",
                 "Hip-Hop/Rap",
                 "Indie",
                 "Jazz",
                 "J-Pop",
                 "K-Pop",
                 "Latin",
                 "Metal",
                 "Opera",
                 "Pop",
                 "RnB",
                 "Reggae",
                 "Rock",
                 "Traditional",
                 "Others");
                foreach($GENRE_LIST as $value) {
                    echo "<option value=$value>$value</option>";
                }
                ?>
            </select>

            <!-- textbox -->
            <input class="bg-black" type="text" id="search-text" placeholder="Search for songs">
            <!-- search button -->
            <button id="search-button" onclick="onSearchClick()">Search</button>
            <!-- search result -->
            <div id="song-list"></div>
            <div id="pagination"></div>
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
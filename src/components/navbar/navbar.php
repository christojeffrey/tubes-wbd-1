<?php
    function navbar($args){
        // $is_admin, is_logged_in  
        extract($args);
        // create two different navbar, depending on whether is_admin true or false.
        // on admin, add link to add song, add album
        // on both, have link to home, album list, search, logout

        // if not logged in, change logout button to login button

        if ($is_admin){
            // admin navbar
            $admin_navbar = <<<ADMIN_NAVBAR
            <li class="nav-item">
                <a class="nav-link" href="add_song.php">Add Song</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="add_album.php">Add Album</a>
            </li>
            ADMIN_NAVBAR;
        } else {
            $admin_navbar = "";
        }
        if($is_logged_in){
            // logged in navbar
            $logged_in_navbar = <<<LOGGED_IN_NAVBAR
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
            LOGGED_IN_NAVBAR;
        } else {
            // not logged in navbar
            $logged_in_navbar = <<<NOT_LOGGED_IN_NAVBAR
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            NOT_LOGGED_IN_NAVBAR;
        }
        $navbar = <<<NAVBAR
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Music Database</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="album_list.php">Album List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="search.php">Search</a>
                    </li>
                    $admin_navbar
                    $logged_in_navbar
                </ul>
            </div>
        </nav>
        NAVBAR;
        return $navbar;
    }
?>
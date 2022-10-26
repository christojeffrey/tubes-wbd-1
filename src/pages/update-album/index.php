<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update album</title>
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
                        <b>Update Album</b>
                    </h1>
                </div>
                <div>
                    <h2>Album Info</h2>
                    <div class="album-info">
                        <img id="album-image" src="" alt="">
                        <form onsubmit="addAlbum()" method="POST" and enctype="multipart/form-data">
                            
                            <label for="album-title">Name</label>  
                            <input type="text" name="album-title" id="album-title" placeholder="Add a name" required>
                        
                            <label for="singer">Singer</label>  
                            <input type="text" name="singer" id="singer">
                        
                            <label for="genre" class="">Genre</label>
                            <select id="genre">
                            </select>
                        
                            <label for="publish-date">Publish Date</label>  
                            <input type="date" name="publish-date" id="publish-date">
                            <label for="image-file">Image File</label>
                            <input onchange="onChange()" type="file" name="image-file" id="image-file">
                            <button class="submit" type="submit">Submit</button>
                        </form>
                    </div>
                  <h2>Album's songs</h2>
                    <div id="song-list">
                    </div>
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
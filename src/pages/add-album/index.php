<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add album</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>
<div class="flex">
        <aside id="navbar">

        </aside>
        <section class="main-section">
            <div id="account-info">

            </div>
            <div>
                <form onsubmit="addAlbum()" class="song-album-form-container" method="POST" and enctype="multipart/form-data">
                   <!-- form to add album with needed variable: album_title, singer, image_path, publish_date, genre -->
                    <label for="album-title" class="form-label">Album Title</label>
                    <input type="text" name="album-title" id="album-title" required>

                    <label for="singer" class="form-label">Singer</label>
                    <input type="text" name="singer" id="singer" required>

                    <label for="publish-date" class="form-label">Publish Date</label>
                    <input type="date" name="publish-date" id="publish-date" required>

                    <label for="genre" class="form-label">Genre</label>
                    <select id="genre" required>
                    </select>

                    <label for="image-file"  class="form-label>Image File</label>
                    <input type="file" name="image-file" id="image-file" required>

                    <input type="submit" value="Add Album">
                </form>
            </div>
            
        </section>
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
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
        <aside id="navbar">

        </aside>
        <section class="main-section">
            <div id="account-info">

            </div>
            <div>
                <form onsubmit="updateSong()" class="song-album-form-container" method="POST" and enctype="multipart/form-data">
                    <label for="song-title" class="form-label">Song Title</label>
                    <input type="text" name="song-title" id="song-title" required>

                    <label for="singer class="form-label"">Singer</label>
                    <input type="text" name="singer" id="singer">

                    <label for="publish-date" class="form-label">Publish Date</label>
                    <input type="date" name="publish-date" id="publish-date" required>

                    <label for="genre" class="form-label">Genre</label>
                    <select id="genre" required>
                    </select>

                    <label for="audio-file" class="form-label">Audio File</label>
                    <input type="file" name="audio-file" id="audio-file">

                    <label for="image-file" class="form-label">Image File</label>
                    <input type="file" name="image-file" id="image-file">



                    <label for="album-id" class="form-label">Album</label>
                    <select id="album-id">
                    </select>
                    <input type="submit" value="Update Song">
                </form>
                <button onclick = "deleteSong()">Delete</button>
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
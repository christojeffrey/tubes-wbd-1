<?php
    function songCard($args) {
        // $id, $title, $artist, $audio_path, $img, on_click, is_admin, $genre
        extract($args);
    // titlecolor is green is the song is selected

    // if is admin, show the edit button
    $edit_button = "";
    if ($is_admin) {
        $edit_button = <<<EOT
            <div class="edit-button">
                <a href="editsong.php?id=$id">
                    edit
                </a>
            </div>
        EOT;
    }
    $html = 
    <<<"EOT"
        <style>
        .selected-song {
            background-color: green;
        }
        .song-card-container{


            border: 2px solid black;
            display: flex;
            flex-direction: col;
            margin: 2px;
            border-radius: 5px;
            padding: 1px;
            width: 100%;
        }
        .song-card-container:hover {
            background-color: #464646;
        }
        .song-image {
            width: 50px;
            height: 50px;
        }
        
        .title{
            font-weight: bold;
        }
        
        
        .song-text{
            width: 500px;
        }
        </style>
    
        <div id ="song-card-$id" class="song-card-container my-1">
        <a href = "../song-detail/index.php?song_id=$id" class = "flex">
            <section class = "flex justify-center items-center ml-2">
                $id
            </section>
            <section class = "flex justify-center items-center mx-6">
                <img src="$img" alt="Album Cover" class="song-image">
            </section>
            <section class ="flex flex-col justify-center  song-text">
                <div class ="title">$title</div>
                <div class="desc">$artist  -  $genre</div>
            </section>
        </a>    
            
            <section>
                <button onclick = "$on_click($id, '$title', '$artist', '$audio_path', '$img')" class = "border-2 rounded-lg border-green-500 h-12 ml-32">
                    play
                </button>
                $edit_button
            </section>
        </div>
    EOT;
    
    return $html;
    }
?>
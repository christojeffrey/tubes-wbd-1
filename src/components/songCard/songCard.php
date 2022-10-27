<?php
    function songCard($args) {
        // $id, $title, $artist, $audio_path, $img, on_click, is_admin, $genre, delete_from_album
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

    $play_button = <<<EOT
    <button onclick = "$on_click($id, '$title', '$artist', '$audio_path', '$img')" class = "border-2 rounded-lg border-green-500 h-12 ml-32">
        play
    </button>
    EOT;

    $delete_button = "";
    if ($delete_from_album){
        $delete_button = 
        <<<EOT
        <button onclick="$on_click_delete($id, '$title', '$artist', '$publish_date', '$genre', '$audio_path', '$image_path', $duration)">
            <img class="delete-button" src="../../assets/icons/delete.svg" alt="Edit"/>
        </button>
        EOT;
        $play_button = "";
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

        .delete-button{
            width: 1.5rem;
            height: 1.5rem;
            cursor: pointer;
            margin-left: auto;
            margin-top: auto;
            filter: invert(100%) sepia(100%) saturate(0%) hue-rotate(115deg) brightness(113%) contrast(101%);
        }

        .delete-button:hover{
            filter: invert(15%) sepia(80%) saturate(6424%) hue-rotate(358deg) brightness(110%) contrast(115%)
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
                $play_button
                $edit_button
                $delete_button
            </section>
        </div>
    EOT;
    
    return $html;
    }
?>
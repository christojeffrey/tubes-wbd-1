<?php
    function songCard($args) {
        // $id, $title, $artist, $audio_path, $img, on_click, is_admin
        extract($args);
    // titlecolor is green is the song is selected

    // if is admin, show the edit button
    $edit_button = "";
    if ($is_admin) {
        $edit_button = <<<EOT
            <div class="edit-button border-2 border-black">
                <a href="editsong.php?id=$id">
                    <i class="">edit</i>
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

        </style>
    
        <div id ="song-card-$id" class="border-2 border-black flex flex-row m-2 rounded-md p-1 song-card">
        <a href = "../song-detail/index.php/?song_id=$id">
            <section class ="m-1">
                <img src="$img" alt="Album Cover" class = "h-12">
            </section>
            <section class ="m-1">
                <h3 class = "$titlestyle">$title</h3>
                <p>$artist</p>
                <p>
                    $genre
                </p>
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
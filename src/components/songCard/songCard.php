<?php
    function songCard($args) {
        // $id, $title, $artist, $img, on_click
        extract($args);

    // titlecolor is green is the song is selected
    $html = 
    <<<"EOT"

        <style>
        .selected-song {
            background-color: green;
        }
    
        
        </style>
    
        <div id ="song-card-$id" class="border-2 border-black flex flex-row m-2 rounded-md p-1">
            <section class ="m-1">
                <img src="$img" alt="Album Cover" class = "h-12">
            </section>
            <section class ="m-1">
                <h3 class = "$titlestyle">$title</h3>
                <p>$artist</p>
            </section>
            <section>
            <button onclick = "$on_click($id)" class = "border-2 rounded-lg border-green-500 h-12 ml-32">
                play
            </button>
            </section>
        </div>
    EOT;
    
    return $html;
    }
?>
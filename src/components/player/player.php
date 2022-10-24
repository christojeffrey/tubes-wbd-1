<?php
    function player($args) {
        // $id, $title, $singer, $audio_path, $img
       extract($args);

        $html = <<<"EOT"
            <style>
            .player-container {
                position: fixed;
                bottom: 0;
                width: 100%;
                height: 90px;
                background-color: #181818;
                color: white;
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                padding: 0 16px;
            }
            .player-container::after {
                flex: 1;
                content: '';
            }
            .player-song-image{
                height: 70px;
            }
            .player-song-information {
                display: flex;
                flex: 1;
                flex-direction: row;
                justify-content: flex-start;
            }
            .player-song-detail {
                display: flex;
                flex-direction: column;
                margin-left: 5px;
                justify-content: center;
            }
            </style>
            <div id="player-$id" class="player-container">
                <section class="player-song-information">
                    <img src="$img" alt="Song Cover" class = "player-song-image">
                    <div class ="player-song-detail">
                        <h3>{$title}</h3>
                        <p>{$singer}</p>
                    </div>
                </section>
                <audio controls class="player-song-audio">
                    <source src="$audio_path" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
            </div>
    EOT;

    echo $html;
    }
?>
<?php
    function echo_card($title = "Default Title", $desc = "Default Description", $img = "/images/fallback.jpg") {
    $html = <<<"EOT"
        <div class="card">
            <img src="$img" alt="">
            <h2>$title</h2>
            <p>$desc</p>
        </div>
    EOT;

    echo $html;
    }
?>
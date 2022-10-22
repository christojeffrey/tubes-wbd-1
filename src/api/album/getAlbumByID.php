<?php
    require_once './albumHelper.php';
    if (empty($_REQUEST["album_id"])) {
        $conn->close();
        exitWithError(400, "Album id unspecified");
    }
    
    $album_id = intval($_REQUEST["album_id"]);
    
    $song_detailed = !empty($_REQUEST["song_detailed"])? $_REQUEST["song_detailed"] == "true": false;

    
    $res = getAlbumByID($album_id, $song_detailed);

    exitWithDataReturned($res);
?>


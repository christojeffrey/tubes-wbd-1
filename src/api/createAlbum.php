<?php
    include 'dbConfig.php';
    $body = json_decode(file_get_contents('php://input'), true);
    $album_title = $body['album_title'];
    $singer = $body['singer'];
    $image_path = $body['image_path'];
    $publish_date = $body['publish_date'];
    $genre = $body['genre'];
?>
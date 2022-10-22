<?php
    require_once '../../global.php';
    // auth check is not yet implemented

    $map = backendConnection();
    $conn = $map['conn'];

    if ($map['err'] != null) {      
        exitWithError(500, $map['err']);
    }

    $body = json_decode(file_get_contents('php://input'), true);
    if (!validateNeededKeys($body, array('song_title', 'singer', 'publish_date', 'genre', 'audio_path', 'image_path', 'duration', 'album_id'))) {
        exitWithError(400, 'All song detail is needed');
    }

    if (!validateKeyValueIsNotNull($body, array('song_title', 'singer', 'publish_date', 'genre', 'audio_path', 'image_path', 'duration', 'album_id'))) {
        exitWithError(400, 'All song detail must be filled');
    }

    if (!preg_match('/^(\/public\/)/', $body['audio_path']) || !preg_match('/^(\/public\/)/', $body['image_path'])) {
        exitWithError(400, 'File path must be a valid URL');
    }
    
    // to do: check if album_id is valid
    
    $song_title = $body['song_title'];
    $singer = $body['singer'];
    $publish_date = $body['publish_date'];
    $genre = $body['genre'];
    $audio_path = $body['audio_path'];
    $image_path = $body['image_path'];
    $duration = $body['duration'];
    $album_id = $body['album_id'];

    
    $sql = "INSERT INTO Song (song_title, singer, publish_date, genre, audio_path, image_path, duration, album_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $song_title, $singer, $publish_date, $genre, $audio_path, $image_path, $duration, $album_id);
    if ($stmt->execute()) {
        $new_id = $stmt->insert_id;
        
       $data = array(
            "song_id" => $new_id,
            "song_title" => $song_title,
            "singer" => $singer,
            "publish_date" => $publish_date,
            "genre" => $genre,
            "audio_path" => $audio_path,
            "image_path" => $image_path,
            "duration" => $duration,
            "album_id" => $album_id,
        );
        exitWithDataReturned($data);
    } else {
        exitWithError(500, "Error while adding new song");
    }
?>
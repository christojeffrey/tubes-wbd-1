<?php
    require_once '../../global.php';

    $auth = checkIsAuthTokenValid();
    if (!$auth['is_admin']) {
        exitWithError(401, 'You are not authorized to add song');
    };

    $body = json_decode(file_get_contents('php://input'), true);
    if (!validateNeededKeys($body, array('song_title', 'singer', 'publish_date', 'genre', 'audio_path', 'image_path', 'duration', 'album_id'))) {
        exitWithError(400, 'All song detail is needed');
    }

    if (!validateKeyValueIsNotNull($body, array('song_title', 'singer', 'publish_date', 'genre', 'audio_path', 'image_path', 'duration', 'album_id'))) {
        exitWithError(400, 'All song detail must be filled');
    }

    // // check if audio_path and image_path is started with "/public/"
    // if (!preg_match('/^(\/public\/audio\/)/', $body['audio_path']) || !preg_match('/^(\/public\/image\/)/', $body['image_path'])) {
    //     exitWithError(400, 'File path must be a valid URL');
    // }

    // check if audio_path and image_path contains /
    // the path that is stored in the db should be only the file name
    // actual file location will be on the src/assets folder
    // for audio path, the file should be in src/assets/song-audio
    // for image path, the file should be in src/assets/song-image
    if (preg_match('/\//', $body['audio_path']) || preg_match('/\//', $body['image_path'])) {
        exitWithError(400, 'File path must be a valid name');
    }

    // connect to database
    $map = backendConnection();
    $conn = $map['conn'];
    if ($map['err'] != null) {
        $conn->close();   
        exitWithError(500, $map['err']);
    }
    
    $stmt = $conn->prepare("SELECT album_id FROM Album WHERE album_id = ?");
    $stmt->bind_param("i", $body['album_id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            $conn->close();
            exitWithError(400, "No album found");
        }
    } else {
        $conn->close();
        exitWithError(500, "Error while checking album");
    }
    $stmt->close();

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
        $conn->close();
        exitWithDataReturned($data);
    } else {
        $conn->close();
        exitWithError(500, "Error while adding new song");
    }
?>
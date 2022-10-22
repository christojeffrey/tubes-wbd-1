<?php
    require_once '../global.php';
    $map = backendConnection();
    $conn = $map['conn'];

    if ($map['err'] != null) {
        $conn->close();
        exitWithError(500, $map['err']);
    }


    $input = file_get_contents('php://input');
    $body = json_decode($input,true);

    $album_title = $body['album_title'];
    $singer = $body['singer'];
    $image_path = $body['image_path'];
    $publish_date = $body['publish_date'];
    $genre = $body['genre'];

    if (!validateNeededKeys($body, array('album_title','singer','image_path','publish_date','genre'))) {
        $conn->close();
        exitWithError(400, 'Bad Request');
    }

    $stmt = $conn->prepare("INSERT INTO Album (album_title, singer, image_path, publish_date, genre) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $album_title,$singer,$image_path,$publish_date,$genre);
    
    $stmt->execute();

    $new_id = $stmt->insert_id;

    $stmt = $conn->prepare("
            SELECT * 
            FROM Album 
            WHERE album_id = ?
            ");
    $stmt->bind_param('i', $new_id);
    $stmt->execute();   
    /* bind variables to prepared statement */
    $result = $stmt->get_result();
    $album = $result->fetch_assoc();

    $res = array(
        'status' => 'success', 
        'message' => 'Album created successfully',
        'data' => array(
            'album_id' => $album['album_id'],
            'album_title' => $album['album_title'],
            'singer' => $album['singer'],
            'total_duration' => $album['total_duration'],
            'image_path' => $album['image_path'],
            'publish_date' => $album['publish_date'],
            'genre' => $album['genre']
        ));

    http_response_code(201);
    
    $conn->close();
    echo json_encode($res);
?>
<?php
    require_once '../../global.php';
    // auth check is not yet implemented

    $map = backendConnection();
    $conn = $map['conn'];
    if ($map['err'] != null) {      
        exitWithError(500, $map['err']);
    }

    // get the song id parameter from URL
    if (!empty($_REQUEST["song_id"])) {
        $song_id = $_REQUEST["song_id"];
    } else {
        exitWithError(400, "No song pspecified");
    }


    $sql = "SELECT * FROM Song WHERE song_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $song_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();

        // check if the song exists
        if ($result->num_rows == 0) {
            exitWithError(404, "Song not found");
        }

        $song = $result->fetch_assoc();
        $data = array(
            "song_id" => $song["song_id"],
            "song_title" => $song["song_title"],
            "singer" => $song["singer"],
            "publish_date" => $song["publish_date"],
            "genre" => $song["genre"],
            "audio_path" => $song["audio_path"],
            "image_path" => $song["image_path"],
            "duration" => $song["duration"],
        );
        
        exitWithDataReturned($data);
    } else {
        exitWithError(500, "Error while fetching songs");
    } 
?>
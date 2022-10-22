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
        $page = $_REQUEST["page"];
    } else {
        exitWithError(400, "No song id provided");
    }

    $sql = "SELECT * FROM Song WHERE song_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $song_id);

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 0) {
            exitWithError(404, "Song not found");
        }
        $data = array(
            "song_title" => $row["song_title"],
            "singer" => $row["singer"],
            "publish_date" => $row["publish_date"],
            "genre" => $row["genre"],
            "file_path" => $row["file_path"],
            "album_id" => $row["album_id"],
            "duration" => $row["duration"],
        );
        exitWithDataReturned($data);
    } else {
        exitWithError(500, "Error while fetching songs");
    } 
?>
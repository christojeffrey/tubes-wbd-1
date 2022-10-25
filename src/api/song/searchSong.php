<?php
    require_once '../../global.php';

    // connect to database
    $map = backendConnection();
    $conn = $map['conn'];
    if ($map['err'] != null) {
        $conn->close();
        exitWithError(500, $map['err']);
    }
            
    $input = file_get_contents('php://input');
    $body = json_decode($input,true);

    // loop, but for now only search for last search key (due to bind param constraints)
    foreach ($body as $search_key_value) {
        // validate information. check if 'search_key' and 'search_value' is not null
        validateNeededKeys($search_key_value, array('search_key', 'search_value'));
        validateKeyValueIsNotNull($search_key_value, ['search_key', 'search_value']);
        $search_key = $search_key_value['search_key'];
        if ($search_key == 'title') {
            if (isset($sql)) {
                $sql .= " AND song_title LIKE CONCAT( '%', ?, '%')";
            } else {
                $sql = "SELECT * FROM Song WHERE song_title LIKE CONCAT( '%', ?, '%')";
            }
        } else if ($search_key == 'singer') {
            if (isset($sql)) {
                $sql .= " AND singer LIKE CONCAT( '%', ?, '%')";
            } else {
                $sql = "SELECT * FROM Song WHERE singer LIKE CONCAT( '%', ?, '%')";
            }
        } else if ($search_key == 'year') {
            if (isset($sql)) {
                $sql .= " AND YEAR(publish_date) = ?";
            } else {
                $sql = "SELECT * FROM Song WHERE YEAR(publish_date) = ?";
            }
        } else {
            $conn->close();
            exitWithError(400, 'Search key is not valid');
        }
    }
    
    $stmt = $conn->prepare($sql);

    // loop, but for now only search for last search key (due to bind param constraints)
    foreach ($body as $search_key_value) {
        $search_value = $search_key_value['search_value'];
        $stmt->bind_param('s', $search_value);
    }

    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $song = array(
                "song_id" => $row["song_id"],
                "song_title" => $row["song_title"],
                "singer" => $row["singer"],
                "publish_date" => $row["publish_date"],
                "genre" => $row["genre"],
                "audio_path" => $row["audio_path"],
                "image_path" => $row["image_path"],
                "duration" => $row["duration"]
            );
            array_push($data, $song);
        }
        $conn->close();
        exitWithDataReturned($data);
    } else {
        $conn->close();
        exitWithError(500, 'Error executing query');
    }

?>
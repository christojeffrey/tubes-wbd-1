<?php
    require_once '../../global.php';
    $map = backendConnection();
    if($map['err'] != null){
        exitWithError(500, $map['err']);
    }
    $conn = $map['conn'];
    if (empty($_REQUEST["singer"])) {
        $conn->close();
        exitWithError(400, "singer unspecified");
    }
    $singer = $_REQUEST["singer"];
    $album_free = false;
    if (isset($_REQUEST["album-free"])) {
        $album_free = $_REQUEST["album-free"] == "1";
    }

    if ($album_free){
        $stmt = $conn->prepare("SELECT * FROM Song WHERE singer = ? AND album_id IS NULL ORDER BY song_title ASC");
    } else {
        $stmt = $conn->prepare("SELECT * FROM Song WHERE singer = ?  ORDER BY song_title ASC");
    }

    $stmt->bind_param("s", $singer);

    if(!$stmt->execute()){
        $conn->close();
        exitWithError(500, "Internal Server Error");
    }

    $result = $stmt->get_result();
    $songs = array();
    $song_count = 0;
    while($row_song = $result->fetch_assoc()){
        $song = array(
            "song_id" => $row_song["song_id"],
            "song_title" => $row_song["song_title"],
            "singer" => $row_song["singer"],
            "publish_date" => $row_song["publish_date"],
            "genre" => $row_song["genre"],
            "image_path" => $row_song["image_path"],);
        array_push($songs, $song);
        $song_count++;
    }
    $res = array (
        "songs" => $songs,
        "song_count" => $song_count,
    );
    exitWithDataReturned($res);

?>
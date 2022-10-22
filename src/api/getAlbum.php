<?php
    include 'dbConnection.php';
    $stmt = $conn->prepare("
            SELECT * 
            FROM Album 
            WHERE album_id = ?
            ");
    
    $id = 2;
    $stmt->bind_param('i', $id);
    $stmt->execute();   
    /* bind variables to prepared statement */
    $result = $stmt->get_result();
    $album = $result->fetch_assoc();

    echo $album['album_title'];
?>
<?php
    require_once '../../global.php';

    // Setup needed variables
    $body = json_decode(file_get_contents('php://input'), true);
    $map = backendConnection();
    if ($map['err'] != null) {      
        exitWithError(500, $map['err']);
    }
    
    
    // validate information. check if body has 'username'
    if (!validateNeededKeys($body, array('username'))) {
        exitWithError(400, 'username is needed');
    }

    // do query
    $username = $body['username'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $map['conn']->query($sql);

    // return
    exitWithDataReturned(array('is_unique' =>  $result->num_rows == 0));
?>
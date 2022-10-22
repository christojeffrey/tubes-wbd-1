<?php
    require_once '../../global.php';

    // Setup needed variables
    $body = json_decode(file_get_contents('php://input'), true);
    // connection
    $map = backend_connection();
    if ($map['err'] != null) {
        // todo: change this to use global function
        
        //  status code 500: internal server error
        http_response_code(500);
        // return error message
        echo json_encode(array(
            'error' => $map['err']
        ));
        // stop script
        exit();
    }
    
    
    // validate information. check if body has 'username'
    if (!validate_needed_keys($body, array('username'))) {
        // todo: change this to use global function
        //  status code 400: bad request
        http_response_code(400);
        // return error message
        echo json_encode(array(
            'error' => 'username is needed'
        ));
        // stop script
        exit();
    }

    // do query
    $username = $body['username'];
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $map['conn']->query($sql);
    // check if there is any result
    if ($result->num_rows > 0) {
        // todo: change this to use global function
        // return is_unique = false
        echo json_encode(array(
            'is_unique' => false
        ));
        // stop script
        exit();
    }
    else{
        // todo: change this to use global function
        // return is_unique = true
        echo json_encode(array(
            'is_unique' => true
        ));
        // stop script
        exit();
    }

?>
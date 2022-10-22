<?php
    require_once '../../global.php';

    // Setup needed variables
    $body = json_decode(file_get_contents('php://input'), true);
    $map = backendConnection();
    if ($map['err'] != null) {      
        exitWithError(500, $map['err']);
    }

    // validate information
    if (!validateNeededKeys($body, array('name', 'username', 'password', 'email'))) {
        exitWithError(400, 'name, username, password and email is needed');
    }
    // do query
    $name = $body['name'];
    $username = $body['username'];
    $password = $body['password'];
    $email = $body['email'];
    $sql = "INSERT INTO user (name, username, password, email, role) VALUES ('$name', '$username', '$password', '$email', 'user')";
    $result = $map['conn']->query($sql);

    
    // return user_token
    // encode
    $data = array(
        'id' => $map['conn']->insert_id,
        'username' => $username,
        'email' => $email,
        'role' => 'user'
    );
    $token = encodeToken($data);
    exitWithDataReturned(array('user_token' => $token));
?>
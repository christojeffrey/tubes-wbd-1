<?php
    require_once '../../global.php';

    // Setup needed variables
    $body = json_decode(file_get_contents('php://input'), true);
    $map = backendConnection();
    if ($map['err'] != null) {      
        exitWithError(500, $map['err']);
    }


    // validate information
    if (!validateNeededKeys($body, array('username', 'password'))) {
        exitWithError(400, 'username and password is needed');
    }

    // do query
    $username = $body['username'];
    $password = $body['password'];
    $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
    $result = $map['conn']->query($sql);

    // return
    if ($result->num_rows == 0) {
        exitWithError(400, 'username or password is wrong');
    } else {
        $row = $result->fetch_assoc();
        $data = array(
            'id' => $row['user_id'],
            'username' => $row['username'],
            'email' => $row['email'],
            'role' => $row['role']
        );
        $token = encodeToken($data);
        // if role is user, return user_token. if role is admin, return admin_token

        if ($data['role'] == 'user') {
            exitWithDataReturned(array('user_token' => $token));
        } else  { //($data['role'] == 'admin')
            exitWithDataReturned(array('admin_token' => $token));
        }
    }
?>
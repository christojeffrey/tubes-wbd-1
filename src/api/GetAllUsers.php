<?php
    require_once '../../global.php';
    // Setup needed variables
    // check Auth in header
    $auth = getAuth();
    // if there is no Auth in header
    if ($auth == null) {
        // return error
        exitWithError(401, 'Auth is needed');
    }
    // if role is not admin
    if ($data['role'] != 'admin') {
        // return error
        exitWithError(401, 'Admin is needed');
    }
    
    // get connection
    $map = backendConnection();
    $conn = $map['conn'];
    if ($map['err'] != null) {
        $conn->close();
        exitWithError(500, $map['err']);
    }

    // get usser_id, username, email from users
    // use prepare
    $stmt = $conn->prepare("SELECT user_id, username, email FROM users");



    // get result
    $stmt->execute();
    $result = $stmt->get_result();
    $users = array();
    // loop through the result
    while ($row = $result->fetch_assoc()) {
        // push the row to users
        // format row as an array of user_id, username, email
        array_push($users, array(
            'user_id' => $row['user_id'],
            'username' => $row['username'],
            'email' => $row['email']
        ));
    }
    // return
    $conn->close();
    exitWithDataReturned($users);

?>
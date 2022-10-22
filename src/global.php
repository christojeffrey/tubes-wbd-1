<?php
    // this is a php file that contains function that can be used in other php files
    // ===CONSTANTS===
    // encryption key
    define('ENCRYPTION_KEY', 'this is a key');
        

    // ===FUNCTIONS===


    // return global script and global css. add this in every index.php in page
    function echoGlobal() {
        $html = <<<"EOT"
            <script src="../../global.js"></script>
            <link rel="stylesheet" href="../../global.css" />
        EOT;
        echo $html;
    }


    
    // do connection to the backend. return a map. key: 'conn' value: connection to the backend
    // and key: 'error' value: error message if there is any, else null
    // (kinda like golang's return multiple values)
    function backendConnection(){
        //These are the defined authentication environment in the db service

        // The MySQL service named in the docker-compose.yml.
        $host = 'db';

        // Database use name
        $user = 'tubes';

        //database user password
        $pass = 'tubes';

        $dbname= 'tubes';

        // check the MySQL connection status
        $conn = new mysqli($host, $user, $pass, $dbname);

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        // map of conn, and err
        $map = array(
            'conn' => $conn,
            'err' => $conn->connect_error
        );
        // return the map
        return $map;
    }


    
    // validate needed key in a php array. return true if all needed key is set, else false
    // take body that is an array, and needed_keys that is an array of string
    // example:
    // $body = array(
    //     'username' => 'admin',
    //     'password' => 'admin'
    // );
    // $needed_keys = array('username', 'password');
    function validateNeededKeys($body, $needed_keys){
        // loop through the needed keys
        foreach ($needed_keys as $key) {
            // check if the key is set
            if (!isset($body[$key])) {
                // return false if the key is not set
                return false;
            }
        }
        // return true if all needed key is set
        return true;
    }

    function validateKeyValueIsNotNull($body, $needed_keys){
        // loop through the needed keys
        foreach ($needed_keys as $key) {
            // check if the value is null
            if ($body[$key] == null) {
                // return false if the value is null
                return false;
            }
        }
        // return true if all needed key is set
        return true;
    }

    // function that is used to return from the api. take status code and error message
    function exitWithError($status, $error_msg) {
        $result = array(
          "error" => $error_msg
        );
        http_response_code($status);
        exit(json_encode($result));
      }

    //   function that is used to return from the api. take data which is an array. the data will be returned as json
    function exitWithDataReturned($data) {
        http_response_code(200);
        exit(json_encode($data));
      }
    
    //   funtion to encode token. take an array of data. the data will be encoded as json and encrypted
    function encodeToken($data) {
        // encode the data as json
        $json = json_encode($data);
        // encrypt the json
        $encrypted = openssl_encrypt($json, 'aes-256-cbc', ENCRYPTION_KEY, 0, '1234567890123456');
        // return the encrypted data
        return $encrypted;
    }

    // function to decode token. take token as string. return the decoded data as array
    function decodeToken($token) {
        // decrypt the token
        $decrypted = openssl_decrypt($token, 'aes-256-cbc', ENCRYPTION_KEY, 0, '1234567890123456');
        // decode the decrypted data as json
        $data = json_decode($decrypted, true);
        // return the data
        return $data;
    }

    // get Auth in header. return the token if there is any, else null
    function getAuth() {
        // get the header
        $headers = apache_request_headers();
        // check if the header is set
        if (isset($headers['Authorization'])) {
            // return the token
            return $headers['Authorization'];
        }
        // return null if there is no token
        return null;
    }



    
    // take token from header, and then return
    // {
    //     'is_auth_exist: true || false 
    //     'is_valid':true || false,
    //     'is_admin':true || false,
    // }
    function checkIsAuthTokenValid(){
        // get the token
        $token = getAuth();
        // check if the token is null
        if ($token == null) {
            // return false if the token is null
            return array(
                'is_auth_exist' => false,
                'is_valid' => false,
                'is_admin' => false
            );
        }
        // decode the token
        $data = decodeToken($token);
        // check if the data is null
        if ($data == null) {
            // return false if the data is null
            return array(
                'is_auth_exist' => true,
                'is_valid' => false,
                'is_admin' => false
            );
        }
        // return with is_admin true if role == 'admin'
        return array(
            'is_auth_exist' => true,
            'is_valid' => true,
            'is_admin' => $data['role'] == 'admin'
        );
    }

?>
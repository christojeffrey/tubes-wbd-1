<!-- this is a php file that contains function that can be used in other php files -->
<?php
    // return global script and global css. add this in every index.php in page
    function echo_global() {
        $html = <<<"EOT"
            <script src="../../global.js"></script>
            <link rel="stylesheet" href="../../global.css" />
        EOT;
        echo $html;
    }


    
    // do connection to the backend. return a map. key: 'conn' value: connection to the backend
    // and key: 'error' value: error message if there is any, else null
    // (kinda like golang's return multiple values)
    function backend_connection(){
        //These are the defined authentication environment in the db service

        // The MySQL service named in the docker-compose.yml.
        $host = 'db';

        // Database use name
        $user = 'tubes';

        //database user password
        $pass = 'tubes';

        // check the MySQL connection status
        $conn = new mysqli($host, $user, $pass);
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
    function validate_needed_keys($body, $needed_keys){
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
?>
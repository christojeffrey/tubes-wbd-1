<?php
// get body as json
$body = json_decode(file_get_contents('php://input'), true);
// get the value of the key 'name' from the json
$name = $body['name'];
// get the value of the key 'age' from the json
$age = $body['age'];
// return
echo "Hello $name, you are $age years old";

?>
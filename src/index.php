<!-- this is the entry point of the program -->

<html>
 <head>
  <title>PHP tes</title>
 </head>
 <body>
 <?php echo '<p>Hello World</p>'; ?> 

 <?php
    //These are the defined authentication environment in the db service

    // The MySQL service named in the docker-compose.yml.
    $host = 'db';

    // Database use name
    $user = 'tubes';

    //database user password
    $pass = 'tubes';

    // check the MySQL connection status
    $conn = new mysqli($host, $user, $pass);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected to MySQL server successfully!";
    }
?>
<!-- button on click redirect to pages/login/index.html -->
<button type="switch" class="switch" onclick="location.href='pages/example/index.html'">
    <span>open example page</span>
</button>   



 </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="flex justify-center items-center h-screen bg-black">
        <div class="container flex flex-col w-1/4 bg-white p-12 rounded-lg">
            <label for="username"><b>Username</b></label>
            <input id="username" type="text" placeholder="Enter Username" name="username" required class="border-2"
                oninput="updateUsername(this.value)">
            <label for="email"><b>email</b></label>
            <input id="email" type="text" placeholder="Enter Email" name="email" required class="border-2"
                oninput="updateEmail(this.value)"> <span id="emailStatus">status</span>
            <label for="password"><b>Password</b></label>
            <input id="password" type="password" placeholder="Enter Password" name="password" required class="border-2">
            <!-- button with onclick -->
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4"
                onclick="onLoginClick()">Login</button>
            <div id="status"></div>

        </div>
    </div>
</body>
<?php
    // add global js and styles
    require '../../global.php';
    echoGlobal();
?>
<!-- script -->
<script src="./script.js"></script>

</html>
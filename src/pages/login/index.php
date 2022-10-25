<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- styles -->
    <link rel="stylesheet" href="styles.css">

</head>

<body>
    <div class="flex justify-center items-center h-screen bg-black">
        <div class="container w-1/2 md:w-1/4 bg-gray-800 p-12 rounded-lg">
            <form onsubmit="formSubmit()" class="flex flex-col" onchange="onFormChange()">

                <label for="username"><b>Username</b></label>
                <input id="username" type="text" placeholder="Enter Username" name="username" required
                    class="border-2 bg-black" oninput="updateUsername(this.value)">

                <label for="password"><b>Password</b></label>
                <input id="password" type="password" placeholder="Enter Password" name="password" required
                    class="border-2 bg-black">

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Login</button>
                <div id="status" class="h-6"></div>
            </form>

        </div>
    </div>

</body>
<?php
    // add global js and styles
    require '../../global.php';
    echoGlobal();
?>
<!-- script -->
<script src="script.js"></script>

</html>
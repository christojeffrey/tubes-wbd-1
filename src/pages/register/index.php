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
        <div class="container  w-1/2 lg:w-1/4 bg-white p-12 rounded-lg">
            <form onsubmit="formSubmit()" class="flex flex-col" onchange="onFormChange()">
                <!-- name -->
                <label for="name"><b>Name</b></label>
                <input id="name" type="text" placeholder="Enter Name" name="name" required class="border-2 p-1">
                <span class="h-6 mb-2"></span>


                <label for="username"><b>Username</b></label>
                <input id="username" type="text" placeholder="Enter Username" name="username" required
                    class="border-2 p-1 " oninput="updateUsername(this.value)">
                <span class="h-6 mb-2" id="usernameStatus">status</span>

                <label for="email"><b>email</b></label>
                <input id="email" type="email" placeholder="Enter Email" name="email" required class="border-2 p-1"
                    oninput="updateEmail(this.value)">
                <span class="h-6 mb-2" id="emailStatus">status</span>

                <label for="password"><b>Password</b></label>
                <input id="password" type="password" placeholder="Enter Password" name="password" required
                    class="border-2 p-1">
                <span class="h-6 mb-2"></span>

                <label for="password2"><b>Confirm Password</b></label>
                <input id="password2" type="password" placeholder="Confirm Password" name="password2" required
                    class="border-2 p-1 mb-2">
                <span class="h-6"></span>

                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Register</button>
                <span id="status" class="h-6 mb-1"></span>
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
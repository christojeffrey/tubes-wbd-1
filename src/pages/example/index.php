<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- stylesheet -->
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
    <p><b>Start typing a name in the input field below:</b></p>
    <form action="">
        <label for="fname">First name:</label>
        <input type="text" id="fname" name="fname" onkeyup="showHint(this.value)" />
    </form>
    <p>Suggestions: <span id="txtHint"></span></p>

    <button onclick="doPost()">click me to post</button>
    <p>Suggestions: <span id="postResult"></span></p>

    <?php
     require '../../components/card/card.php';
     echo_card("i am a title", "i am a description", "https://picsum.photos/200/300");
     ?>
</body>
<?php
    // add global js and styles
    require '../../global.php';
    echoGlobal();
  ?>
<!-- script -->
<script src="./script.js"></script>

</html>
<?php
    require_once '../../global.php';
    $map = backendConnection();
    if($map['err'] != null){
        exitWithError(500, $map['err']);
    }
    $conn = $map['conn'];
    

?>
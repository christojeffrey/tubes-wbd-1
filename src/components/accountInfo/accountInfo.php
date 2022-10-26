<?php
  function accountInfo($args){
    // $username
    extract($args);
    $html = <<<EOT
    <style>
    .account-info-container{
      // border: 2px solid white;
      text-align: right;
      padding: 10px;
    }
    </style>
    <div class="account-info-container">
     Username: $username
    </div>
    EOT;
    return $html;
  }
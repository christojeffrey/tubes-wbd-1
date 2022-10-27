<?php
  function accountInfo($args){
    // $username
    extract($args);
    $html = <<<EOT
    <style>
    .account-info-container{
      text-align: right;
    }

    .account-info-label {
      margin-right: 20px;
      color: white;
      font-size: 20px
      font-weight: 300;
      padding: 20px
      
    }
    </style>
    <div class="account-info-container">
      <p class="account-info-label">
        Hi, $username!
      </p>
    </div>
    EOT;
    return $html;
  }
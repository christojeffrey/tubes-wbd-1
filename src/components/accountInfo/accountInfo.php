<?php
  function accountInfo($args){
    // $username
    extract($args);
    $html = <<<EOT
    <div class="flex flex-col">
      <h1 class="text-2xl">Account Info</h1>
      <p>Username: $username</p>
    </div>
    EOT;
    return $html;
  }
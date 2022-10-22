<?php
function exit_with_error($status, $error_msg) {
    $result = array(
      "error" => "No page number provided"
    );
    http_response_code($status);
    exit(json_encode($result));
  }

function return_respose_with_data($data) {
    http_response_code(200);
    exit(json_encode($data));
  }
?>
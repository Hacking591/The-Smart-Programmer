// login.php (shumë e thjeshtë për testim)
<?php
  echo json_encode([
    "username" => "testuser",
    "role" => $_POST["role"]
  ]);
?>

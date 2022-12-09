<?php
  $conn = mysqli_connect("127.0.0.1", "admin", "admin", "BBS");

  if(mysqli_connect_error()) {
    echo "MySQL 연결오류:" .mysqli_connect_error();
  }
?>

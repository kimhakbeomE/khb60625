<?php
  $db_con = mysqli_connect("127.0.0.1", "admin", "admin", "bbs");

  if(mysqli_connect_error()) {
    echo "MySQL 연결오류:" .mysqli_connect_error();
  }
?>

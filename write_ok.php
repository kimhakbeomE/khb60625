<?php

$title = $_POST['Title'];
$content = $_POST['Content'];
$name = $_POST['userName'];

include('DB/board_db.php');

if($title && $content && $name != "")
{
  $board_sql = "INSERT INTO board (Num, Title, Content, userName, userDate) VALUES('0', '$title', '$content', '$name',CURRENT_TIMESTAMP)";

  $query = mysqli_query($db_con, $board_sql);
  

  echo "<script>alert('글쓰기에 성공했습니다.'); location.href='list.php';</script>";
}
else {
  echo "<script>alert('글쓰기에 실패했습니다.'); history.back();</script>";
}

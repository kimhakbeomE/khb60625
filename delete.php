<?php
  include("DB/Connection.php");

  $sql = "SELECT * FROM board"; // 전체 board 테이블 추출
  $res = mysqli_query($db_con, $sql); // 전체 board 테이블 추출

  $row = mysqli_fetch_array($res); // 글 번호 추출을 위한 mysqli_fetch_array 사용

  $num = $row['Num']; // 글번호에 해당하는 값 num 변수에 입력
  $select = "DELETE FROM board WHERE Num='$num'"; // SQL문
  $rss = mysqli_query($db_con,$select); // 선택 게시글 삭제

  mysqli_close($db_con);
?>
<script type="text/javascript">alert('삭제되었습니다.');</script>
<script type="text/javascript">location.href='list.php'</script>

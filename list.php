<!DOCTYPE html>
<?php session_start(); ?>
<html lang="ko">
<head>
  <title>게시글 목록</title>
  <!-- bootstrap CSS -->
  <?php include("header.php");?>
</head>
<body>
  <!-- navigation -->
  <?php include("navbar.php");?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">번호</th>
        <th scope="col">제목</th>
        <th scope="col">작성자</th>
        <th scope="col">작성일</th>
      </tr>
    </thead>

    <?php

      // 전체 회원 수
    	#$db_con = mysqli_connect('127.0.0.1', 'admin', 'admin', 'BBS');
    	include('DB/Connection.php');

      // 기존 쿼리에 페에지 개념을 도입 limit
    	$sql = "SELECT * FROM board"; // 내림 차순으로 정렬 및 10개의 레코드까지 출력 // ORDER BY no DESC limit ".$start.", ".$list_num."
    	$res = mysqli_query($db_con, $sql); // mysql query 실행

    	while($row = mysqli_fetch_array($res)) {

    ?>

    <tbody>
      <tr class="table-active">
        <td><?php echo $row['Num']; ?></td>
        <td><a href='read.php?Num=<?=$row['Num']?>'><?=$row['Title'];?></a></td>
        <td><?php echo $row['userName']; ?></td>
        <td><?php echo $row['userDate']; ?></td>
      </tr>
    </tbody>

    <?php } ?>
  </table>
  <div>
    <a href="write.php"><button class="w-10 btn btn-lg btn-primary" type="submit">글쓰기</button></a>

  </div>
</body>
  <!-- bootstrap  JS -->
  <?php include("foot.php");?>
</html>

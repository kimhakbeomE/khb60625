<!DOCTYPE html>
<?php session_start(); ?>
<html lang="ko">
<head>
  <title>게시글 목록</title>
  <?php include("header.php");?>
</head>
<body>
  <?php include("DB\Connection.php");
    $num = $_GET['Num'];
    $query = "SELECT * FROM board WHERE Num='$num';";
    $board = mysqli_query($db_con, $query);

    while($row = mysqli_fetch_array($board)) {  ?>
    <br>
    <div class="card border-primary mb-4" style="max-width: 60rem; height: 500px;">
      <div class="card-header" style type="text/css"><?php echo $row['Title']; ?></div>
      <div class="card-body">
        <p class="card-text"><?php echo nl2br($row['Content']); //글 \n 을 엔터로 인식하도록 <br>로 변환 처리?></p>
      </div>
    </div>
    <?php } ?>
     <!-- 게시글 읽기 밑에 버튼 -->
     <a href="update.php"><button class="w-10 btn btn-lg btn-primary" type="button">수정</button></a>
     <a href="delete.php"><button class="w-10 btn btn-lg btn-primary" type="button">삭제</button></a>
     <a href="list.php"><button type="button" class="w-10 btn btn-lg btn-primary">목록</button></a>
</body>
  <!-- bootstrap  JS -->
  <?php include("foot.php");?>
</html>

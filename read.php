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
        <p class="card-text"><?php echo $row['Content']; ?></p>
      </div>
    </div>
    <?php } ?>
     <!-- 게시글 읽기 밑에 버튼 -->
     <a href="delete.php"><button class="w-10 btn btn-lg btn-primary" type="submit">글삭제</button></a>
</body>
  <!-- bootstrap  JS -->
  <?php include("foot.php");?>
</html>

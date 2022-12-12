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

      <?php echo $row['Num']; ?>
      <?php echo $row['Title']; ?>
      <?php echo $row['Content']; ?>
      <?php echo $row['userName']; ?>
      <?php echo $row['userDate']; ?>


    <?php } ?>
</body>
  <!-- bootstrap  JS -->
  <?php include("foot.php");?>
</html>

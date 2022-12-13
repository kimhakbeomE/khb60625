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
  <div>
      <form action="write_ok.php" method="post">
          <div>
              <textarea class="form-control" name="Title" style="width:800px; height:10px;" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
              <textarea class="form-control" name="userName" style="width:800px; height:10px;" rows="1" cols="55" placeholder="작성자" maxlength="100" required></textarea>
              <textarea class="form-control" name="Content" style="width:1000px; height:400px;" placeholder="내용" required></textarea>
          </div>
          <div>
              <button type="submit" class="w-10 btn btn-lg btn-primary">작성</button>
              <a href="list.php"><button type="button" class="w-10 btn btn-lg btn-primary">목록</button></a>
          </div>
      </form>
  </div>
</div>
</body>
  <!-- bootstrap  JS -->
  <?php include("foot.php");?>
</html>

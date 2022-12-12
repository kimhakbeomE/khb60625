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
              <textarea name="Title" rows="1" cols="55" placeholder="제목" maxlength="100" required></textarea>
          </div>
          <div class="wi_line"></div>
          <div>
              <textarea name="Content"  rows="1" cols="55" placeholder="글쓴이" maxlength="100" required></textarea>
          </div>
          <div class="wi_line"></div>
          <div>
              <textarea name="userName" placeholder="내용" required></textarea>
          </div>
          <div class="bt_se">
              <button type="submit">글 작성</button>
          </div>
      </form>
  </div>
</div>
</body>
  <!-- bootstrap  JS -->
  <?php include("foot.php");?>
</html>

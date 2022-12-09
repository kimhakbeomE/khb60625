<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>회원가입</title>

    <!-- Bootstrap core CSS -->
    <link href="css\bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="bootstrap-5.1.3-examples\bootstrap-5.1.3-examples\sign-in\signin.css">

    <!-- Custom styles for this template -->
    <link href="bootstrap-5.1.3-examples\bootstrap-5.1.3-examples\sign-in\signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
	<?php if(!isset($_SESSION['userID']) || !isset($_SESSION['userName'])) { ?>
    <main class="form-signin">
      <form action="regster_ok.php" method="post">
        <!-- userName -->
        <div class="form-floating mb-2">
          <input type="text" name="userName"class="form-control" id="floatingpassword" placeholder="userName">
          <label for="floatingpassword">Name</label>
        </div>

        <!-- userID  -->
        <div class="form-floating mb-2">
          <input type="text" name="userID" class="form-control" id="floatingpassword" placeholder="userID">
          <label for="floatingpassword">ID</label>
        </div>

        <!-- Password  -->
        <div class="form-floating mb-2 ">
          <input type="password" name="userPassword"class="form-control" id="floatingpassword" placeholder="Password">
          <label for="floatingpassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">회원가입</button>
        <p class="mt-2 mb-3 text-muted">&copy; 2022–2023</p>
      </form>
	  <small><a href="login.php">이미 회원이신가요?</a><small>
	  <?php } else {
				$userID = $_SESSION['userID'];
				$userName = $_SESSION['userName'];
				echo "<p> $userName($userID)님은 이미 로그인되어 있습니다.";
				echo "<p><button onclick=\"window.location.href='main.php'\">메인으로</button> <button onclick=\"window.location.href='logout.php'\">로그아웃</button></p>";
				   }?>
    </main>
  </body>
  <script src="js\bootstrap.bundle.min.js"></script>
</html>

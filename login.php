<!doctype html>
<?php session_start(); ?>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>로그인</title>

    <link rel="canonical" href="bootstrap-5.1.3-examples\bootstrap-5.1.3-examples\sign-in\signin.css">

    <!-- Bootstrap core CSS -->
	<link href="css\bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="bootstrap-5.1.3-examples\bootstrap-5.1.3-examples\sign-in\signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
	<?php if(!isset($_SESSION['userID']) || !isset($_SESSION['userName'])) { ?>
    <main class="form-signin">
      <form action="login_ok.php" method="post">

        <!-- userID -->
        <div class="form-floating mb-2">
          <input type="text" name="userID" class="form-control" id="floatinguserID" placeholder="ID">
          <label for="floatinguserID">ID</lebel>
        </div>

        <!-- Password  -->
        <div class="form-floating mb-2">
          <input type="password" name="userPassword" class="form-control" id="floatingpassword" placeholder="Password">
          <label for="floatingpassword">Password</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">로그인</button>
        <p class="mt-2 mb-3 text-muted">&copy; 2022–2023</p>
      </form>
      <small><a href="regster.php">아이디가 없으신가요?</a><small>
		<?php } else {
			$userID = $_SESSION['userID'];
			$userName = $_SESSION['userName'];
    }?>
    </main>
  </body>
  <script src="js\bootstrap.bundle.min.js"></script>
</html>

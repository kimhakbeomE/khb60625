<?php
$userID = $_POST['userID'];
$userPassword = $_POST['userPassword'];

if( $userID && $userPassword != "") // 공백 체크
{
  $db_conn = mysqli_connect('127.0.0.1', 'admin', 'admin', 'BBS'); // DB 연결
  $DB_ID = "SELECT * FROM bbs WHERE userID='$userID'"; // 해당하는 아이디의 컬럼 정보 가져오기
  $DB_PW = "SELECT userPassword FROM bbs WHERE userid='$userID'"; // 암호화 된 DB 패스워드 가져오기

  $res_pw = mysqli_fetch_array(mysqli_query($db_conn, $DB_PW)); // DB에서 입력한 아이디값에 해당하는 암호화된 패스워드 가져오기
  $res = mysqli_fetch_array(mysqli_query($db_conn, $DB_ID) ); // 입력값에 해당하는 아이디에 대한 컬럼값을 배열로 가져오기

 	if( password_verify($userPassword, $res_pw[0]) ) // 비밀번호 비교
 	{
 		session_start();
 		if($res)
 		{
 			$_SESSION['userID'] = $res['userID']; // 세션 부여
 			$_SESSION['userName'] = $res['userName'];

 			echo "<script>alert('로그인에 성공하였습니다.');</script>";
 			echo "<script>document.location.href='http://127.0.0.1/web/main.php';</script>"; //server ip 및 web 어플리케이션 디렉토리 주소 입력
 			# echo "<script>document.location.href='http://127.0.0.1/web/main.php';</script>";
 		}
 		else
 		{
 			echo "<script>alert('로그인에 실패하였습니다.'); history.back(-2); </script>";
 		}
 	}
 	else
 	{
 		echo "패스워드가 맞지 않습니다.";
 	}

}
else
{
  echo "<script>alert('입력값 중에 빈 값이 존재합니다.'); history.go(-1);</script>";
}

?>

<meta http-equiv="refresh" content="0;url=main.php">

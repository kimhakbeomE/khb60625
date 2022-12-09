<?php
	$name = $_POST['userName'];
	$id = $_POST['userID'];
	$pw = $_POST['userPassword'];

	if( $id && $name != "") 
	{
	
		include('DB/Connection.php'); //DB 연결
		$sql_name = "SELECT * FROM bbs WHERE userName='$name'"; // DB에 입력받은 Name 값이 존재하는지 검증
		$sql_id = "SELECT * FROM bbs WHERE userID='$id'"; 		// DB에 입력받은 아이디값이 존재하는지 검증

		
		$result_name = mysqli_query($db_con, $sql_name);
		$result_id = mysqli_query($db_con, $sql_id);				
			
		$row_name = mysqli_num_rows($result_name); // mysqli_num_rows = 쿼리 결과값 카운트 아이디가 존재한다면 1이 출력될 것이고 존재하지 않는다면 0이 출력 될 것이다.
		$row_id = mysqli_num_rows($result_id);
	
		if( $row_name != 0)
  		{
    		echo "<script>alert('해당 이름은 사용중입니다.'); history.go(-1);</script>";
  		}
  		elseif ( $row_id != 0 ) 
 	 	{
    		echo "<script>alert('해당 아이디는 사용중입니다.'); history.go(-1);</script>";
  		}
  		else
  		{
    		$pw_s = password_hash($pw, PASSWORD_DEFAULT); // 패스워드 암호화
    		$insert = "INSERT INTO bbs (no, userName, userID, userPassword, userPriv, userDate) VALUES('0', '$name', '$id', '$pw_s', '3', CURRENT_TIMESTAMP)";
    		mysqli_query($db_con, $insert);
    		echo "<script>alert('회원가입 완료'); history.go('-2'); </script>";
  		}
	} 
	else 
	{
		echo "<script>alert('입력값 중에 빈 값이 존재합니다.'); history.go(-1);</script>";		
	}
	
	mysqli_close(); 
?>
<script>
	alert('회원가입 완료');
	location.href='http://127.0.0.1/web/login.php';
</script>

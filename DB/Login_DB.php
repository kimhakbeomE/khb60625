<?php
// DB에 테이블 생성 할 수 있는 권한이 있는 계정이 필요함 (해당부분 수정이 필요할듯) #23.3.10

//초기 사용자 처리 DB 생성


$sql = "CREATE DATABASE BBS";

$sql2 = "CREATE TABLE members
(
  no INT not null AUTO_INCREMENT,
  userName varchar(100) not null,
  userID varchar(100) not null,
  userPassword varchar(100) not null,
  userPriv INT not null,
  userDate timestamp not null default current_timestamp,
  PRIMARY KEY (no)
)";


$admin_none = "MyAdmin"; // admin 변수로 지정
$admin_ps = password_hash($admin_none, PASSWORD_DEFAULT); //관리자 비밀번호를 암호화
$sql3 = "INSERT INTO members (no, userName, userID, userPassword, userPriv, userDate) VALUES('0', '관리자', 'MyAdmin', '$admin_ps', '1', CURRENT_TIMESTAMP)";




$con = mysqli_connect("127.0.0.1", "MyAdmin", "Mana951@#!"); //DB 연결, 최초 DB연결이기 때문에 해당 첫 사용 시에만 사용할 계정이 필요할 거 같음 23.3.10

if(mysqli_connect_error())
{
  echo "MySQL 연결에 오류가 발생하였습니다.:" .mysqli_connect_error();
}
else
{
  if(mysqli_query($con,$sql)) //DB 생성
  {
    echo "DB 생성이 완료되었습니다. \n";
    mysqli_close($con);

    $conn = mysqli_connect("127.0.0.1", "MyAdmin", "Mana951@#!", "BBS");
    if(mysqli_query($conn,$sql2)) // TABLE 생성
    {
      echo "테이블 생성이 완료되었습니다. \n";

      if(mysqli_query($conn,$sql3)) // TABLE 초기값 입력
      {
        echo "초기 데이터 값이 입력되었습니다. \n";
      }
      else
      {
        echo "초기 데이터 값 입력 도중 오류가 발생하였습니다.:" .mysqli_error($db_conn);
      }
    }
    else
    {
      echo " 테이블 생성에 실패하였습니다.:" .mysqli_error($db_conn);
    }
  }
  else
  {
    echo " DB 생성에 실패하였습니다. :" .mysqli_error($conn);
  }
	mysqli_close($conn);
}
?>

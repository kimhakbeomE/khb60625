<?php
  include('Connection.php');


  // 게시판 DB 테이블 생성
  $board_sql = "CREATE TABLE board(
   Num INT not null AUTO_INCREMENT,
   Title varchar(100) not null,
   Content varchar(300) not null,
   userName varchar(20) not null,
   userDate timestamp not null default current_timestamp,
   PRIMARY KEY (Num)
)";

  // 초기 값 입력
  $board_sql2 = "INSERT INTO board (Num, Title, Content, userName, userDate) VALUES('0', '제목 입력 테스트', '내용입력칸입니다.', 'admin',CURRENT_TIMESTAMP)";


?>

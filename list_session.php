<?php
# 관리자만이 해당페이지에 접근할 수 있도록 접근제어

session_start();

# 사용자의 ID와 Name 값을 가져온다.
$id = isset($_SESSION["userID"])? $_SESSION["userID"]:"";
$name = isset($_SESSION["userName"])? $_SESSION["userName"]:"";


# 관리자가 아닌 경우 index문서로 이동
if(!$id || ($id == "")){ // 가져온 아이디값이 admin과 일치하는지 검증
    echo "<script> alert('로그인이 필요합니다.'); history.back(-1);</script>";
};


?>

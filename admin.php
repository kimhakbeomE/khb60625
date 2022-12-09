<?php
	include("admin_session.php"); // 관리자 페이지 접근 시 관리자 계정의 세션만을 허용하는 php파일을 불러온다.
?>

<!DOCTYPE html>
<html lang="ko" dir="ltr">
<head>
  <?php include("header.php");?>
  <meta charset="utf-8">
  <title>관리자 페이지</title>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">메인</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto">
      <li class="nav-item">
      <a class="nav-link active" href="#">회원정보
        <span class="visually-hidden">(current)</span>
      </a>
    </li>
      <li class="nav-item">
        <a class="nav-link" href="#">게시판 관리</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <!-- dropdown -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Separated link</a>
        </div>
      </li>
      </ul>
        <form class="d-flex">
        <input class="form-control me-sm-2" type="text" placeholder="Search">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<!-- ------------------------ 회원정보의 리스트 출력  ------------------------------------ -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">순서</th>
      <th scope="col">닉네임</th>
      <th scope="col">아이디</th>
      <th scope="col">패스워드</th>
	  <th scope="col">권한</th>
	  <th scope="col">생성시간</th>
    </tr>
  </thead>
<?php
	//pageing 

    $cnt = 1; //각 페이지 회원 수

    // 전체 회원 수
    $db_con = mysqli_connect('127.0.0.1', 'admin', 'admin', 'BBS');
    $sql_query = "SELECT * FROM bbs";
    $result = mysqli_query($db_con, $sql_query);
    $num = mysqli_num_rows($result);

    // 한 페이지당 데이터 개수 ( 한 페이지당 보여줄 데이터 개수 )
    $list_num = 10;

    // 한 블럭당 페이지 개수 
    $page_num = 5;

    //현재 페이지
    $page = isset($_GET['page'])?$_GET['page'] : 1; //삼항식

    //전체 페이지 수  = 전체 데이터 / 페이지당 데이터 개수, ceil(올림), floor(내림), round(반올림)
    $total_page = ceil($num / $list_num);

    //전체 블럭 수 = 전체 페이지 수 / 블럭당 페이지 수
    $total_block = ceil($total_page / $page_num);

    //현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수
    $now_block = ceil($page / $page_num);

    //블럭 당 시작 페이지 번호 = (해당 글의 블럭 번호 -1) * 블럭 당 페이지 수 + 1
    $s_pageNum = ($now_block -1) * $page_num + 1;

    //데이터가 0개인 경우
    if($s_pageNum == 0) {
      $s_pageNum = 1;
    }

    //블럭 당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수
    $e_pageNum = $now_block * $page_num;

    //마지막 번호가 전체 페이지를 넘지 않도록 한다.
    if($e_pageNum > $total_page) {
      $e_pageNum = $total_page;
    }

    //시작 번호 = (현재 페이지 번호 -1) * 페이지당 보여질 데이터 수
    $start = ($page -1) * $list_num;

    //글번호
    $cnt = $start + 1;

    // 기존 쿼리에 페에지 개념을 도입 limit 	
	$sql = "SELECT * FROM bbs ORDER BY no DESC limit ".$start.", ".$list_num.""; // 내림 차순으로 정렬 및 10개의 레코드까지 출력
	$res = mysqli_query($db_con, $sql); // mysql query 실행

	while($row = mysqli_fetch_array($res)) {

	
?>
	<tbody>
		<tr class="talbe-active">
			<td><?php echo $row['no']; ?></td>
			<td><?php echo $row['userName']; ?></td>
			<td><?php echo $row['userID']; ?></td>
			<td><?php echo $row['userPassword']; ?></td>
			<td><?php echo $row['userPriv']; ?></td>
			<td><?php echo $row['userDate']; ?></td>
		</tr>
	</tbody>
	
<?php }  ?>
</table>
<!-- pageing  -->
<div>
  <ul class="pagination">
    <?php
      if($page <= 1) { ?>
        <li class="page-item disabled">
          <a class="page-link" href="admin.php?page=1">이전</a>
        </li>
      <?php } else { ?>
        <li class="page-item">
          <a class="page-link" href='admin.php?page=<?php print_r($page -1); ?>'>이전</a>
        </li>
      <?php } ?>

    <?php for($p = $s_pageNum; $p <= $e_pageNum; $p++) { ?> 
		<?php if($page == $p) { ?>
    	<li class="page-item active">
      		<a class="page-link" href='admin.php?page=<?php print_r($p); ?> '><?php print_r($p); ?> </a>
    	</li>
		<?php } else { ?>
		<li class="page-item">
			<a class="page-link" href='admin.php?page=<?php print_r($p); ?> '><?php print_r($p); ?> </a>
		</li>
		<?php } ?>
	<?php } ?>

    <?php
      if($page >= $total_page) { ?>
        <li class="page-itemi disabled">
          <a class="page-link" href='admin.php?page=<?php print_r($total_page);?>'>다음</a>
        </li>
      <?php } else { ?>
        <li class="page-item">
          <a class="page-link" href='admin.php?page=<?php print_r($page +1);?>'>다음</a>
        </li>
      <?php } ?>
   </ul>
</div>
</body>
  <!--bootstrap JS-->
  <?php include("foot.php")?>
</html>

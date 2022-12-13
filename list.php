<?php
	include("list_session.php"); // 관리자 페이지 접근 시 관리자 계정의 세션만을 허용하는 php파일을 불러온다.
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <title>게시글 목록</title>
  <!-- bootstrap CSS -->
  <?php include("header.php");?>
</head>
<body>
  <!-- navigation -->
  <?php include("navbar.php");?>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">번호</th>
        <th scope="col">제목</th>
        <th scope="col">작성자</th>
        <th scope="col">작성일</th>
      </tr>
    </thead>

    <?php
		//pageing -1

		  // 전체 회원 수
			#$db_con = mysqli_connect('127.0.0.1', 'admin', 'admin', 'BBS');
			include('DB/Connection.php');

		    $sql_query = "SELECT * FROM board";
		    $result = mysqli_query($db_con, $sql_query);
		    $num = mysqli_num_rows($result);

		    // 한 페이지당 데이터 개수 ( 한 페이지당 보여줄 데이터 개수 )
		    $list_num = 10;

		    // 한 블럭당 페이지 개수
		    $page_num = 5;

		    //현재 페이지
		    $page = isset($_GET['Num'])?$_GET['Num'] : 1; //삼항식

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

		    // 기존 쿼리에 페에지 개념을 도입 limit
			$sql = "SELECT * FROM board ORDER BY Num DESC limit ".$start.", ".$list_num.""; // 내림 차순으로 정렬 및 10개의 레코드까지 출력
			$res = mysqli_query($db_con, $sql); // mysql query 실행

    	while($row = mysqli_fetch_array($res)) {

    ?>

    <tbody>
      <tr class="table">
        <td><?php echo $row['Num']; ?></td>
        <td><a href='read.php?Num=<?=$row['Num']?>'><?=$row['Title'];?></a></td>
        <td><?php echo $row['userName']; ?></td>
        <td><?php echo $row['userDate']; ?></td>
      </tr>
    </tbody>

    <?php } ?>
  </table>


	<!-- pageing -2 -->
	<div>
	  <ul class="pagination" style="width: 200px; margin: 0 auto;">
	    <?php
	      if($page <= 1) { ?>
	        <li class="page-item disabled">
	          <a class="page-link" href="list.php?Num=1">이전</a>
	        </li>
	      <?php } else { ?>
	        <li class="page-item">
	          <a class="page-link" href='list.php?Num=<?php print_r($page -1); ?>'>이전</a>
	        </li>
	      <?php } ?>

	    <?php for($p = $s_pageNum; $p <= $e_pageNum; $p++) { ?>
			<?php if($page == $p) { ?>
	    	<li class="page-item active">
	      		<a class="page-link" href='list.php?Num=<?php print_r($p); ?> '><?php print_r($p); ?> </a>
	    	</li>
			<?php } else { ?>
			<li class="page-item">
				<a class="page-link" href='list.php?Num=<?php print_r($p); ?> '><?php print_r($p); ?> </a>
			</li>
			<?php } ?>
		<?php } ?>

	    <?php
	      if($page >= $total_page) { ?>
	        <li class="page-itemi disabled">
	          <a class="page-link" href='list.php?Num=<?php print_r($total_page);?>'>다음</a>
	        </li>
	      <?php } else { ?>
	        <li class="page-item">
	          <a class="page-link" href='list.php?Num=<?php print_r($page +1);?>'>다음</a>
	        </li>
	      <?php } ?>
	   </ul>
	</div>

	<div>
		<!-- list 페이지 버튼 -->
		<a href="write.php"><button class="btn btn-secondary" type="submit">글쓰기</button></a>
	</div>
</body>
  <!-- bootstrap  JS -->
  <?php include("foot.php");?>
</html>

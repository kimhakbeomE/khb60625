<!doctype html>
<?php session_start(); ?>
<html lang="ko">
<head>
  <title>메인페이지</title>
  <?php include("header.php");?>
</head>

<body>
<?php include("navbar.php");?>


<!-- 로그인 시 로그아웃 버튼 보이게 설정 및 세션 설정 -->
<?php
	if(!isset($_SESSION['userID']) || !isset($_SESSION['userName'])) {
?>
<div class="row">
	<div class="col-lg-7">
		<div class="bs-component">
			<p> 로그인을 해 주세요. </p>
			<button onclick="location.href='login.php'";  class="btn btn-primary">로그인</button> <button onclick="location.href='regster.php'"; class="btn btn-primary">회원가입</button>
			<?php } else { ?>
				<?php
				$userID = $_SESSION['userID'];
				$userName = $_SESSION['userName'];
				echo "<p>$userName($userID)님 환영합니다.";
				?>
				<p><button onclick="location.href='logout.php'"; class="btn btn-primary">로그아웃</button></p>
			<?php } ?>
		</div>
	</div>
</div> 



<?php echo"<br>" ?>
<!-- Card border -->
<div class="row">
  <div class="col-lg-4">
    <div class="bs-component">
      <div class="card border-primary mb-3" style="max-width: 20rem;">
        <div class="card-header">Header</div>
        <div class="card-body">
          <h4 class="card-title">Primary card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card border-secondary mb-3" style="max-width: 20rem;">
        <div class="card-header">Header</div>
        <div class="card-body">
          <h4 class="card-title">Secondary card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card border-success mb-3" style="max-width: 20rem;">
        <div class="card-header">Header</div>
        <div class="card-body">
          <h4 class="card-title">Success card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card border-danger mb-3" style="max-width: 20rem;">
        <div class="card-header">Header</div>
        <div class="card-body">
          <h4 class="card-title">Danger card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
   </div>
 </div>
 <div class="col-lg-4">
   <div class="bs-component">
     <div class="card border-warning mb-3" style="max-width: 20rem;">
       <div class="card-header">Header</div>
       <div class="card-body">
         <h4 class="card-title">Warning card title</h4>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       </div>
     </div>
     <div class="card border-info mb-3" style="max-width: 20rem;">
       <div class="card-header">Header</div>
       <div class="card-body">
         <h4 class="card-title">Info card title</h4>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       </div>curl: (28) Operation timed out after 300167 milliseconds with 0 out of 0 bytes received
     </div>
     <div class="card border-light mb-3" style="max-width: 20rem;">
       <div class="card-header">Header</div>
       <div class="card-body">
         <h4 class="card-title">Light card title</h4>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       </div>
     </div>
     <div class="card border-dark mb-3" style="max-width: 20rem;">
       <div class="card-header">Header</div>
       <div class="card-body">
         <h4 class="card-title">Dark card title</h4>
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
       </div>
     </div>
  </div>
 </div>
 <div class="col-lg-4">
   <div class="bs-component">
     <div class="card mb-3">
       <div class="card mb-3">
         <h3 class="card-header">Card header</h3>
         <div class="card-body">
           <h5 class="card-title">Special title treatment</h5>
           <h6 class="card-subtitle text-muted">Support card subtitle</h6>
         </div>
         <svg xmlns="http://www.w3.org/2000/svg" class="d-block user-select-none" width="100%" height="200" aria-label="Placeholder: Image cap" focusable="false" role="img" preserveAspectRatio="xMidYMid slice" viewBox="0 0 318 180" style="font-size:1.125rem;text-anchor:middle">
           <rect width="100%" height="100%" fill="#868e96"></rect>
           <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Image cap</text>
         </svg>
         <div class="card-body">
           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         </div>
           <ul class="list-group list-group-flush">
             <li class="list-group-item">Cras justo odio</li>
             <li class="list-group-item">Dapibus ac facilisis in</li>
             <li class="list-group-item">Vestibulum at eros</li>
           </ul>
         <div class="card-body">
           <a href="#" class="card-link">Card link</a>
           <a href="#" class="card-link">Another link</a>
         </div>
         <div class="card-footer text-muted">
           2 days ago
         </div>
         </div>
         <div class="card">
           <div class="card-body">
             <h4 class="card-title">Card title</h4>
             <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
             <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
             <a href="#" class="card-link">Card link</a>
             <a href="#" class="card-link">Another link</a>
           </div>
         </div>
       </div>
     </div>
   </div>


   <div class="col-lg-4">
     <div class="bs-component">
       <div class="accordion" id="accordionExample">
         <div class="accordion-item">
           <h2 class="accordion-header" id="headingOne">
             <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
               Accordion Item #1
             </button>
           </h2>
           <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
             <div class="accordion-body">
               <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
             </div>
           </div>
         </div>
         <div class="accordion-item">
           <h2 class="accordion-header" id="headingTwo">
             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
               Accordion Item #2
             </button>
           </h2>
           <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
             <div class="accordion-body">
               <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
             </div>
           </div>
         </div>
         <div class="accordion-item">
           <h2 class="accordion-header" id="headingThree">
             <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
               Accordion Item #3
             </button>
           </h2>
           <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
             <div class="accordion-body">
               <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
  </div>
<!-- -->

  <!-- bootstrap  JS -->
  <?php include("foot.php");?>
  </body>
</html>

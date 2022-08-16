<div>
	<nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">보드게임</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/view/boardList.php">자유게시판</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">추천게시판</a>
            </li>
            <li class="nav-item dropdown">
              <?php 
                if(isset($_SESSION['id'])) {
              ?>
                 <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <?php echo "{$_SESSION['id']}님";?>
                 </a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item" id="logout" href="#">로그아웃</a></li>
                   <li><a class="dropdown-item" href="/view/myPage.php">마이페이지</a></li>
                 </ul>
              
              <?php 
                }else {
              ?>
                 <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  	메뉴
                 </a>
                 <ul class="dropdown-menu">
                   <li><a class="dropdown-item" href="/view/login.php">로그인</a></li>
                   <li><a class="dropdown-item" href="/view/join.php">회원가입</a></li>        	
                 </ul>
              <?php
                }
              ?>

            </li>
          </ul>
          <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        </div>
      </div>
    </nav>
</div>

<script>
	$("#logout").on("click", function () {
		console.log("로그아웃 클릭");
		$.ajax({
			type: "POST",
    		url: "/member/MemberService.php",
    		data: {

    			call_name: "logout"
    		},
    		success: function() {
				location.href = "/index.php";
    		},
    		error: function() {
    			alert("에러");
    		}
		});
	});
</script>
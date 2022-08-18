<?php
session_start();
require_once '../temp/bootstrap.php';
// include_once("../member/MemberService.php");

// $service = new MemberService();

// $member = $service->getMyInfo();
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Member Update Page</title>
</head>

<body>

	<?php require_once '../temp/header.php';?>

	
	<div class="container">
	<h1>Member Update Page</h1>
		<input type="hidden" id="sessionId" value="<?php echo $_SESSION['id'];?>">
        
        <div class="mb-3">
          <label for="name" class="form-label">이름</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="이름을 입력해주세요.">
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">E-Mail</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="이메일을 입력해주세요.">
        </div>
        
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="전화번호를 입력해주세요.">
        </div>
        
        <div class="mb-3">
          <button type="button" id="updateBtn" class="btn btn-primary mb-3">수정</button>
        </div>
    
	</div>
	
<script src="../resources/js/memberUpdate.js"></script>

</body>

</html>
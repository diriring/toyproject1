<?php
session_start();
include '../temp/bootstrap.php';
include_once("../member/MemberService.php");

$service = new MemberService();

$member = $service->getMyInfo();
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Member Update Page</title>
</head>

<body>

	<?php include '../temp/header.php';?>

	
	<div class="container">
	<h1>Member Update Page</h1>

        <div class="mb-3">
          <label for="name" class="form-label">이름</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="이름을 입력해주세요." value="<?php echo $member['name'];?>">
        </div>
        
        <div class="mb-3">
          <label for="email" class="form-label">E-Mail</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="이메일을 입력해주세요." value="<?php echo $member['email'];?>">
        </div>
        
        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" name="phone" id="phone" placeholder="전화번호를 입력해주세요." value="<?php echo $member['phone'];?>">
        </div>
        
        <div class="mb-3">
          <button type="button" id="updateBtn" class="btn btn-primary mb-3" data-id="<?php echo $member['id'];?>">수정</button>
        </div>
    
	</div>

<script>
		$("#updateBtn").on("click", function() {
			console.log("클릭");
    		$.ajax({
    			type: "POST",
    			url: "/member/MemberService.php",
    			data: {
					name: $("#name").val(),
					email: $("#email").val(),
					phone: $("#phone").val(),
					id: $("#updateBtn").attr("data-id"),
    				call_name: "setUpdate"
    			},
    			success: function(result) {
    				console.log(result);
    				if(result == 1) {
    					alert("수정 성공");
    					location.href="./myPage.php";
    					
    				}else {
    					alert("수정 실패");
    					location.href="./myPage.php";
    				}
    			},
    			error: function() {
    				alert("에러");
    			}
    		});
    	});
</script>

</body>

</html>
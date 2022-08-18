<?php
require_once '../temp/bootstrap.php';

session_start();
?>
<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My Page</title>
</head>

<body>
	
	<?php require_once '../temp/header.php';?>

	<div class="container">
		<blockquote class="blockquote">
          <h1 class="my-4">마이페이지</h1>
          <footer class="blockquote-footer">환영합니다, <?php echo $_SESSION['id'];?>님.</footer>
        </blockquote>
    	
    	<input type="hidden" id="sessionId" value="<?php echo $_SESSION['id'];?>">
    	
		<table class="table table-bordered text-center">
			<colgroup>
				<col width="35%"/>
				<col width="65%"/>
			</colgroup>
			<thead>
				<tr>
					<td colspan="2">회원정보</td>
				</tr>
			</thead>
			<tbody id="info">
			
			</tbody>
		</table>
		
		<a class="btn btn-outline-primary" href="./memberUpdate.php">회원 정보 수정</a>
		<a class="btn btn-outline-primary" href="./memberDelete.php">회원 탈퇴</a>
	</div>


<script src="../resources/js/myPage.js"></script>
</body>

</html>
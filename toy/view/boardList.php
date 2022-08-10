<?php 
include '../temp/bootstrap.php';

include_once("../board/boardService.php");
$test = new boardService();
$list = $test->getList();
session_start();
?>
<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Board List Page</title>
</head>

<body>
	
	<?php include '../temp/header.php';?>
	
	<div class="container">
    	<h1>Board List Page</h1>
    	
    	
    	<table class="table table-striped table-hover">
			<colgroup>
				<col width="12%"/>
				<col width="52%"/>
				<col width="12%"/>
				<col width="12%"/>
				<col width="12%"/>
			</colgroup>
			<thead>
				<tr>
					<th>글 번호</th>
					<th>글 제목</th>
					<th>작성자</th>
					<th>작성날짜</th>
					<th>조회수</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($list as $row) : ?>
				<tr>
					<td><?php echo $row['bnum']?></td>
					<td><?php echo $row['title']?></td>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['regDate']?></td>
					<td><?php echo $row['hit']?></td>
				</tr>
				<?php endforeach;?>
			</tbody>

		</table>
    	
    	<a href="./boardWrite.php">글 쓰기</a>
	</div>

<script>
// 	getBoardList();
	
//     function getBoardList() {
//     	$.ajax({
//     		type: "POST",
// 			url: "/board/boardService.php",
// 			data: {
// 				call_name: "getList"
// 			},
// 			success: function(result) {
// 				console.log(result);
//     		}
//     	});
//     }
</script>


</body>

</html>
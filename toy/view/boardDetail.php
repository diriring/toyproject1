<?php
include '../temp/bootstrap.php';
include_once("../board/BoardService.php");
$test = new BoardService();
$board = $test->getDetail($_GET['bnum']);
session_start();
?>

<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Board Detail Page</title>
</head>

<body>
	
	<?php include '../temp/header.php';?>

	<div class="container">
    	<h1>Board Detail Page</h1>
    	
    	<div class="container mt-5">
        	<table class="table">
        		<tr>
        			<td><?php echo $board['title']?></td>
        			<td>조회수</td>
        			<td><?php echo $board['hit']?></td>
        		</tr>
        		<tr>
        			<td colspan="2"><?php echo $board['id']?></td>
        			<td><?php echo $board['regDate']?></td>
        		</tr>
        		<tr>
        			<td colspan="3"><?php echo $board['content']?></td>
        		</tr>
        		
        	</table>
        	
			
        	<?php if ($board['id'] == $_SESSION['id']) : ?>
        	<div>
        		<a class="btn btn-outline-primary" href="./boardUpdate.php?bnum=<?php echo $board['bnum']?>">수정</a>
        		<a class="btn btn-outline-primary" href="../board/BoardService.php?call_name=setDelete&bnum=<?php echo $board['bnum']?>">삭제</a>
        	</div>
        	<?php endif;?>
        	
        
        	
        	
        </div>
    </div>

	


</body>
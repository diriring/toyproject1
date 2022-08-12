<?php 
include '../temp/bootstrap.php';
include_once $_SERVER['DOCUMENT_ROOT']."/util/Pager.php";
include_once("../board/BoardService.php");

$test = new BoardService();

$pn = $_GET['pn'];
if($_GET['pn'] == NULL) {
    $pn = 1;
}

$pager = new Pager(5, $pn);
$totalCount = $test->getTotalCount();
$pager->makeNum($totalCount);

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
					<td><a href="./boardDetail.php?bnum=<?php echo $row['bnum']?>"><?php echo $row['title']?></a></td>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['regDate']?></td>
					<td><?php echo $row['hit']?></td>
				</tr>
				<?php endforeach;?>
			</tbody>

		</table>
    	
    	<div class="row justify-content-between">
			<div class="col-3">
				<nav aria-label="Page navigation example">
				  <ul class="pagination">
				    <li class="page-item">
				      <a class="page-link" href="./BoardList.php?pn=<?php echo $pager->getPre()?$pager->getStartNum()-1:1;?>" aria-label="Previous">
				        <span aria-hidden="true">&laquo;</span>
				      </a>
				    </li>
					<?php for ($i = $pager->getStartNum(); $i < $pager->getLastNum() + 1; $i++) :?>
						<li class="page-item"><a class="page-link" href="./boardList.php?pn=<?php echo $i?>"><?php echo $i;?></a></li>
				    <?php endfor;?>
				    <li class="page-item">
				      <a class="page-link" href="./BoardList.php?pn=<?php echo $pager->getNext()?$pager->getLastNum()+1:$pager->getLastNum();?>" aria-label="Next">
				        <span aria-hidden="true">&raquo;</span>
				      </a>
				    </li>
				  </ul>
				</nav>
			</div>
		</div>
    	
    	<a class="btn btn-outline-primary" href="./boardWrite.php">글 쓰기</a>
	</div>


</body>

</html>
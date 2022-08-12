<?php

$totalCount = 6;
$totalPage = $totalCount/3;
echo 'befor totalPage'.$totalPage.'<br>';
$num = $totalCount%3;
echo '나머지'.$num.'<br>';
if($totalCount%3 != 0) {
    $totalPage = floor($totalPage) + 1;
}
echo 'after totalPage'.$totalPage.'<br>';

$perBlock = 5;
$totalBlock = $totalPage/$perBlock;
echo 'befor totalBlock'.$totalBlock.'<br>';
if($totalPage%$perBlock != 0) {
    $totalBlock = floor($totalBlock) + 1;
}
echo 'after totalBlock'.$totalBlock.'<br>';

$curBlock = 1/$perBlock;
echo 'befor curBlock'.$curBlock.'<br>';
if(1%$perBlock != 0) {
    $curBlock = floor($curBlock) + 1;
}
echo 'after curBlock'.$curBlock.'<br>';

$start = ($curBlock - 1) * $perBlock + 1;
$last = $curBlock * $perBlock;

echo $start.'<br>';
echo $last;
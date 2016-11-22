<?php

$act = $_GET['act'];
$state = $_GET['state'];
$msg = $act . " " . $state;
$time = 2;
$url = "./../index.php";
header("refresh:{$time}; url={$url}");

echo "<font color='red'>{$msg}</font>";
echo "<br>页面将在 {$time} 秒后自动跳转.";
echo "<br><a href='{$url}'>返回</a>";

?>
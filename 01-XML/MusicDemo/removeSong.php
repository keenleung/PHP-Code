<?php
$index = $_GET['index'];
$path = "./other/songs.xml";

$doc = new DOMDocument('1.0', 'utf-8');
$doc->preserveWhiteSpace = false;
$doc->formatOutput = true;
$doc->load($path);
$music = $doc->getElementsByTagName('music')->item($index);

// 移除
$music->parentNode->removeChild($music);

// 保存
$doc->save($path);

// 自动定时跳转
/*
$msg = "Delete Success";
$time = 2;
$url = "./index.php";
header("refresh:{$time}; url={$url}");

echo "<font color='red'>{$msg}</font>";
echo "<br>页面将在 {$time} 秒后自动跳转.";
echo "<br><a href='{$url}'>返回</a>";
*/

$location =<<<"direction"
                <script type="text/javascript">
                    location.href = './other/msg.php?act=Delete&state=Success';
                </script>
direction;
            echo $location;

?>
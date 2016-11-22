<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php require './other/style.php'; ?>
    <script type="text/javascript">
        $(function(){
            $("#returnButton").click(function(){
                location.href = "index.php";
            });
        });
    </script>
</head>
<body>
<?php
// 获取数据
$index = $_GET['index'];

$path = "./other/songs.xml";
$doc = new DOMDocument('1.0', 'utf-8');
$doc->preserveWhiteSpace = false;
$doc->load($path);
$music = $doc->getElementsByTagName('music')->item($index);

$name = $music->childNodes->item(0)->nodeValue;
$singer = $music->childNodes->item(1)->nodeValue;
$special = $music->childNodes->item(2)->nodeValue;
$time = $music->childNodes->item(3)->nodeValue;

?>

<h3>Detail</h3>
<table width="400px" border=1>
    <tr>
        <td colspan='2' align='center'>音乐信息</td>
    </tr>
    <tr>
        <td>歌曲</td>
        <td><?php echo $name; ?></td>
    </tr>
    <tr>
        <td>歌手</td>
        <td><?php echo $singer; ?></td>
    </tr>
    <tr>
        <td>专辑</td>
        <td><?php echo $special; ?></td>
    </tr>
    <tr>
        <td>时长</td>
        <td><?php echo $time; ?></td>
    </tr>
    <tr>
        <td colspan='2' align='center'>
            <input id="returnButton" type="button" value="返回" />
        </td>
    </tr>

</table>

</body>
</html>
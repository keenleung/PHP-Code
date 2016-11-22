<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php require "./other/style.php" ?>
    <script type="text/javascript">
        $(function(){
            $("#returnButton").click(function(){
                location.href = "index.php";
            });
            $("#submitButton").click(function(){
                var name = $("input[name=name]").val();
                var singer = $("input[name=singer]").val();
                var special = $("input[name=special]").val();
                var time = $("input[name=time]").val();
                if (name.length == 0 || singer.length == 0 || special.length == 0 || time.length == 0) {
                    alert('请输入完整信息');
                    return false;
                }
            });
        });
    </script>
</head>
<body>
<?php
// 获取数据
$index = $_GET['index'];
if(!is_numeric($index))
    die("非法操作");
$path = "./other/songs.xml";
$doc = new DOMDocument('1.0', 'utf-8');
$doc->preserveWhiteSpace = false;
$doc->formatOutput = true;
$doc->load($path);
$music = $doc->getElementsByTagName('music')->item($index);

$name = $music->childNodes->item(0)->nodeValue;
$singer = $music->childNodes->item(1)->nodeValue;
$special = $music->childNodes->item(2)->nodeValue;
$time = $music->childNodes->item(3)->nodeValue;

if($_POST){
    // 获取表单数据
    $newMusic = $doc->createElement("music");
    $name = $doc->createElement("name", $_POST['name']);
    $singer = $doc->createElement("singer", $_POST['singer']);
    $special = $doc->createElement("special", $_POST['special']);
    $time = $doc->createElement("time", $_POST['time']);

    $newMusic->appendChild($name);
    $newMusic->appendChild($singer);
    $newMusic->appendChild($special);
    $newMusic->appendChild($time);

    // 替换
    $doc->documentElement->replaceChild($newMusic, $music);
    $doc->save($path);

    // 跳转
    $location =<<<"direction"
                <script type="text/javascript">
                    location.href = './other/msg.php?act=Update&state=Success';
                </script>
direction;
    echo $location;
}
?>

<h3>Edit</h3>
<form method='POST' action="">
    <table width="400px">
        <tr>
            <th colspan="2" align="center">更新歌曲信息</th>
        </tr>
        <tr>
            <td>歌曲</td>
            <td><input type="input" name="name" value="<?php echo $name; ?>" /></td>
        </tr>
        <tr>
            <td>歌手</td>
            <td><input type="input" name="singer" value="<?php echo $singer; ?>" /></td>
        </tr>
        <tr>
            <td>专辑</td>
            <td><input type="input" name="special" value="<?php echo $special; ?>" /></td>
        </tr>
        <tr>
            <td>时长</td>
            <td><input type="input" name="time" value="<?php echo $time; ?>" /></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input id="submitButton" type="submit" value="更新" />
                <input id="returnButton" type="button" value="返回" />
            </td>
        </tr>
    </table>
</form>

</body>
</html>
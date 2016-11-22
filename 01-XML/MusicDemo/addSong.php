<!DOCTYPE HTML>
<html lang="zh-cn">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php require './other/style.php'; ?>
    <script type="text/javascript">
        $(function() {
            $("#button1").click(function() {
                var name = $("input[name=name]").val();
                var singer = $("input[name=singer]").val();
                var special = $("input[name=special]").val();
                var time = $("input[name=time]").val();
                if (name.length == 0 || singer.length == 0 || special.length == 0 || time.length == 0) {
                    alert('请输入完整信息');
                    return false;
                }
            });

            $("#button2").click(function() {
                location.href = "index.php";
            });
        });
    </script>

    <?php
    // 处理表单
    if($_POST){
        $path = "./other/songs.xml";
        $doc = new DOMDocument('1.0', 'utf-8');
        $doc->preserveWhiteSpace = false; // 忽略空格
        $doc->load($path);

        $music = $doc->createElement("music");
        $name = $doc->createElement("name", $_POST['name']);
        $singer = $doc->createElement("singer", $_POST['singer']);
        $special = $doc->createElement("special", $_POST['special']);
        $time = $doc->createElement("time", $_POST['time']);

        $music->appendChild($name);
        $music->appendChild($singer);
        $music->appendChild($special);
        $music->appendChild($time);

        $root = $doc->documentElement;
        $root->appendChild($music);

        $doc->formatOutput = true; // 格式化输出
        if($doc->save($path)){
            //header("location:index.php");
            $location =<<<"direction"
                <script type="text/javascript">
                    location.href = './other/msg.php?act=Add&state=Success';
                </script>
direction;
            echo $location;
        }
        else{
            // echo "Add Fail";
            $location =<<<"direction"
                <script type="text/javascript">
                    location.href = './other/msg.php?act=Add&state=Fail';
                </script>
direction;
            echo $location;
        }
    }
    ?>
</head>

<body>
    <h3>Adding Music</h3>


    <form method="POST" action="">
        <table width="400px" border=1>
            <tr>
                <td colspan="2" align="center">添加音乐</td>
            </tr>
            <tr>
                <td>歌名</td>
                <td><input type="text" name="name" /></td>
            </tr>
            <tr>
                <td>歌手</td>
                <td><input type="text" name="singer" /></td>
            </tr>
            <tr>
                <td>专辑</td>
                <td><input type="text" name="special" /></td>
            </tr>
            <tr>
                <td>时长</td>
                <td><input type="text" name="time" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input id="button1" type="submit" value="提交" />
                    <input id="button2" type="button" value="返回" />
                </td>
            </tr>
        </table>
    </form>

</body>

</html>
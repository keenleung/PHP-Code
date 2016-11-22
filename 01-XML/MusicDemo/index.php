<!DOCTYPE HTML>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <?php require './other/style.php'; ?>
    <script type="text/javascript">
        $(function(){
            $(".delAction").click(function(){
                return confirm("确定要删除吗?");
            });
        });
    </script>
    <?php
    // 获取数据
    $doc = new DOMDocument('1.0', 'utf-8');
    $doc->preserveWhiteSpace = false; // 导入 xml 的时候去掉空格
    $doc->load("./other/songs.xml");
    $musics = $doc->getElementsByTagName('music');
    ?>

    <table width="700px">
        <tr>
            <th>序列号</th>
            <th>歌曲</th>
            <th>歌手</th>
            <th>专辑</th>
            <th>时长</th>
            <th>操作</th>
        </tr>
        <?php
        for($i=0; $i<$musics->length; $i++){
        ?>

        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $musics->item($i)->childNodes->item(0)->nodeValue; ?></td>
            <td><?php echo $musics->item($i)->childNodes->item(1)->nodeValue; ?></td>
            <td><?php echo $musics->item($i)->childNodes->item(2)->nodeValue; ?></td>
            <td><?php echo $musics->item($i)->childNodes->item(3)->nodeValue; ?></td>
            <td>
                <a class="checkAction" href="showSong.php?index=<?php echo $i; ?>">查看</a>
                <a class='delAction' href="removeSong.php?index=<?php echo $i; ?>" >删除</a>
                <a class="updatekAction" href="updateSong.php?index=<?php echo $i; ?>">修改</a>
            </td>
        </tr>

        <?php
        }
        ?>
    </table>
    <p>
        <a href="addSong.php">添加记录</a>
    </p>
</body>
</html>
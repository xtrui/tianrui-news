<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言</title>
</head>
<body style="text-align:center; margin:auto;">
    <center>
    <h2>我的留言</h2>
    <a href="index.php">添加留言</a>
    <a href="show.php">查看留言</a>
    <hr width="90%">
    <h3>添加留言</h3>
</center>
    <?php
        $title=$_POST["title"];
        $author=$_POST["author"];
        $content=$_POST["content"];
        $addtime=time();
        $ip=$_SERVER["REMOTE_ADDR"];
        $ly="{$title}##{$author}##{$content}##{$ip}##{$addtime}@@@";
        @$info=file_get_contents("liuyan.txt");
        @file_put_contents("liuyan.txt",$info.$ly);
        echo "<h3>留言成功</h3>";
    ?>
</body>
</html>
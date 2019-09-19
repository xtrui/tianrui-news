<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>发布结果</title>
</head>
<body>
<?php
    $title=$_POST["title"];
    $jj=$_POST["njy"];
    $content=$_POST["content"];
    $catid=$_POST["catid"];
    $time1=time();
    $sql="insert into t_news values(0,$catid,'{$title}','{$content}',$time1,1,'{$jj}')";
    $link = mysqli_connect('localhost','root','') or die('数据库连接失败');
    mysqli_select_db($link, 'yynews');
    mysqli_query($link,'set names utf8');
    $result = mysqli_query($link,$sql);
    if($result){
        echo "发布成功";
    }

    else{
        echo "发布失败";
    }
?>
</body>
</html>
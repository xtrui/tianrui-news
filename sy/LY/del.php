<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言</title>
</head>
<script>
    function dodel(i){
        if(confirm("确定删除吗？")){
            window.location = "del.php?id="+i;
        }
    }
</script>
<body style="text-align:center; margin:auto;">

    <center>
    <h2>我的留言板</h2>
    <a href="index.php">添加留言</a>
    <a href="show.php">查看留言</a>
    <hr width="90%">
    <h3>删除留言</h3>
    <?php
        $id=$_GET["id"];
        $info=file_get_contents("liuyan.txt");
        $lylist=explode("@@@",$info);
        unset($lylist[$id]);
        $newinfo=implode("@@@",$lylist);
        file_put_contents("liuyan.txt",$newinfo);
        echo "删除成功";
    ?>
    </center>


</body>
</html>
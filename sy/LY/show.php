<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言</title>
</head>
<script>
    function dodel(id){
        if(confirm("确定删除吗?")){
            window.location ='del.php?id='+id;
        }
    }
</script>
<body style="text-align:center; margin:auto;">

    <center>
    <h2>我的留言板</h2>
    <a href="index.php">添加留言</a>
    <a href="show.php">查看留言</a>
    <hr width="90%">
    <h3>查看留言</h3>
    <table border="1" width = "700">
        <tr>
            <th>留言标题</th>
            <th>留言人</th>
            <th>留言内容</th>
            <th>IP地址</th>
            <th>留言时间</th>
            <th>操作</th>
        </tr>
    
    <?php
    $info=file_get_contents("liuyan.txt");
    $info =rtrim($info,"@");
    
    if(strlen($info)>=8){
        $lylist =explode("@@@",$info);
    
        foreach ($lylist as $key => $value) {
            $ly=explode("##",$value);
            echo "<tr>";
            echo "<td>{$ly[0]}</td>";
            echo "<td>{$ly[1]}</td>";
            echo "<td>{$ly[2]}</td>";
            echo "<td>{$ly[3]}</td>";
            echo "<td>".date("Y-m-d H:i:s",$ly[4])."</td>";
            echo "<td><a href='javascript:dodel({$key})'>删除</a></td>";
        }
    }
    ?>
    </table>
    </center>


</body>
</html>
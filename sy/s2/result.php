<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>试卷结果</title>
</head>
<body style="text-align:center;">
    <?php
    error_reporting(E_ALL || ~E_NOTICE);
        include 'data.php';
        $sum=0;
        for($i=1;$i<=5;$i++)
        {
            
           if($_POST["$i"]==$tm["$i"]["答案"])$sum+=20;
           else {echo "<p>第 '$i' 题错误 </p>"; echo "正确答案是";echo $tm["$i"]["答案"];}

        }
        
        echo "<h1>你的最终得分是$sum </h1>"
    ?>
    
</body>
</html>
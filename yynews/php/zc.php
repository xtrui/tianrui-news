<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>注册</title>
    <style>
        #login{
    width: 250px;
    height: 220px;
    margin: auto;
    box-shadow: 0px 0px 20px 2px rgba(0,0,0,0.1);
    font-size: 18px;
    text-align: center;
}

.dl{
    width: 250px;
    height:30px;
    padding-top: 20px;
}

.dl2{
    width: 250px;
    height: 25px;
    margin-top: 15px;
}
    </style>
</head>


<body>
    <div id="content">
        <div id="login">
            <form action="zc.php" onsubmit="return check()"  method="post">

                <?php

$time1=time();
if(isset($_POST["un"])){
    $us=$_POST["un"];
    $sql="select * from t_user where Username='$us'";
    $link = mysqli_connect('localhost','root','') or die('数据库连接失败');
    mysqli_select_db($link, 'yynews');
    mysqli_query($link,'set names utf8');
    $result=mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);
    if($row["Username"]!=$_POST["un"]){
        $sql="insert into t_user values(0,'{$_POST["un"]}','{$_POST["pw"]}',{$time1},1,'{$_POST["qq"]}')";
        $result=mysqli_query($link,$sql);
        
        echo "注册成功";
    }
    else {
        echo "登录名已存在";
        
    }
    
}

?>
                <div class='dl'>登录名：<input type='text' id='dlm1' name='un' value='' placeholder="15个字符内，可中文" ></div>
                <div class='dl' >密码 &nbsp; ：<input placeholder="6到11位数字字母" type='password' name='pw' id="mm" value=''></div>
                <div class='dl' value=''>QQ &nbsp; ：<input placeholder="可选" id='qq' type='text' name='qq' value=''></div>
                <div class='dl2'><input style='margin-left:20px;' type='submit' value='注册'></div>
            </form>
        </div>
    </div>

</body>

</html>
<script type="text/javascript">
    var pattern = /^[a-zA-Z0-9]{6,11}$/;
    var pattern1=/^[0-9]{6,12}$/;
    
    function check(){
        if(dlm1.value==''){
            alert("登录名不能为空！");
            return false;
        }
        if(!pattern.test(mm.value)){
            alert("密码不符合要求,6-11位数字字母");
            alert(dlm1.value);
            return false;
        }
        
        else if(!pattern1.test(qq.value)&&qq.value!='')
        {
            alert("qq格式不正确");
            return false;
        }
        return true;
    }
</script>
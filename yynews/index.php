<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>天瑞新闻</title>
    <link rel="stylesheet" href="./css/reset.css" charset="utf-8">
    <link rel="stylesheet" href="./css/all.css" charset="utf-8">
    <script src="all.js"></script>
</head>
<body>
    <div id="header">
        <div id="bander">
        <a href="index.php"> <h3>天瑞新闻</h3></a>
        </div>
    </div>

    <div id="content">
        <div id='zw'></div>
        <div class='left'>
        <div id="login">
            <form action="index.php"  method="post">
            
            <?php
            session_start();
            
            $login="<div class='dl'>登录名：<input type='text' name='un'></div>
            <div class='dl'>密码 &nbsp; ：<input type='password' name='pw'></div>
            <div class='dl2'><input type='submit' value='登录'><input style='margin-left:20px;' type='button' onclick='zc();' value='注册'></div>";
            
            if(isset($_POST["un"])){
                $sql="select * from t_user where Username='{$_POST["un"]}'";
                $link = mysqli_connect('localhost','root','') or die('数据库连接失败');
                mysqli_select_db($link, 'yynews');
                mysqli_query($link,'set names utf8');
                $result = mysqli_query($link,$sql);
                $row = mysqli_fetch_array($result);
                if(!$row){
                    echo "账户不存在";
                }
                else if($row["Username"]==$_POST["un"]&&$row["Password"]==$_POST["pw"]){
                    
                    $_SESSION["un"]=$_POST["un"];
                    $_SESSION["pw"]=$_POST["pw"];
                }
                else echo "账户或密码不正确";
            }
            if(!isset($_SESSION["un"])) {
                echo $login;
            }
            else {
            echo "<div class='hy'>欢迎".$_SESSION["un"].'<br><input type="button" onclick="dc();" value="登出"></div>';
            }

            ?>
            
            </form>
        </div>
        </div>
        <div id="newscontent">
            <!-- 新闻列表 -->
            <div id="lb">
                <div id="lsi">
                <ul id="nav">
                    <li><a href="javascript:getNews(0);" onclick="change(this);">最新</a></li>
                    <li><a href="javascript:getNews(1);" onclick="change(this);">国内</a></li>
                    <li><a href="javascript:getNews(2);" onclick="change(this);">国外</a></li>
                </ul>
                </div>
            </div>
            <!-- 新闻内容 -->
            <div id="newst">
                
                <div id="fy"><a href="javascript:getNewsy(0);">首页&nbsp;</a> <a href="javascript:getNewsy(1);">&nbsp;上一页&nbsp;&nbsp;</a><select name="ys" id="ys" onchange="javascript:yschange();">
                    <?php
                        //输出分页；
                         $sql = "SELECT * FROM t_news";
                         $link = mysqli_connect('localhost','root','') or die('数据库连接失败');
                         mysqli_select_db($link, 'yynews');
                         mysqli_query($link,'set names utf8');
                         $result = mysqli_query($link,$sql);
                         $num_rows=mysqli_num_rows($result);
                         $ys=ceil($num_rows/10);
                         $n=1;
                         while($n<=$ys){
                            echo "<option value='{$n}'>第{$n}页</option>";
                            $n++;
                         } 
                    ?>
                    <option value='2'>第2页</option>
                    <!-- $sql = "SELECT id, firstname, lastname FROM MyGuests";  
$result = mysqli_query($conn, $sql);     
$num_rows=mysqli_num_rows($result); 

 1:拿到select对象： var  myselect=document.getElementById("test");
  2：拿到选中项的索引：var index=myselect.selectedIndex ;  // selectedIndex代表的是你所选中项的index
  3:拿到选中项options的value：  myselect.options[index].value;
  4:拿到选中项options的text：  myselect.options[index].text;
 -->
                </select> 
                <a href="javascript:getNewsy(2);">&nbsp;下一页&nbsp;</a>
                
                </div>
                
            </div>
        </div>
        <div class='cf'>

        </div>
    </div>
        
    <div id="footer">
       
        <p>Copyright 2018 文瑞杰 201650080229</p>
        
    </div>
</body>
</html>
<script>
getNews(0);
</script>
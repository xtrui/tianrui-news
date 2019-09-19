<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>天瑞新闻</title>
    <link rel="stylesheet" href="../css/reset.css" charset="utf-8">
    <link rel="stylesheet" href="../css/all.css" charset="utf-8">
    <script src="../all.js"></script>
</head>
<body>
    <div id="header">
        <div id="bander">
        <a href="/test/index.php"> <h3>天瑞新闻</h3></a>
        </div>
    </div>

    <div id="ncontent">
        <div id="xwt">
            <div id="biaot">
                
                <?php
                 $nid=$_GET['id'];
                 $sql="select * from t_news where NewsID='{$nid}'";
                 $link = mysqli_connect('localhost','root','') or die('数据库连接失败');
                 mysqli_select_db($link, 'yynews');
                 mysqli_query($link,'set names utf8');
                 $result = mysqli_query($link,$sql);
                 $row = mysqli_fetch_array($result);
                 $title=$row['Title'];
                 $time1=date('Y-m-d H:i:s',$row['Newstime']);
                 $content=$row['Content'];
                 $sql="select * from t_user where UserID=".$row['Operator'];
                 $result = mysqli_query($link,$sql);
                 $row = mysqli_fetch_array($result);
                 $author=$row['Username'];
               echo "<h2 id='title'>{$title}</h2>
                <p id='author'>".$time1." by {$author}</p>
            </div>
            <div id='newsc'>
                <br>
                {$content}
                <br>
                <br>
                <br>
                <br>
                ................>
                <br>
                <br>
            </div>";
            mysqli_close($link);
              ?>


        </div>
    </div>

    <div id="conment">
        
            <?php
            $nid=$_GET['id'];
            $sql="select * from t_comment where NewsID='{$nid}' order by CommID desc limit 10";
            $link = mysqli_connect('localhost','root','') or die('数据库连接失败');
            mysqli_select_db($link, 'yynews');
            mysqli_query($link,'set names utf8');
            $result = mysqli_query($link,$sql);
            
            while($row = mysqli_fetch_array($result))
            {
                
            $time1=date('Y-m-d H:i:s',$row['Commtime']);
            $content=$row['Content'];
            $sql="select * from t_user where UserID=".$row['UserID'];
            $result2 = mysqli_query($link,$sql);
            $row2 = mysqli_fetch_array($result2);
            
            $lyz=$row2['Username'];
            
            

            echo "<div class='conmentn'>
            <div class='lytou'>
            <span class='lyz'>{$lyz}</span>
            <span class='lysj'>$time1</span>
            </div>
            <p class='lyn'>$content</p>
        </div>";
            }
        echo "<div id='lyk'>";
            session_start();
            if(isset($_SESSION['un'])){
            echo "<textarea name='lyt' id='lyt' maxlength='200' placeholder='200字以内'></textarea>
            <button onclick='javascript:liuy();'>留言</button>
            <input type='text' name='Nid' id='Nid' value='{$nid}'>
        </div>";
            }
            else
            echo "<span id='txs'>点击<a href='../index.php' target='view_window'>这里</a>,返回首页登陆后刷新此页可评论</span>
            </div>";

            mysqli_close($link);

        ?>
        
    </div>

    <div id="footer">
       
       <p>Copyright 2018 文瑞杰 201650080229</p>
       
   </div>
</body>
</html>
<?php
    session_start();
    $sql="select * from t_user where Username='{$_SESSION['un']}'";
    $link = mysqli_connect('localhost','root','') or die('数据库连接失败');
    mysqli_select_db($link, 'yynews');
    mysqli_query($link,'set names utf8');
    $result = mysqli_query($link,$sql);
    $row = mysqli_fetch_array($result);
    $uid=$row["UserID"];
    
    $time1=time();
    $sql="insert into t_comment values(0,$uid,$_POST[id],'$time1','$_POST[lyt]')";
    mysqli_query($link,'set names utf8');
    $result = mysqli_query($link,$sql);
    

    echo "<div class='conmentn'>
            <div class='lytou'>
            <span class='lyz'>你说</span>
            <span class='lysj'>$time1</span>
            </div>
            <p class='lyn'>$_POST[lyt]</p>
        </div>";

?>
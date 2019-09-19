<?php
$st=$_GET['page']*10;
if($_GET["id"]==2){
    $sql="select * from t_news where CatID=2 order by NewsID desc limit ".$st.",10";
}
else if($_GET["id"]==1){
    $sql="select * from t_news where CatID=1 order by NewsID desc limit ".$st.",10";
}   
else  {
        $sql="select * from t_news order by NewsID desc limit ".$st.",10";
    }
    $link = mysqli_connect('localhost','root','') or die('数据库连接失败');
    mysqli_select_db($link, 'yynews');
    mysqli_query($link,'set names utf8');
    $result = mysqli_query($link,$sql);
    
   
    while($row = mysqli_fetch_array($result))
    {
        if($row["CatID"]==1)$cat='国内';
        else if($row["CatID"]==2)$cat='国外';
        $newf="<div class='newsl'>
        <h4 class='t'><a class='bt' href='/test/php/newst.php?id=".$row["NewsID"]."' target='view_window'>{$cat}:{$row['Title']}<a><h5 class='pr'>".date('Y-m-d H:i:s',$row['Newstime'])."</h5></h4>
        <div class='nr'><img class='tp' src='news.jpg' alt='新闻图'><p class='pp'>{$row['Newsjj']}</p></div>
        </div>";
        echo $newf;
    }
    //date("Y-m-d H:i:s",$ly[4])
     echo '<div id="fy"><a href="javascript:getNewsy(0);">首页&nbsp;</a> <a href="javascript:getNewsy(1);">&nbsp;上一页&nbsp;&nbsp;</a><select name="ys" id="ys">';
     
     if($_GET["id"]==2){
        $sql="select * from t_news where CatID=2";
    }
    else if($_GET["id"]==1){
        $sql="select * from t_news where CatID=1";
    }   
    else  {
          $sql = "SELECT * FROM t_news";
        }
     
                         $result = mysqli_query($link,$sql);
                         $num_rows=mysqli_num_rows($result);
                         $ys=ceil($num_rows/10);
                         $n=1;
                         while($n<=$ys){
                             if($n==$_GET['page']+1)
                             echo "<option value='{$n}' selected='selected'>第{$n}页</option>";
                            else echo "<option value='{$n}'>第{$n}页</option>";
                            $n++;
                         }

     echo '</select> 
     <a href="javascript:getNewsy(2);">&nbsp;下一页&nbsp;</a>
     </div>';


?>
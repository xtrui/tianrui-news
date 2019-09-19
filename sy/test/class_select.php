<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>查询结果</title>
</head>
<body>
	<h1>
		查询结果
	</h1>

<?php 
header("Content-type:text/html;charset=utf8");
$bjdm = trim($_GET['bjdm']);
$link = mysqli_connect('localhost','root','') or die('数据库连接失败');
mysqli_select_db($link, 'student');
mysqli_query($link,'set names utf8');
$result = mysqli_query($link,"select * from t_class where bjdm='$bjdm'");
$row = mysqli_fetch_array($result);
if(!$row){
	echo '无此班级代码！';
}
else{
echo '班级代码：'.$row['bjdm'] .'<br>';
echo '班级简称：'.$row['bjjc'] .'<br>';
echo '班级全称：'.$row['bjqc'] .'<br>';
}
 ?>
 </body>
</html>
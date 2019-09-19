<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>常识简单问卷</title>
</head>
<body style="text-align:center;">
	<center><span style="color:red;font-size:30px;">常识问卷1</span></center>
	<form name="form1" action="result.php" method="post" onsubmit="return check();">
		<?php 
		$count1=0;
		include 'data.php';
		for($i=1;$i<=5;$i++){

			foreach ($tm[$i] as $key => $value) {
				if ($count1==0) {
					echo "<p>$value</p>";
				}
				
				if($count1<=4&&$count1>=1){echo "<input type=\"radio\" name=\"$i\" value=\"$key\">$value<br>";}
				$count1++;
			}
			$count1=0;

		}

		 ?>
		 <br>
		 <input id="sb" style="height:30px;width:80px;" type="submit" value="submit" >
	</form>
</body>
</html>
<script>
	function check(){
		var p=0;
		for(var i=1;i<6;i++)
        {
			p=0;
			var rd=document.getElementsByName(''+i);
			for(var m=0;m<rd.length;m++){
         		if(rd[m].checked)
         		{
					 p=1;
           			break;
         		}
			}
			if(p==0){
			alert("第"+i+"题没有填写");
			rd[1].focus();
			return false;
			}
		}
		return ture;
		
	}
</script>
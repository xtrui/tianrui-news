<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>留言</title>
</head>
<body style="text-align:center; margin:auto;">
    <center>
    <h2>我的留言</h2>
    <a href="index.php">添加留言</a>
    <a href="show.php">查看留言</a>
    <form action="doAdd.php" method="post">
        <table width="380" border="0" cellpadding="3">
            <tr>
                <td align="right">标题: </td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td align="right">留言者：</td>
                <td><input type="text" name="author"></td>
            </tr>
            <tr>
                <td align="right" valign="top">留言内容：</td>
                <td><textarea name="content"  cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><input type="submit" value="提交"> <input type="reset" value="重置"></td>
            </tr>
        </table>
    </form>
</center>
</body>
</html>
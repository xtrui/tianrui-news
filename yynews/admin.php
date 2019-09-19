<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新闻管理</title>
    <link rel="stylesheet" href="./kindeditor/themes/default/default.css" />
    <link rel="stylesheet" href="./kindeditor/plugins/code/prettify.css" />
    <script charset="utf-8" src="./kindeditor/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="./kindeditor/lang/zh-CN.js"></script>
    <script charset="utf-8" src="./kindeditor/plugins/code/prettify.js"></script>
    <link rel="stylesheet" href="./css/reset.css" charset="utf-8">
    <link rel="stylesheet" href="./css/all.css" charset="utf-8">
    <script src="all.js"></script>
    <script>
        KindEditor.ready(function (K) {
            var editor1 = K.create("textarea[name='content']", {
                cssPath: "./kindeditor/plugins/code/prettify.css",
                uploadJson: "./kindeditor/php/upload_json.php",
                fileManagerJson: "./kindeditor/php/file_manager_json.php",
                allowFileManager: true,
                afterBlur: function () { this.sync(); }
            });
        });
    </script>
</head>

<body>
    <div id="header">
        <div id="bander">
            <a href="/test/index.php"> <h3>天瑞新闻</h3></a>
        </div>
    </div>

    <div id="acontent">
    <?php
        session_start();
        if(isset($_SESSION['un'])&&$_SESSION['un']=='123')
       
        echo 
        "<div id='leftp'>
            <ul>
                <li><a href='javascript:adminx();'>发布新闻</a></li>
            </ul>
        </div>

        <div id='rightp'>
            <form action='c.php' method='post' onsubmit='return checkn();'>
                <div class='newp1'><span>标题：</span><input type='text' name='title' id='title' value=''></div> 
                <div class='newp1'><span>类别：</span><select name='catid' id='catid'>
                    <option value='1'>国内</option>
                    <option value='2'>国外</option>
                </select></div> 
                <div class='newp'><span>简要：</span><textarea name='njy' id='njy' cols='30' rows='10' maxlength='200' placeholder='两百字以内' value=''></textarea></div> 
                <div class='newp'><span>内容：</span><textarea id='editor' name='content' cols='117' rows='30' value=''></textarea></div>
                <div id='tjn'><input type='submit' value='发布'><input type='reset' value='重置'></div>
            </form>
        </div>";
        
        else echo '<p style="font-size:28px;">返回首页登录管理员账号后进行操作<p>';
        ?>
        <div style="clear:both"></div>
    </div>


    <div id="footer">

        <p>Copyright 2018 文瑞杰 201650080229</p>

    </div>
</body>

</html>
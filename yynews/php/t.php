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
                        echo $sql;
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
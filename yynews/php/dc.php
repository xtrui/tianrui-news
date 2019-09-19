<?php
    session_start();
    session_destroy();
    $_SESSION=array();
    header("HTTP/1.1 301 Moved Permanently");  
    header("Location: ../index.php");  
?>
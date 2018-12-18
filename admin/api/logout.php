<?php 

    //就要删除session
    session_start();

    unset($_SESSION['userInfo']);

    //跳回登录页
    header('location:../login.html');
?>
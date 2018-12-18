<?php 

    //就是看有没有session
    session_start();

    if(isset($_SESSION['userInfo'])){

        //如果有，就代表刚刚登录过，所以返回loginOK
        echo "ok";

    }else{

        echo "fail";
    }
?>
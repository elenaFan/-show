<?php 

    //开启SESSION
    session_start();

    //获得userInfo的值
    $userInfo = $_SESSION['userInfo'];
    
    //再转成JSON字符串输出
    echo json_encode($userInfo);

?>
<?php

    //接收id
    $id = $_POST['id'];//
    //接收status
    $status = $_POST['status'];

    //导入工具文件
    require_once "tools/doSql.php";

    $sql = "update comments set status ='$status' where id in($id)";
    $result = my_ZSG($sql);

    if($result){

        echo "ok";
    }else{

        echo "fail";
    }
?>
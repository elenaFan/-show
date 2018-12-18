<?php

    //接收数据
    $sliderList = $_POST['sliderList'];

    //导入工具文件
    require_once "tools/doSql.php";
    $sql = "update options set value='$sliderList' where id = 10";
    $result = my_ZSG($sql);

    if($result){

        echo 'ok';
    }else{

        echo 'fail';
    }
?>
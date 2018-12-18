<?php 

    require_once "tools/doSql.php";

    //准备SQL语句
    $sql = "select *from categories";
    $data = my_Select($sql);

    echo json_encode($data);
?>
<?php 

    require_once "tools/doSql.php";
    $sql = "select *from options where id = 10";

    //一条数据也是数组
    $data = my_Select($sql);

    echo $data[0]['value'];
?>
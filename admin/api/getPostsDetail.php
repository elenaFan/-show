<?php 

    //获得传递过来的Id
    $id = $_GET['id'];

    require_once "tools/doSql.php";
    $sql = "select *from posts where id=$id";
    $data = my_Select($sql);

    //var_dump($data);

    //注意转的是$data[0]
    echo json_encode($data[0]);
?>
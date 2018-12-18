<?php 

    $slug = $_POST['slug'];
    $name = $_POST['name'];

    //插入到数据库
    require_once "tools/doSql.php";
    //准备sql语句
    $sql = "insert into categories(slug,name) values('$slug','$name')";
    $result = my_ZSG($sql);

    if($result){

        echo 'ok';
    }else{

        echo 'fail';
    }
?>
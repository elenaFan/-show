<?php 

    // var_dump($_FILES['icon']);

    $icon = $_FILES['icon'];

    //先取出文件名
    $name = $icon['name'];
    //取出临时目录
    $tmp = $icon['tmp_name'];

    //把图片名转成GBK格式的编码
    $gbkName = iconv('utf-8','gbk',$name);

    //准备一个保存的新路径
    $path = "./$gbkName";

    //移动
    move_uploaded_file($tmp,$path);


    $path = "./$name";
    echo $path;
?>
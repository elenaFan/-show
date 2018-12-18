<?php 

    //如果是要拿到上传的文件，用$_POST是拿不到的
    //只能用$_FILES来接收
    // var_dump($_POST);
    // var_dump($_FILES);
    // echo "<hr>";
    // var_dump($_FILES['icon']);

    //上传中文时有问题
    //原因是网页用的编码是UTF-8
    //但是上传到我们本机服务器，本机服务器装的是中文windows操作系统
    //而中文windows操作系统，默认用的字符集编码是gbk编码，网页的是UTF-8，写入到GBK的硬盘里，因为编码不一样，那么会乱码


    $icon = $_FILES['icon'];

    //取到临时文件
    $tmp = $icon['tmp_name'];

    //找到原来的图片名字
    $name = $icon['name'];

    //你需要先把图片名转为GBK的文件名
    $gbkName = iconv('utf-8','gbk',$name);

    //移动到某个新的路径去
    move_uploaded_file( $tmp, "./img/$gbkName");
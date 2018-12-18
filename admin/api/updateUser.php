<?php 

    //拿到提交过来的数据
    $slug = $_POST['slug'];
    $nickname = $_POST['nickname'];
    $bio = $_POST['bio'];

    //开启session
    session_start();
    //拿到登录的账号id
    $userID = $_SESSION['userInfo']['id'];

    //拿到文件信息
    $avatar = $_FILES['avatar'];
    //拿到文件名
    $name = $avatar['name'];
    //拿到临时目录
    $tmp = $avatar['tmp_name'];
    //转成GBK
    $gbkName = iconv('utf-8','gbk',$name);

    $path = "../../uploads/$gbkName";
    move_uploaded_file($tmp,$path);

    //准备修改数据库了
    require_once "tools/doSql.php";

    $path = "../../uploads/$name";

    if($name != '')
        //准备sql语句
        $sql = "update users set slug='$slug',nickname='$nickname',avatar='$path',bio='$bio' where id='$userID'";
    else 
        $sql = "update users set slug='$slug',nickname='$nickname',bio='$bio' where id='$userID'";

    $result = my_ZSG($sql);

    if($result){

        echo "ok";

        //也要记得修改session里保存的值
        $_SESSION['userInfo']['bio'] = $bio;
        $_SESSION['userInfo']['nickname'] = $nickname;
        $_SESSION['userInfo']['slug'] = $slug;
        // 如果你改了图片，才修改这条session
        if($name != ""){
            $_SESSION['userInfo']['avatar'] = $path;
        }

    }else{

        echo "fail";
    }
?>
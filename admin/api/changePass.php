<?php 

    $oldPass = $_POST['oldPass'];

    //应该立即判断一下旧密码是否输入正确
    session_start();
    if( $oldPass != $_SESSION['userInfo']['password']){

        //代表后面代码不执行了
        echo '{ "code":1 , "msg":"旧密码输入错误" }';
        return; 
    }

    //能来到这， 证明旧密码验证成功，输入的是正确的，就修改密码
    $newPass = $_POST['newPass'];
    //取出当前登录用户的id
    $id = $_SESSION['userInfo']['id'];
    //导入工具
    require_once "tools/doSql.php";
    $sql = "update users set password='$newPass' where id='$id'";
    $result = my_ZSG($sql);

    if($result){

        echo '{ "code":0 , "msg":"修改成功" }';
    }else{

        echo '{ "code":2 , "msg":"修改失败" }';
    }
?>
<?php

   $email =  $_POST['email'];
   $password =  $_POST['password'];

   //要做数据库查询
   $link = mysqli_connect('127.0.0.1','root','root','baixiu');
   //sql语句
   $sql = "select *from users where email='$email' and password='$password'";
   //再执行sql语句
   $result = mysqli_query($link,$sql);
   //转成数组
   $data = mysqli_fetch_all($result,1);

   //关闭数据库
   mysqli_close($link);

   if( count($data) > 0 ){

        //设置SESSION:要把登录信息存到SESSION里面
        session_start();
        $_SESSION['userInfo'] = $data[0];

        echo "ok";
   }else{

        echo "fail";
   }

?>
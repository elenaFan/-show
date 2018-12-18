<?php

    function my_Select($sql){

        //1.打开数据库
        $link = mysqli_connect('127.0.0.1','root','root','baixiu');

        //2.操作数据库
        $result = mysqli_query($link,$sql);
        //转换成数组
        $data = mysqli_fetch_all($result,1);

        //3.关闭数据库
        mysqli_close($link);

        return $data;
    }

    
    function my_ZSG($sql){

        //1.打开数据库
        $link = mysqli_connect('127.0.0.1','root','root','baixiu');

        //2.操作数据库
        $result = mysqli_query($link,$sql);

        //3.关闭数据库
        mysqli_close($link);
        
        //返回是否成功
        return $result;
    }

?>
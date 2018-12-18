<?php 
    //include和require都是引入文件，唯一的区别在于：include引入的文件如果里面代码错误不会影响后面代码执行
    //require引入的文件里的代码如果有错，那么后面的代码就不会执行

    require "test.php";


    echo "I'm in end!";

?>
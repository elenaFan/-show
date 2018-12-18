<?php 

   //拿到上传的图片信息
   $img = $_FILES['img'];

   //取出图片名
   $name = $img['name'];
   $tmp = $img['tmp_name'];

   //转成GBK图片名
   $gbkName = iconv('utf-8','gbk',$name);

   //准备路径
   $path = "../../uploads/$gbkName";

   //移动完成
   move_uploaded_file($tmp,$path);

   //返回服务器上的永久路径
   echo "../../uploads/$name";

?>
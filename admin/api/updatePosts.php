<?php 

    //拿到提交来的数据
    $title = $_POST['title'];
    $content = $_POST['content'];
    $slug = $_POST['slug'];
    $category = $_POST['category'];
    $created = $_POST['created'];
    $status = $_POST['status'];
    $id = $_POST['id'];

    //也得再取出图片
    //通过$_FILES拿上传的图片
    $feature = $_FILES['feature'];
    //拿到上传的图片名字
    $name = $feature['name'];
    //拿到临时路径
    $tmp = $feature['tmp_name'];

    //转GBK
    $gbkName = iconv('utf-8','gbk',$name);

    //准备一个要保存的新的路径,PHP不支持根目录的写法
    $path = "../../uploads/$gbkName";

    //移动
    move_uploaded_file($tmp,$path);

    //导入工具文件
    require_once "tools/doSql.php";

    //把gbk路径变为utf-8路径
    $path = "../../uploads/$name";

    //准备sql语句
    if($name != ""){

        $sql = "update posts set title='$title',content='$content',slug='$slug',
                              category_id='$category',created='$created',status='$status',
                              feature='$path' where id = $id";
    }else{

        $sql = "update posts set title='$title',content='$content',slug='$slug',
                             category_id='$category',created='$created',status='$status'
                              where id = $id";
    }

    $result = my_ZSG($sql);

    if($result){

        echo "ok";
    }else{

        echo "fail";
    }
?>
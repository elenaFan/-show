<?php 

    //负责从数据库查出数据
    require_once "tools/doSql.php";

    //查出所有文章的sql语句
    $sql = "select *from posts where status != 'trashed'";
    //对查到的数组直接取长度，就是你查出来的所有文章的总数
    $postsCount = count(my_Select($sql));

    //查出所有草稿文章的数量
    $sql = "select *from posts where status='drafted'";
    $draftedCount = count(my_Select($sql));

    //查出所有的分类数量
    $sql = "select *from categories";
    $categoryCount = count(my_Select($sql));

    //查出所有评论的数量
    $sql = "select *from comments where status != 'trashsed'";
    $commentsCount = count(my_Select($sql));

    //查出待审核的数量
    $sql = "select *from comments where status = 'held'";
    $heldCount = count(my_Select($sql));

    $arr = [
        "postsCount" => $postsCount,
        "draftedCount" => $draftedCount,
        "categoryCount" => $categoryCount,
        "commentsCount" => $commentsCount,
        "heldCount" => $heldCount
    ];    

    //转成JSON字符串
    echo json_encode($arr);
?>

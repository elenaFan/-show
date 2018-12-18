<?php 

    //导入文件
    require_once "tools/doSql.php";

    //接收页码
    $pageIndex = $_GET['pageIndex'];
    //接收页容量
    $pageSize = $_GET['pageSize'];

    //接收筛选的分类id
    $category_id = $_GET['category_id'];
    //接收筛选的状态
    $status = $_GET['status'];
    

    //计算起始索引
    $start = ($pageIndex - 1) * $pageSize;

    $sql = "select p.id,p.title,u.nickname,c.name,p.created,p.status from posts p
    inner join users u
    on p.user_id = u.id
    inner join categories c
    on p.category_id = c.id
    where p.status != 'trashed'";

    //中间可以加内容了
    if( $category_id != "" ){

        //才加条件，记得一定要加空格
        $sql .= " and p.category_id='$category_id'";
    }

    if($status != ""){
        //如果状态不为空，才加这个条件
        //记得前面加空格
        $sql .= " and p.status='$status'";
    }

    $sql .= " order by p.id desc limit $start,$pageSize";

    //查出数据
    $data = my_Select($sql);

    //还要查总数据
    $sql = "select p.id,p.title,u.nickname,c.name,p.created,p.status from posts p
    inner join users u
    on p.user_id = u.id
    inner join categories c
    on p.category_id = c.id
    where p.status != 'trashed'";

    if($category_id != ""){

        $sql .= " and p.category_id='$category_id'";
    }

    if( $status != "" ){

        $sql .= " and p.status='$status'";
    }

    //得到总数量
    $totalCount = count( my_Select($sql) );

    //算出总页数
    $totalPage = ceil( $totalCount / $pageSize );

    $arr = [
        "data" => $data,
        "totalPage" => $totalPage
    ];

    echo json_encode($arr);
?>
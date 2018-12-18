## 登录的接口
url:api/doLogin.php
type:post
data:   email:登录的email
        password:登录的密
        
响应体
    string类型

    ok 要么 fail


## 判断是否登录的接口
url:api/checkLogin.php
type:get
data:不需要

响应体
        string

        ok 要么 fail


## 获得用户信息的接口
url:api/getUserInfo.php
type:get
data:不需要
响应体：
        JSON
        { "id":1, "slug":"admin","nickname":"管理员"..... }


## 获取网站信息的接口
url:api/getWebInfo.php
type:get
data:不需要
响应体：
        JSON
       { postsCount: 10,  draftedCount:2 , categoryCount:12, commentsCount: 3 , heldCount:4 }


## 获取所有评论数据的接口
url:api/getComments.php
type:get
data：
        pageIndex：页码，也就是说查第几页
        pageSize: 页容量,一页显示多少条
响应体：
        JSON
{
     data:[
        {"id":1,"author":"小周","content":"评论内容","title":"文章标题","created":"时间","status":"状态"},
        {},
        {}
      ],

    totalPage: 53
}


## 修改评论状态的接口
url:api/updateComments.php
type:post
data:
        id: 根据id来修改
                可以传一个id     6
                也可以传多个id，多个id之间用,隔开  例：  6,11,19
        status：要修改成什么状态
响应体：
        普通字符串就可以
        ok fail


## 获取文章的接口文档
url:"api/getPosts.php",
type:get
data:
        pageIndex: 代表查第几页
        pageSize:页容量
        category_id： 根据分类来筛选，如果是空字符串代表所有分类
        status：  根据状态来筛选， 如果是空字符串代表所有状态

响应体：
        {

                data:[]
                totalPage:64
        }


## 获取所有分类的接口
url:api/getCategory.php
type:get
data:无
响应体：
        JSON
        [
                {"id":3,"slug":"live","name":"会生活"},
        ]


## 新增文章的接口
url:api/addPosts.php
type:post
data:
        title:
        content:
        slug
        feature
        category
        created
        status
响应体；
        string
        ok fail


## 获得某篇文章详情的接口
url:api/getPostsDetail.php
type:get
data: id

响应体：
        JSON

 { "id": 1,"slug":xx,"title": ....... }


## 修改文章的接口
url:api/updatePosts.php
type:post
data:
        id: 文章的id
        title:
        content:
        slug
        feature
        category
        created
        status

响应体：
        string
        ok or fail


## 修改用户的接口
url: api/updateUser.php
type:post
data: 
        avatar:头像的数据
        slug
        nickname
        bio

响应体：
        string
        ok or fail


## 修改密码的接口
url: api/changePass.php
type:post
data:
        oldPass：旧密码
        newPass：新密码

响应体
        返回状态码（JSON对象）

        { code:0 , msg:"修改成功" };
        { code:1 , msg:"旧密码输入错误" };
        { code:2 , msg:"修改失败" };


## 新增分类的接口
url:api/addCategory.php
type:post
data:
        name: 分类名
        slug：别名

响应体
        ok fail


## 修改分类的接口
url:api/updateCategory.php
type:post
data:
        id:
        name:
        slug:
响应体
        ok fail


## 删除分类的接口
url:api/deleteCategory.php
type:post
data: 
        id: 可以传一个id，也可以传多个id，多个以,隔开
响应体
        ok fail


## 获取轮播图的接口
url:api/getSliders.php
type:get
data:无
响应体：
        JSON
        [
                {"image":"/uploads/slide_1.jpg","text":"轮播项一","link":"https://zce.me"},{"image":"/uploads/slide_2.jpg","text":"轮播项二","link":"https://zce.me"}
        ]


## 上传图片并返回服务器上的路径的接口
url: api/uploadImg.php
type:post
data:
    img:上传的图片

响应体：
        字符串
        图片的路径


## 添加轮播图的接口
url:api/updateSlider.php
type:post
data:
        sliderList: 轮播图JSON字符串，这个字符串本质上是一个数组
响应体：
        ok or fail
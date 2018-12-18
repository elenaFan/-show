<?php 
  
  require_once "admin/api/tools/doSql.php";
  $sql = "select *from options where id = 10";
  $data = my_Select($sql);

  //转成PHP数组
  //怎么把JSON字符串转成PHP数据？
  //json_decode其实有一个参数2，给一个bool类型,给true代表转为关联性数组，给false代表转为对象类型，默认是false
  $sliderList = json_decode($data[0]['value'],true);
  // var_dump($sliderList);

  //PHP中获取对象属性值的方法  对象->属性名
  // echo $sliderList[0]->image;

  //在PHP中用[]只能对数组进行操作，取出数组中的元素
  //但是不能操作在对象类型中
  // echo $sliderList[0]['image'];

  // $arr = [10,20,30,40];
  // echo $arr[0];

  //关联型数组
  // $arr = ["name"=>"jack", "age"=>16];
  // var_dump($arr);
  // echo $arr["name"];


  //查出最新的5篇文章
  $sql = "select p.id,p.title,p.feature,p.content,c.name,u.nickname,p.views,p.likes,p.created from posts p
  inner join users u
  on p.user_id = u.id
  inner join categories c
  on p.category_id = c.id
  where p.status = 'published'
  order by p.id desc
  limit 5";

  $newPosts = my_Select($sql);
?>

<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">

  <style>
    .swipe-wrapper li img{

      height:273px;
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
     <?php require_once "category.php";  ?>

      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>
    <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">

          <?php 
            require_once "randPosts.php";
          ?>
         
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div class="swipe">
        <ul class="swipe-wrapper">
        
        <?php for($i = 0; $i< count($sliderList); $i++): ?>

          <li>
            <a href="<?php echo $sliderList[$i]['link'];  ?>">
              <img src="<?php echo $sliderList[$i]['image'];  ?>">
              <span><?php echo $sliderList[$i]['text'];  ?></span>
            </a>
          </li>

<?php endfor; ?>

        </ul>
        <p class="cursor">
    <?php for($i = 0; $i< count($sliderList); $i++): ?>
      <?php if($i == 0): ?>
          <span class="active"></span>
  <?php else: ?>
        <span ></span>
  <?php endif; ?>
  <?php endfor;?>

        </p>
        <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
        <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="panel focus">
        <h3>焦点关注</h3>
        <ul>
        
        <?php foreach($newPosts as $key => $value): ?>

        <?php if($key == 0): ?>
          <li class="large">
  <?php else: ?>
          <li>
  <?php endif; ?>
            <a href="detail.php?id=<?php echo $value['id']; ?>">
              <img src="<?php echo $value['feature']; ?>" alt="">
              <span><?php echo $value['title']; ?></span>
            </a>
          </li>
        <?php endforeach ?>

        </ul>
      </div>
      <div class="panel top">
        <h3>一周热门排行</h3>
        <ol>
          <li>
            <i>1</i>
            <a href="javascript:;">你敢骑吗？全球第一辆全功能3D打印摩托车亮相</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>2</i>
            <a href="javascript:;">又现酒窝夹笔盖新技能 城里人是不让人活了！</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span class="">阅读 (18206)</span>
          </li>
          <li>
            <i>3</i>
            <a href="javascript:;">实在太邪恶！照亮妹纸绝对领域与私处</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>4</i>
            <a href="javascript:;">没有任何防护措施的摄影师在水下拍到了这些画面</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
          <li>
            <i>5</i>
            <a href="javascript:;">废灯泡的14种玩法 妹子见了都会心动</a>
            <a href="javascript:;" class="like">赞(964)</a>
            <span>阅读 (18206)</span>
          </li>
        </ol>
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_2.jpg" alt="">
              <span>星球大战:原力觉醒视频演示 电影票68</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_3.jpg" alt="">
              <span>你敢骑吗？全球第一辆全功能3D打印摩托车亮相</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_4.jpg" alt="">
              <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_5.jpg" alt="">
              <span>实在太邪恶！照亮妹纸绝对领域与私处</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="panel new">
        <h3>最新发布</h3>
      
      <?php for($i = 0; $i < 3; $i++): ?>

        <div class="entry">
          <div class="head">
            <span class="sort"><?php echo $newPosts[$i]['name']; ?></span>
            <a href="javascript:;"><?php echo $newPosts[$i]['title']; ?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $newPosts[$i]['nickname']; ?> 发表于 <?php echo $newPosts[$i]['created']; ?></p>
            <p class="brief"><?php echo $newPosts[$i]['content']; ?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $newPosts[$i]['views']; ?>)</span>

            <?php 
               $id = $newPosts[$i]['id'];
               $sql = "select *from comments where post_id = $id and status = 'approved'";
               $count = count(my_Select($sql));
            ?>
              <span class="comment">评论(<?php echo $count; ?>)</span>
              <a href="javascript:;" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $newPosts[$i]['likes']; ?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?php echo $newPosts[$i]['name']; ?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="<?php echo $newPosts[$i]['feature']; ?>" alt="">
            </a>
          </div>
        </div>
  <?php endfor; ?>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="assets/vendors/jquery/jquery.js"></script>
  <script src="assets/vendors/swipe/swipe.js"></script>
  <script>
    //
    var swiper = Swipe(document.querySelector('.swipe'), {
      auto: 3000,
      transitionEnd: function (index) {
        // index++;

        $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
      }
    });

    // 上/下一张
    $('.swipe .arrow').on('click', function () {
      var _this = $(this);

      if(_this.is('.prev')) {
        swiper.prev();
      } else if(_this.is('.next')) {
        swiper.next();
      }
    })
  </script>
</body>
</html>

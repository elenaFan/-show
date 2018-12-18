<?php
     require_once "admin/api/tools/doSql.php";
          //查出随机5篇文章
          $sql = "select *from posts
          order by rand()
          limit 5";

          //获得随机5篇文章的数组
          $randPosts = my_Select($sql);
          
        foreach($randPosts as $value): ?>
          <li>
            <a href="detail.php?id=<?php echo $value['id']; ?>">
              <p class="title"><?php echo $value['title']; ?></p>
              <p class="reading">阅读(<?php echo $value['views']; ?>)</p>
              <div class="pic">
                <img src="<?php echo $value['feature']; ?>" alt="">
              </div>
            </a>
          </li>
<?php endforeach; ?>

<ul>

<?php 
        require_once "admin/api/tools/doSql.php";
        $sql = "select *from categories";
        $cateList = my_Select($sql);
        foreach($cateList as $value): 
?>
  <li><a href="list.php?name=<?php echo $value['name']; ?>&cateID=<?php echo $value['id']; ?>"><i class="fa fa-glass"></i><?php echo $value['name']; ?></a></li>
<?php endforeach; ?>

</ul>

</div>
<div class="header">
<h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
<ul class="nav">
<?php 
  foreach($cateList as $value): 
?>
  <li><a href="list.php?name=<?php echo $value['name']; ?>&cateID=<?php echo $value['id']; ?>"><i class="fa fa-glass"></i><?php echo $value['name']; ?></a></li>

  <?php endforeach; ?>
</ul>
<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<title>模型分享——web3d中文站</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="keywords" content="3d模型,x3d模型,web3d" />
<link rel="stylesheet" href="/Public/css/style.css" type="text/css" media="all" />
<script type='text/javascript' src='/Public/css/x3dom.js'></script>
<link rel='stylesheet' type='text/css' href='/Public/css/x3dom.css' />
</head>
<body>
<input type='radio' name='model' id='modelcategory'/>
<input type='radio' name='model' id='hide'/>
<div id='content'>
  <label id='slider' class='modelcategory' for='modelcategory'>更多模型</label>
  <label id='slider' class='hide' for='hide'>收起侧栏</label>
</div>
<aside class="modelcategory">
  <div class="InfoContainer">
    <div id="Name" class="InfoBlack">模型分类</div>
  </div>
</aside>
<div class="wrap">
  <div class="header">
    <div class="logo">
      <h1> <a href="/"><img src="/Public/images/logo.png" alt="" /></a> </h1>
      <span>让更多的人看到你的作品..</span> </div>
  </div>
  <div class="carousel">
    <?php if(is_array($models1)): $i = 0; $__LIST__ = $models1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class='item'>
    <img src='/Public/upload/<?php echo ($vo["folder"]); ?>/preview.<?php echo ($vo["preview_ext"]); ?>' alt='<?php echo ($vo["title"]); ?>' />
    <div class='item-background'></div>
    <a href='/index.php/Home/Index/model?f=<?php echo ($vo["folder"]); ?>' class='title' title='模型名称'>模型名称：<?php echo ($vo["title"]); ?></a>
    <a href='/index.php/Home/Index/model?f=<?php echo ($vo["folder"]); ?>' class='creator' title='作者'>创作者：<?php echo ($vo["creator"]); ?></a>
    <a href='/index.php/Home/Index/model?f=<?php echo ($vo["folder"]); ?>' class='time' title='更新时间'>更新时间：<?php echo ($vo["time_update"]); ?></a>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if(is_array($models2)): $i = 0; $__LIST__ = $models2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class='item'>
    <img src='/Public/upload/<?php echo ($vo["folder"]); ?>/preview.<?php echo ($vo["preview_ext"]); ?>' alt='<?php echo ($vo["title"]); ?>' />
    <div class='item-background'></div>
    <a href='/index.php/Home/Index/model?f=<?php echo ($vo["folder"]); ?>' class='title' title='模型名称'>模型名称：<?php echo ($vo["title"]); ?></a>
    <a href='/index.php/Home/Index/model?f=<?php echo ($vo["folder"]); ?>' class='creator' title='作者'>创作者：<?php echo ($vo["creator"]); ?></a>
    <a href='/index.php/Home/Index/model?f=<?php echo ($vo["folder"]); ?>' class='time' title='更新时间'>更新时间：<?php echo ($vo["time_update"]); ?></a>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="clear"></div>
  </div>
</div>
<div class="footer">
  <div class="wrap">
    <div class="copy"> &copy; 2014 All rights Reseverd | Design by <a target="_blank"
					href="http://web3d.zhong-e.com">web3d中文站</a> </div>
    <div class="clear"></div>
  </div>
</div>
</body>
</html>
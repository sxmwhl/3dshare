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
<a id='slider' class='home' href='/'>返回首页</a>
  <label id='slider' class='modelcategory' for='modelcategory'>更多模型</label>
  <label id='slider' class='hide' for='hide'>收起侧栏</label>
</div>
<aside class="modelcategory">
  <div class="InfoContainer">
	<div id="Name" class="InfoBlack">模型搜索</div>
	<form id="form" action="/index.php/Home/index/search" method="post"
		class="shortform">
		<input type='text' name='keywords' class='formclass-input'
			placeholder="请输入模型名称" /> <input type="submit" name="baocun"
			id="baocun" value="模 型 搜  索" class="formclass-submit shortsubmit" />
	</form>
	<div id="Name" class="InfoBlack">模型分类</div>
	<div class="InfoOrange">
		<div class="InfoDesc">
			<a href='/'>首页</a>/
			<?php if(is_array($category_path)): $i = 0; $__LIST__ = $category_path;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href='/index.php/Home/category?cate=<?php echo ($vo["cate_id"]); ?>'><?php echo ($vo["cate_name"]); ?></a>/<?php endforeach; endif; else: echo "" ;endif; ?>
		</div>
	</div>
	<?php if(is_array($categories)): $i = 0; $__LIST__ = $categories;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="InfoOrange">
		<div class="InfoDesc">
			<a href='/index.php/Home/category?cate=<?php echo ($vo["cate_id"]); ?>' class='title'
				title='分类名称'><?php echo ($vo["cate_name"]); ?></a>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
	<a href="/index.php/Home/form" target="_parent"><div	class="button blue">分享模型</div></a>
</div>
  </div>
</aside>
<div class="wrap">
  <div class="header">
    <div class="logo">
      <h1> <a href="/"><img src="/Public/images/logo.png" alt="" /></a> </h1>
      <span>让更多的人看到你的作品..</span> </div>
  </div>
    <div class="content">
	<div class="content-text">
	<h2>分类路径：<a href='/' class='title' title='分类名称'>首页</a>/
<?php if(is_array($category_path)): $i = 0; $__LIST__ = $category_path;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href='/index.php/Home/category?cate=<?php echo ($vo["cate_id"]); ?>' class='title'><?php echo ($vo["cate_name"]); ?></a>/<?php endforeach; endif; else: echo "" ;endif; ?>
</h2>
</div>
</div>
  <div class="carousel">
    <?php if(is_array($moxings)): $i = 0; $__LIST__ = $moxings;if( count($__LIST__)==0 ) : echo "该分类下暂无模型" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class='item'>
    <img src='/Public/upload/<?php echo ($vo["folder"]); ?>/preview.<?php echo ($vo["preview_ext"]); ?>' alt='<?php echo ($vo["title"]); ?>' />
    <div class='item-background'></div>
    <a href='/index.php/Home/index/model?f=<?php echo ($vo["folder"]); ?>' class='title' title='模型名称'>模型名称：<?php echo ($vo["title"]); ?></a>
    <a href='/index.php/Home/index/model?f=<?php echo ($vo["folder"]); ?>' class='creator' title='作者'>创作者：<?php echo ($vo["creator"]); ?></a>
    <a href='/index.php/Home/index/model?f=<?php echo ($vo["folder"]); ?>' class='time' title='更新时间'>更新时间：<?php echo ($vo["time_update"]); ?></a>
    </div><?php endforeach; endif; else: echo "该分类下暂无模型" ;endif; ?>
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
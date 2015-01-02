<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>3D产品展示—Web3D中文站</title>
<link rel="shortcut icon" href="/Public/images/favicon.ico" />
<link rel="stylesheet" href="/Public/css/style.css" type="text/css"
	media="all" />
</head>
<body>
	<input type='radio' name='model' id='modelinfo' />
	<input type='radio' name='model' id='modelcategory' />
	<input type='radio' name='model' id='hide' />
	<div id='content'>
		<a id='slider' class='home' href='/'>返回首页</a> <label
			id='slider' class='modelinfo' for='modelinfo'>模型信息</label> <label
			id='slider' class='modelcategory' for='modelcategory'>更多模型</label> <label
			id='slider' class='hide' for='hide'>收起侧栏</label>
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
	</aside>

	<aside class="modelinfo">
	<div class="InfoContainer">
		<div id="Name" class="InfoBlack"><?php echo ($model['title']); ?></div>
		<div class="InfoOrange">
			<div class="InfoDesc">模型描述</div>
			<div id="Place" class="InfoValue"><?php echo ($model['description']); ?></div>
		</div>
		<div class="InfoOrange">
			<div class="InfoDesc">模型分类</div>
			<div id="Place" class="InfoValue">
				<a href='/' class='title' title='分类名称'>首页</a>/
				<?php if(is_array($category_path)): $i = 0; $__LIST__ = $category_path;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a
					href='/index.php/Home/category?cate=<?php echo ($vo["cate_id"]); ?>' class='title'
					title='分类名称'><?php echo ($vo["cate_name"]); ?></a>/<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div class="InfoOrange">
			<div class="InfoDesc">创造者</div>
			<div id="Date" class="InfoValue">
				<?php echo $model['creator']; ?>
			</div>
		</div>
		<div class="InfoOrange">
			<div class="InfoDesc">E-mail</div>
			<div id="Artist" class="InfoValue">
				<?php echo $model['email']; ?>
			</div>
		</div>
		<div class="InfoOrange">
			<div class="InfoDesc">更新时间</div>
			<div id="Material" class="InfoValue">
				<?php echo $model['time_update']; ?>
			</div>
		</div>
		<div class="InfoOrange">
			<div class="InfoDesc">浏览次数</div>
			<div id="Number" class="InfoValue">
				<?php echo $model['views']; ?>
			</div>
		</div>
		<div class="InfoOrange">
			<div class="InfoDesc">预览图片</div>
			<div id="Location" class="InfoValue">
				<?php echo "<img src='/Public/upload/" . $model['folder'] . "/preview." . $model['preview_ext'] . "' alt='" . $model['title'] . "' />"?>
			</div>
		</div>
		<a href="/index.php/Home/form/modify?f=<?php echo ($model['folder']); ?>&cate=<?php echo ($model['category']); ?>" target="_parent"><div
				class="button blue">修改信息</div></a>
	</div>
	</aside>
	<iframe id="Content3D" class="Content3D"
		src="/index.php/Home/Index/modelIn?f=<?php echo $model['folder']; ?>" scrolling="no"
		marginheight="0" marginwidth="0" frameborder="0"></iframe>
</body>
</html>
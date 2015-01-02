<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/Public/css/style.css" type="text/css"
	media="all" />
<title>模型分享-web3d中文站</title>
</head>
<body>
	<div class="wrap">
		<div class="header">
			<div class="logo">
				<h1>
					<a href="/"><img src="/Public/images/logo.png"
						alt="" /></a>
				</h1>
				<span>让更多的人看到你的作品..</span>
			</div>
		</div>		
			<form name="mform" method="post" action="/index.php/Home/Category/save"
				class="formclass longform">
				<h1>增 加 分 类</h1>
				<table width="100%" border="0" cellspacing="1" cellpadding="0">
					<tr>
						<th>所属分类：</th>
						<td><select name="root_id" id="root_id" class="sel"><option
									value="0">作为顶级分类</option><?php echo ($category_option); ?>
						</select><a href="/index.php/Home/Category/lists"> 分类编辑</a></td>
					</tr>
					<tr>
						<th>分类名称：</th>
						<td><input name="cate_name" type="text" class="ipt"
							id="cate_name" size="35" maxlength="50" /> <input
							name="cate_isbest" type="checkbox" id="cate_isbest" value="1" /><label
							for="cate_isbest">设为推荐</label></td>
					</tr>
					<tr>
						<th>关 键 词：</th>
						<td><input name="cate_keywords" type="text" class="ipt"
							id="cate_keywords" size="50" maxlength="255" placeholder="多个关键词之间用“逗号”隔开"/><span
							class="tips"></span></td>
					</tr>
					<tr>
						<th class="table">分类描述：</th>
						<td><textarea name="cate_description" cols="50" rows="6"
								class="ipt" id="cate_description"></textarea></td>
					</tr>
					<tr>
						<th>排列顺序：</th>
						<td><input name="cate_order" type="text" class="ipt"
							id="cate_order" size="10" maxlength="10" /></td>
					</tr>
					<tr class="btnbox">
						<td>&nbsp;</td>
						<td><input type="submit" class="btn" value="保 存" />&nbsp; <input
							type="reset" class="btn" value="取 消" /></td>
					</tr>
				</table>
			</form>
<div class="footer">
	<div class="wrap">
		<div class="copy">
			&copy; 2014 All rights Reseverd | Design by <a target="_blank"
				href="http://web3d.zhong-e.com">web3d中文站</a>
		</div>
		<div class="clear"></div>
	</div>
</div>
		</div>
</body>
</html>
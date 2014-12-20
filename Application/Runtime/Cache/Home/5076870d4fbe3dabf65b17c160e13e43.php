<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<div class="formbox">
    	<form name="mform" method="post" action="save">
        <table width="100%" border="0" cellspacing="1" cellpadding="0">
			<tr>
				<th>所属分类：</th>
				<td><select name="root_id" id="root_id" class="sel"><option value="0">作为顶级分类</option><?php echo ($category_option); ?></select></td>
			</tr>
			<tr>
				<th>分类名称：</th>
				<td><input name="cate_name" type="text" class="ipt" id="cate_name" size="35" maxlength="50" />  <input name="cate_isbest" type="checkbox" id="cate_isbest" value="1"{#opt_checked($cate.cate_isbest, 1)#} /><label for="cate_isbest">设为推荐</label></td>
			</tr>
			<tr>
				<th>目录名称：</th>
				<td><input name="cate_dir" type="text" class="ipt" id="cate_dir" size="50" maxlength="50"/></td>
			</tr>

			<tr>
				<th>关 键 词：</th>
				<td><input name="cate_keywords" type="text" class="ipt" id="cate_keywords" size="50" maxlength="255" /><span class="tips">多个关键词之间用“逗号”隔开</span></td>
			</tr>
			<tr>
				<th valign="top">分类描述：</th>
				<td><textarea name="cate_description" cols="50" rows="6" class="ipt" id="cate_description"></textarea></td>
			</tr>
			<tr>
				<th>排列顺序：</th>
				<td><input name="cate_order" type="text" class="ipt" id="cate_order" size="10" maxlength="10"/></td>
			</tr>
			<tr class="btnbox">
            	<td>&nbsp;</td>
				<td>
					<input type="submit" class="btn" value="保 存"/>&nbsp;
					<input type="reset" class="btn" value="取 消"/>
				</td>
			</tr>
		</table>
        </form>
	</div>
</body>
</html>
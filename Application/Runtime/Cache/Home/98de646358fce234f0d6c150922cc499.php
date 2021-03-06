<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type='text/javascript' src='/Public/css/x3dom.js'></script>
<link rel='stylesheet' type='text/css' href='/Public/css/x3dom.css' />
<link rel="stylesheet" type="text/css" href="/Public/css/style.css" />
<title>上传模型预览</title>
<script>
	function change() {
		var dou = ",";
		//头灯 开关
		var HL_checked = document.__getElementById("HL").checked;
		document.getElementById("head").setAttribute('headlight', HL_checked);
		//平行光 开
		var DL_checked = document.__getElementById("DL").checked;
		document.getElementById("directional").setAttribute('on', DL_checked);
		
		//视角 位置
		var vp_x = document.__getElementById("vp_x").value;
		var vp_y = document.__getElementById("vp_y").value;
		var vp_z = document.__getElementById("vp_z").value;
		var vp_position = vp_x.concat(dou, vp_y, dou, vp_z);
		document.getElementById("viewpoint").setAttribute('position',
				vp_position);
		//视角 方向			
		var vp_d_x = document.__getElementById("vp_d_x").value;
		var vp_d_y = document.__getElementById("vp_d_y").value;
		var vp_d_z = document.__getElementById("vp_d_z").value;
		var vp_d_a = document.__getElementById("vp_d_a").value;
		var vp_d_orientation = vp_d_x.concat(dou, vp_d_y, dou, vp_d_z, dou,
				vp_d_a);
		document.getElementById("viewpoint").setAttribute('orientation',
				vp_d_orientation);
	}
	function isEmail(strEmail) {
	if (strEmail.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
	return true;
	else
	alert("oh");
	}
	function  CheckForm()
	{ 
	if  (document.form.title.value.length  ==  0)  { 
	alert("模型名称不能为空!");
	document.form.title.focus();
	return  false;
	}
	if  (document.form.title.value.length  >  100)  { 
		alert("模型名称过长!");
		document.form.title.focus();
		return  false;
		}
	if  (document.form.description.value.length  ==  0)  { 
		alert("模型描述不能为空!");
		document.form.description.focus();
		return  false;
		}
	if  (document.form.description.value.length  >  300)  { 
		alert("模型描述过多!");
		document.form.description.focus();
		return  false;
		}
	if  (document.form.creator.value.length  >  30)  { 
		alert("模型创作者名字过长!");
		document.form.creator.focus();
		return  false;
		}
	
	if  (document.form.vp_x.value.length  >  8)  { 
		alert("视角位置数字过大或过于精确！");
		document.form.name.focus();
		return  false;
		}
	if(isNaN(document.form.vp_x.value)){
		   alert("视角位置必须为数字！");
		}
	return  true;
	} 
	function clearNoNum(obj){   
	obj.value = obj.value.replace(/[^\d.]/g,"");  //清除“数字”和“.”以外的字符  

	 obj.value = obj.value.replace(/^\./g,"");  //验证第一个字符是数字而不是. 

	  obj.value = obj.value.replace(/\.{2,}/g,"."); //只保留第一个. 清除多余的.   

	obj.value = obj.value.replace(".","$#$").replace(/\./g,"").replace("$#$",".");

	}

</script>
</head>

<body class="model_in">
	<input type='radio' name='model' id='modelcategory' checked="checked" />
	<input type='radio' name='model' id='hide' />
	<div id='content'>
		<label id='slider' class='modelcategory' for='modelcategory'>模型信息</label>
		<label id='slider' class='hide' for='hide'>收起侧栏</label>
	</div>
	<aside class="modelcategory margin_left">
	<div class="InfoContainer">
		<form id="form" action="/index.php/Home/Form/save" method="post"
			onkeydown="if(event.keyCode==13)return false;"
			class="shortform">
			    <h1>基本信息</h1>

				<h2>模型名称*：</h2>
				<input type="text" name="title" id="title" value="<?php echo ($model["title"]); ?>" />


				<h2>模型描述*：</h2>
				<textarea name="description" id="description" cols="32" rows="5"><?php echo ($model["description"]); ?></textarea>


				<h2>模型分类*：</h2>
				<select name="category1" id="category1">
					<option value="0" selected="selected">动物</option>
					<option value="1">植物</option>
				</select>
				<select name="category2" id="category2">
					<option value="0">牛</option>
					<option value="1">猪</option>
				</select>
				<input type="hidden" name="preview_ext" value="<?php echo ($model["preview_ext"]); ?>" />
				<input type="hidden" name="folder" value="<?php echo ($model["folder"]); ?>" /> 
				<h2>创建者：</h2>
				<input name="creator" type="text" id="creator" size="10" value="<?php echo ($model["creator"]); ?>" /> 
				<h2> E-mail：</h2>
				<input name="email" type="text" id="email" size="20" value="<?php echo ($model["email"]); ?>" /> 
				 <h1>灯光信息（可选）</h1>
				<h2>头顶灯光：开启:<input name="hl_on" type="checkbox" onchange="change()" id="HL" value="1" <?php echo ($model["hl_on_checked"]); ?> /></h2>
				
				<h2> 平行光： 开启 <input name="dl_on" type="checkbox" id="DL"
					value="1" onchange="change()" <?php echo ($model["dl_on_checked"]); ?>/></h2>
				

                <h1>视角信息（可选）</h1>
				<h2>位置：（改变Z值可以拉近或远离模型）</h2> 
				X <input name="vp_x" type="text" id="vp_x"
					value="<?php echo ($model["vp_x"]); ?>" size="3" onchange="change()" onkeyup="clearNoNum(this)" /> 
					Y <input
					name="vp_y" type="text" id="vp_y" value="<?php echo ($model["vp_y"]); ?>" size="3"
					onchange="change()" onkeyup="clearNoNum(this)" /> 
					Z <input name="vp_z" type="text" id="vp_z"
					value="<?php echo ($model["vp_z"]); ?>" size="3" onchange="change()" onkeyup="clearNoNum(this)" />
				 <h2>方向：</h2>
				 X <input name="vp_d_x" type="text" id="vp_d_x"
					value="<?php echo ($model["vp_d_x"]); ?>" size="3" onchange="change()" onkeyup="clearNoNum(this)" />
					 Y <input name="vp_d_y"
					type="text" id="vp_d_y" value="<?php echo ($model["vp_d_y"]); ?>" size="3" onchange="change()" onkeyup="clearNoNum(this)" />
					Z <input name="vp_d_z" type="text" id="vp_d_z" value="<?php echo ($model["vp_d_z"]); ?>" size="3"
					onchange="change()" onkeyup="clearNoNum(this)" /> A <input name="vp_d_a" type="text"
					id="vp_d_a" value="<?php echo ($model["vp_d_a"]); ?>" size="3" onchange="change()" onkeyup="clearNoNum(this)" />
				<input type="submit" name="baocun" id="baocun" value="保存模型信息" class="formclass-submit shortsubmit"/>				
		</form>
		<img src="/Public/upload/<?php echo ($model["folder"]); ?>/preview.<?php echo ($model["preview_ext"]); ?>"
					width="280" height="200" title="模型缩略图" alt="模型缩略图" />
	</div>
	</aside>

	<x3d id="model"> 
	<scene dopickpass="true" pickmode="idBuf" bboxsize="-1,-1,-1" bboxcenter="0,0,0" render="true" def="scene">
	<Viewpoint id='viewpoint' description='Default Viewpoint' position='<?php echo ($model["vp_position"]); ?>' orientation='<?php echo ($model["vp_orientation"]); ?>'></Viewpoint> 
	<navigationInfo	id="head" headlight='<?php echo ($model["hl_on"]); ?>' type='"EXAMINE"'></navigationInfo> 
	<directionalLight id="directional" direction='0 0 -1' on='<?php echo ($model["dl_on"]); ?>' intensity='1' shadowIntensity='0.0' color='0 0 0'></directionalLight>
    <background topurl="" righturl="" lefturl="" fronturl="" bottomurl="" backurl="" skyangle="" groundangle="" groundcolor="" transparency="1.0" skycolor="0 0 0"> </background> 
	<Environment id="gamma" gammaCorrectionDefault="linear"></Environment> 
	<Inline	nameSpaceName="s" mapDEFToID="true"	url="/Public/upload/<?php echo ($model["folder"]); ?>/model.x3d">	</Inline>
	 </scene>
	  </x3d>


</body>
</html>
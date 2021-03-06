<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<script type='text/javascript' src='/Public/css/x3dom.js'></script>
<link rel='stylesheet' type='text/css' href='/Public/css/x3dom.css' />
<link rel="stylesheet" href="/Public/css/style.css" type="text/css" media="all" />
	<title>模型展示</title> 	
</head>
<body class="model_in">
	<x3d id="model"> 
    <scene dopickpass="true" pickmode="idBuf" bboxsize="-1,-1,-1" bboxcenter="0,0,0" render="true" def="scene">
      <navigationInfo id="head" headlight='<?php echo ($model["hl_on"]); ?>' type='"EXAMINE"'></navigationInfo>
      <directionalLight id="directional" on="<?php echo ($model["dl_on"]); ?>"></directionalLight>
      <Viewpoint id='viewpoint' description='Default Viewpoint' position='<?php echo ($model["vp_position"]); ?>' orientation='<?php echo ($model["vp_orientation"]); ?>'></Viewpoint>
        <background topurl="" righturl="" lefturl="" fronturl="" bottomurl="" backurl="" skyangle="" groundangle="" groundcolor="" transparency="1.0" skycolor="0 0 0">
      </background>
      <Environment id="gamma" gammaCorrectionDefault="linear"></Environment>
        <Inline nameSpaceName="s" mapDEFToID="true" url="/Public/upload/<?php echo ($model["folder"]); ?>/model.x3d"> </Inline>
</scene> 
</x3d>
	
</body>
</html>
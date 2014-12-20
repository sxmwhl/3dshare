<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/Public/css/style.css" type="text/css" media="all" />
<title>模型分享-web3d中文站</title>
</head>

<body>
<div class="wrap">
  <div class="header">
    <div class="logo">
      <h1> <a href="/"><img src="/Public/images/logo.png" alt="" /></a> </h1>
      <span>让更多的人看到你的作品..</span> </div>
  </div>
  <form method="post" action="/index.php/Home/Form/upload" enctype="multipart/form-data" class="formclass">
    <input type="hidden" name="MAX_FILE_SIZE" value="10485760"/>
    <h1>分享您的模型...</h1>
    <h2>模型文件*:(x3d)</h2>
    <input type='text' name='textfield' id='textfield1' class='formclass-input' placeholder="必选"/>    
    <input id="modelinput" name="model" type="file"  value="浏览" accept="model/x3d+xml" class="formclass-file textfield1" onchange="document.getElementById('textfield1').value=this.value"/>
    <h2>模型缩略图*:(jpg/png/gif)</h2>
    <input type='text' name='textfield' id='textfield2' class='formclass-input' placeholder="必选"/> 
    <input id="picinput" name="preview" type="file"  value="浏览" accept="image/png,image/gif,image/jpeg,image/pjpeg"  class="formclass-file textfield2" onchange="document.getElementById('textfield2').value=this.value"/>
    <h2> 贴图文件:(jpg/png/gif)</h2>
    <input type='text' name='textfield' id='textfield3' class='formclass-input'  placeholder="可选(贴图文件应位于模型同目录下的/texture/文件夹内)"/> 
    <input id="textureinput" name="texture" type="file"  value="浏览" accept="image/png,image/gif,image/jpeg,image/pjpeg"  class="formclass-file textfield3" onchange="document.getElementById('textfield3').value=this.value"/>
    <input type="submit" value="上传" name="B1" class="formclass-submit"/>
    
  </form>
  <div class="footer">
  <div class="wrap">
    <div class="copy"> &copy; 2014 All rights Reseverd | Design by <a target="_blank"
					href="http://web3d.zhong-e.com">web3d中文站</a> </div>
    <div class="clear"></div>
  </div>
</div>
</div>
</body>
</html>
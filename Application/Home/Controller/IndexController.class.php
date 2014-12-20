<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$Moxing=M('Moxing','think_');
    	$list1 = $Moxing->where('sign=0')->order('time_update')->limit(6)->select();
    	$list2 = $Moxing->where('sign=0')->order('views')->limit(6)->select();
    	$this->models1=$list1;
    	$this->models2=$list2;
    	//echo $Moxing->getLastSql();
    	$this->display();
    }
    public function model(){
    	$Moxing=M('Moxing','think_');
    	$md5=I('f');
    	if (!preg_match("/^([a-fA-F0-9]{32})$/", $md5))
    	{
    		$this->display("Public:404");
    		exit();
    	}
    	$where="folder='".$md5."'";
    	$data=$Moxing->where($where)->find();
    	$this->assign('model',$data);
    	//echo $Moxing->getLastSql();
    	$this->display('model');
    }
    public function modelIn(){
    	$Moxing=M('Moxing','think_');
    	$md5=I('f');
    	if (!preg_match("/^([a-fA-F0-9]{32})$/", $md5))
    	{
    		$this->display("Public:404");
    		exit();
    	}
    	$where="folder='".$md5."'";
    	$data=$Moxing->where($where)->find();
    	$data['hl_on']=$data['hl_on']==0?"false":"true";
    	$data['dl_on']=$data['dl_on']==0?"false":"true";
    	$this->assign('model',$data);
    	//echo $Moxing->getLastSql();
    	$this->display('modelIn');
    }
}
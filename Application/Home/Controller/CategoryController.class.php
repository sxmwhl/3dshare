<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends Controller {
	function get_category_option($root_id = 0, $cate_id = 0, $level_id = 0) {
		$Category=M('Category','think_');
		$categories = $Category->where('root_id='.$root_id)->order('cate_order ASC,cate_id ASC')->select();
		$optstr = '';
		foreach ($categories as $cate) {
			$optstr .= '<option value="'.$cate['cate_id'].'"';
			if ($cate_id > 0 && $cate_id == $cate['cate_id']) $optstr .= ' selected';
	
			if ($level_id == 0) {
				$optstr .= ' style="background: #EEF3F7;">';
				$optstr .= '├'.$cate['cate_name'];
			} else {
				$optstr .= '>';
				for ($i = 2; $i <= $level_id; $i++) {
					$optstr .= '│&nbsp;&nbsp;';
				}
				$optstr .= '│&nbsp;&nbsp;├'.$cate['cate_name'];
			}
			$optstr .= '</option>';
			$optstr .= $this->get_category_option($cate['cate_id'], $cate_id, $level_id + 1);
		}
		unset($categories);	
		return $optstr;
	}
    public function index(){
    	$root_id=I('c');
    	if(empty($root_id))$root_id=0;
    	$Category=M('Category','think_');
    	$list = $Category->where('root_id='.$root_id)->order('cate_order')->select();
    	$this->list=$list;
    	//echo $Moxing->getLastSql();
    	$this->display();
    }
    public function add(){
    	$root_id=I('c');
    	$category_option = $this->get_category_option(0, $root_id, 0);
    	$this->category_option=$category_option;
    	
    	//echo $Moxing->getLastSql();
    	$this->display('add');
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
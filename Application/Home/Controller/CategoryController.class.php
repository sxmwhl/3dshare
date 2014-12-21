<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends Controller {	
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
    	$Category=D('Category');
    	$category_option = $Category->get_category_option(0, $root_id, 0);
    	$this->category_option=$category_option;    	
    	//echo $Moxing->getLastSql();
    	$this->display('add');
    }
    public function save(){
    	$inputs=I('post.');
    	$Category=D('Category');
    	if (!$Category->create($inputs,1)){ // 创建数据对象
    		// 如果创建失败 表示验证没有通过 输出错误提示信息
    		exit($Category->getError());
    	}else{
    		// 验证通过 写入新增数据
    		//echo $Moxing->title;
    		$Category->add();    		
    	}    	
    	$Category->update_categories();
    	//$this->display('modelIn');
    }
}
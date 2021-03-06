<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends Controller {	
    public function index(){
    	$cate_id=I('cate');
    	if(empty($cate_id))$cate_id=0;
    	$Category=D('Category');
    	$category_path=$Category->get_category_path($cate_id);
    	$this->category_path=$category_path;
    	//echo $Category->getLastSql();
    	$categories = $Category->get_categories($cate_id);
    	$this->categories=$categories;
    	$Moxing=D('Moxing');
    	$moxings = $Moxing->get_category_moxings($cate_id);
    	$this->moxings=$moxings;
    	
    	$this->display();
    }
    public function add(){
    	$root_id=I('cate');
    	$Category=D('Category');
    	$category_option = $Category->get_category_option(0, $root_id, 0);
    	$this->category_option=$category_option;    	
    	//echo $Moxing->getLastSql();
    	$this->display('add');
    }
    public function edit(){
    	$cate_id=I('cate');
    	$Category=D('Category');
    	$root_id=$Category->where('cate_id='.$cate_id)->field('root_id')->find();    	
    	$this->category_option=$Category->get_category_option(0, $root_id['root_id'], 0);
    	$this->onecategory=$Category->get_one_category($cate_id);
    	
    	echo $Category->getLastSql();
    	$this->display('edit');
    }
    public function lists(){
    	$cate_id=I('cate');
    	if(empty($cate_id))$cate_id=0;
    	$Category=D('Category');
    	$categories = $Category->get_categories($cate_id);
    	$this->categories=$categories;
    	//echo $Moxing->getLastSql();
    	$this->display('lists');
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
    public function update(){
    	$inputs=I('post.');
    	$Category=D('Category');
    	if (!$Category->create($inputs,2)){ // 创建数据对象
    		// 如果创建失败 表示验证没有通过 输出错误提示信息
    		exit($Category->getError());
    	}else{
    		// 验证通过 写入新增数据
    		//echo $Moxing->title;
    		$Category->where('cate_id='.$inputs['cate_id'])->save();
    	}
    	//$this->display('modelIn');
    	header("Location:".__ROOT__."/Home/category/lists?cate=".$inputs['root_id']);
    }
}
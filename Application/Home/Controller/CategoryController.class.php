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
    	$category_option = $this->get_category_option(0, $root_id, 0);
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
    	
    	$this->update_categories();
    	//$this->display('modelIn');
    }
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
    function get_category_parent_ids($cate_id) {
    	$Category=M('Category','think_');
    	$ids = $Category->where('cate_id='.$cate_id)->field('root_id')->select();
    	//$sql = "SELECT root_id FROM ".$DB->table('categories')." WHERE cate_id='$cate_id'";
    	//$ids = $DB->fetch_all($sql);
    
    	$idstr = '';
    	if (!empty($ids) && is_array($ids)) {
    		foreach ($ids as $id) {
    			if ($id['root_id'] > 0) {
    				$idstr .= $this->get_category_parent_ids($id['root_id']);
    				$idstr .= ','.$id['root_id'];
    			} else {
    				$idstr = '0';
    			}
    		}
    	}
    
    	return $idstr;
    }    
   
    function get_category_child_ids($cate_id) {
    	$Category=M('Category','think_');
    	$ids = $Category->where('root_id='.$cate_id)->field('cate_id')->select();
    
    	//$sql = "SELECT cate_id FROM ".$DB->table('categories')." WHERE root_id=$cate_id";
    	//$ids = $DB->fetch_all($sql);
    	$idstr = '';
    	foreach ($ids as $id) {
    		$idstr .= ','.$id['cate_id'];
    		$idstr .= $this->get_category_child_ids($id['cate_id']);
    	}
    	unset($ids);
    
    	return $idstr;
    }
    function get_category_count($cate_id = 0) {
    	$Category=M('Category','think_');
    	    
    	if ($cate_id > 0) $rows = $Category->where('root_id='.$cate_id)->field('cate_id')->select();
    	$count = count($rows);
    
    	return $count;
    }
    function update_categories() {
    	$Category=D('Category');
    	$cate_ids = $Category->field('cate_id')->order('cate_id ASC')->select();
    	//$sql = "SELECT cate_id FROM $table ORDER BY cate_id ASC";
    	//$cate_ids = $DB->fetch_all($sql);
    	echo $count = count($cate_ids);
    	foreach ($cate_ids as $id) {
    		$data['cate_arrparentid'] = $this->get_category_parent_ids($id['cate_id']);
    		$data['cate_arrchildid'] = $id['cate_id'].$this->get_category_child_ids($id['cate_id']);
    		$data['cate_childcount'] = $this->get_category_count($id['cate_id']);  
    		if (!$Category->create($data,2)){ // 创建数据对象
    			// 如果创建失败 表示验证没有通过 输出错误提示信息
    			exit($Category->getError());    			
    		}else{
    			// 验证通过 写入新增数据
    			//echo $Moxing->title;
    			$where="cate_id='".$id['cate_id']."'";
    			$Category->where($where)->save();
    			
    			
    		} 
    	}
    }

}
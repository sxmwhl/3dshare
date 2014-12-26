<?php
namespace Home\Model;
use Think\Model;
class CategoryModel extends Model {
	protected $tablePrefix = 'think_';
	public $Category;
	//自动验证
	protected $_validate = array(
			array('cate_name','require','请为分类命名！'),
			array('cate_dir','require','请为分配分类目录'),
	);
	/*定义自动完成
	protected $_auto    =   array(
			array('cate_arrparentid','',1),
			array('cate_arrchildid','',1),
			array('cate_childcount','0',1),

	);*/
	public function  __construct(){
		parent::__construct();
		$this->Category=M('Category','think_');
	}
	function get_one_category($cate_id = 0) {
		$row=$this->Category->where("cate_id=".$cate_id)->find();	
		
		//$row = load_cache('category_'.$cate_id) ? load_cache('category_'.$cate_id) : $DB->fetch_one("SELECT cate_id, root_id, cate_name, cate_dir, cate_arrparentid, cate_arrchildid, cate_childcount, cate_postcount FROM ".$DB->table('categories')." WHERE cate_id=$cate_id LIMIT 1");
	    return $row;
	}
	function get_category_path($cate_id = 0, $separator = ' &raquo; ') {	
		$cate = $this->get_one_category($cate_id);
		if (!isset($cate)) return '';
		$category_path=$this->Category->where("cate_id IN (".$cate_id.",".$cate['cate_arrparentid'].")")->field('cate_id,cate_name')->select();	
		//$sql = "SELECT cate_id, cate_name FROM ".$DB->table('categories')." WHERE cate_id IN (".$cate_id.','.$cate['cate_arrparentid'].")";
		//$categories = $DB->fetch_all($sql);
		return $category_path;
	}
	function get_categories($cate_id=0){
		$categories = $this->Category->where('root_id='.$cate_id)->order('cate_order ASC,cate_id ASC')->select();
		return $categories;
	}
	function get_category_option($root_id = 0, $cate_id = 0, $level_id = 0) {		
		$categories = $this->Category->where('root_id='.$root_id)->field('cate_id,cate_name')->order('cate_order ASC,cate_id ASC')->select();
		//$sql = "SELECT cate_id, cate_name FROM ".$DB->table('categories')." WHERE root_id=$root_id ORDER BY cate_order ASC, cate_id ASC";
		//$categories = $DB->fetch_all($sql);
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
		$ids = $this->Category->where('cate_id='.$cate_id)->field('root_id')->select();
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
		$ids = $this->Category->where('root_id='.$cate_id)->field('cate_id')->select();	
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
			
		if ($cate_id > 0) $rows = $this->Category->where('root_id='.$cate_id)->field('cate_id')->select();
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
<?php
namespace Home\Model;
use Think\Model;
class MoxingModel extends Model {
	protected $tablePrefix = 'think_';
	public $Moxing;
	//自动验证
	protected $_validate    =   array(
			array('title',array('未命名',''),'请为模型命名！',1,'notin',2),
			array('description',array('尚无描述',''),'请对模型进行描述！',1,'notin',2),
	);
	// 定义自动完成
	protected $_auto    =   array(
			array('title','未命名',1),
			array('description','尚无描述',1),
			array('category','0',1),
			array('creator','佚名',1),
			array('sign','0',1),
			array('views','1',1),			
			array('hl_on','1',1),
			array('dl_on','0',1),			
			array('vp_position','0,0,10',1),
			array('vp_orientation','0,0,0,1',1),

	);
	public function  __construct(){
		parent::__construct();
		$this->Moxing=M('Moxing','think_');
	}
	function get_category_moxings($cate_id=0){
		$moxings=$this->Moxing->where('category='.$cate_id)->field('*')->order('views')->select();
		return $moxings;
	}
}
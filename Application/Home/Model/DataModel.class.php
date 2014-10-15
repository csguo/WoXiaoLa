<?php
namespace Home\Model;
use Think\Model;
class DataModel extends Model {
	public function __construct() {
		parent::__construct("Data");
	}
	
	public function update($where, & $data) {
		return $this->where($where)->save($data);
	}
	
	public function getListByPage($pageSize = 10) {
		$data = array();
		$count      = $this->where('status=1')->count();
		$Page       = new \Think\Page($count, $pageSize);
		$show       = $Page->show();
		
		$data['list'] = $this->where('status=1')->order('id desc')->limit($Page->firstRow.','.$Page->listRows)->select();
		$data['pageString'] = $show;
		
		return $data;
	}

	public function getData(& $where){
		return $this->where($where)->find();
	}
}
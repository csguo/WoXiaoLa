<?php
namespace Home\Controller;
use Home\Controller;
class IndexController extends BaseController {
    public function index(){

		$data = D('Data')->getListByPage();
		$list = $data['list'];
		$pageString = $data['pageString'];
		$this->assign('title', C('WEB_TITLE').C('WEB_DESC'));
		$this->assign('list', $list);
		$this->assign('pageString', $pageString);

        $this->display();
    }

    public function details(){
    	$map['id'] = I('get.id', '', 'htmlspecialchars');//数据ID
    	$val=D('Data')->getData($map);
    	$this->assign('title', $val['title']);
    	$this->assign('val', $val);
    	$this->display();
    }
}
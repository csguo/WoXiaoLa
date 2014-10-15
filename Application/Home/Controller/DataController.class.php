<?php
namespace Home\Controller;
use Think\Controller;
class DataController extends Controller {
    
	public function dingCai() {
		$type = I('post.type', '');
		$pkid = I('post.id', '', 'htmlspecialchars');
		
		if(!is_numeric($pkid)) {
			echo json_encode(array('status'=>2, 'info'=>'参数错误'));exit;
		}
		
		if($type == 'ding') {
			M('Data')->where('id='.$pkid)->setInc('ding');
			
		} else {
			M('Data')->where('id='.$pkid)->setDec('cai');
		}
		
		echo json_encode(array('status'=>1, 'info'=>'成功'));
	}
}
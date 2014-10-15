<?php
namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller {

	function _initialize(){
		$uid=session('?uid')?session('uid'):0;
		$uname=session('?uname')?session('uname'):'';
	    $this->assign('uid', $uid);
	    $this->assign('uname', $uname);
	 }

	//是否登陆
	public function isLogin(){
		
	}

	//登陆
	public function login(){
		$param['username'] = I('post.username', '', 'htmlspecialchars');//用户名
		$param['password'] = I('post.password', '', 'htmlspecialchars');//密码
		$param['cookie'] = I('post.cookietime', '', 'htmlspecialchars');//记住密码
		$param['refurl'] = I('post.refurl', '', 'htmlspecialchars');//跳转地址
		if(empty($param['username'])) {
			echo json_encode(array('status'=>2, 'info'=>'请输入您的用户名!'));exit;
		}else if(empty($param['password'])){
			echo json_encode(array('status'=>2, 'info'=>'请输入您的登陆密码!'));exit;
		}else{
			$res = array();
			$data=D('User')->checkLogin($param['username'],$param['password']);
			if($data){
				session('[start]'); // 启动session
				session('uid',$data['id']);
				session('uname',$data['nickname']);
		    	$res['status'] = 1;
				$res['info'] = '登陆成功！';
				$res['url'] = $param['refurl'];
			}else{
				$res['status'] = 2;
				$res['info'] = '用户名或密码错误！';
			} 
			echo json_encode($res);
		}
	}

	//退出
	public function logout(){
		session(null); 
		session('[destroy]'); // 销毁session
		$param['refurl'] = I('post.refurl', '', 'htmlspecialchars');//跳转地址
		if(session('?uid')){
			echo json_encode(array('status'=>2, 'info'=>'推出失败!'));exit;
		}else{
			echo json_encode(array('status'=>1,'url'=>$param['refurl'], 'info'=>'退出成功!'));exit;
		}
	}

	//注册
	public function register(){

	}
}

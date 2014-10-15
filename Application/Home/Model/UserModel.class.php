<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model {

	public function checkLogin(& $un,& $pw){
		$map['username']=$un;
		$map['password']=md5($pw);
		return $this->where($map)->find();
	}

}
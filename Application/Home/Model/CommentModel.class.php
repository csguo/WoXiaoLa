<?php
namespace Home\Model;
use Think\Model\ViewModel;
class CommentModel extends ViewModel {

	//视图模型
	public $viewFields = array(
     'Comment'=>array('id','data_id','uid','pid','ppid','content','comment','praise','area','hot','FROM_UNIXTIME(post_time)'=>'post_time','_table'=>"__COMMENT__",'_as' => 'com'),
     'User'=>array('u.nickname'=>'nickname','u.avatar'=>'avatar', '_on'=>'com.uid=u.id','_table'=>"__USER__",'_as' => 'u','_type'=>'LEFT'),
     'PUser'=>array('pu.nickname'=>'pnickname', '_on'=>'com.puid=pu.id','_table'=>"__USER__",'_as' => 'pu','_type'=>'RIGHT')
   	);

	public function __construct() {
		parent::__construct("Comment");
	}

	//保存评论
	public function saveComment(&$data) {
		$Model=M('Comment');
		$id=$data['ppid']==0?$data['pid']:$data['ppid'];
		$Model->where('id='.$id)->setInc('comment',1);
		//echo $Model->getLastSQL();exit;
		return $Model->data($data)->add();
	}

	//赞评论
	public function praiseComment(&$id){
		$Model=M('Comment');
		$Model->where('id='.$id)->setInc('praise',1);
	}

	//获取评论
	public function getComment(&$id){
		$map['id']=$id;
		$res=$this->where($map)->order('com.id asc')->find();
		//echo $this->getLastSQL();
		return $res;
	}
	
	//获取评论列表
	public function getCommentList(&$id,&$pid,&$ppid,&$p=1,$num=6){
		$map['data_id'] = array('eq',$id);
		$map['pid'] = array('eq',$pid);
		$map['ppid'] = array('eq',$ppid);
		$res=$this->where($map)->order('com.id asc')->limit(($p-1)*$num,$num)->select();
		//echo $this->getLastSQL();exit;
		return $res;
	}

	public function getCommentCount(&$id,&$pid,&$ppid){
		$map['data_id'] = array('eq',$id);
		$map['pid'] = array('eq',$pid);
		$map['ppid'] = array('eq',$ppid);
		$count=$this->where($map)->count();
		//echo $this->getLastSQL();exit;
		return $count;
	}
}
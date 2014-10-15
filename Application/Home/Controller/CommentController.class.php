<?php
namespace Home\Controller;
use Think\Controller;
use Org\Net\IpLocation;
class CommentController extends Controller {
   
	public function postComment(){
		$data = array();
		$data['data_id'] = I('post.id', '', 'htmlspecialchars');//数据ID
		$data['pid'] = I('post.pid', '0', 'htmlspecialchars');//父级评论ID
        $data['ppid'] = I('post.ppid', '0', 'htmlspecialchars');//父父级评论ID
        $data['uid'] = session('?uid')?session('uid'):0;//用户ID
        $data['puid'] = I('post.puid', '0', 'htmlspecialchars');//父父级评论用户ID
        $content = I('post.content', '', 'htmlspecialchars');//评论内容
        $data['content']=filterExpression($content);
        $data['ip'] = get_client_ip();
        $Ip = new IpLocation('UTFWry.dat'); 
        $data['area'] = $Ip->getlocation($data['ip']); // 获取某个IP地址所在的位置
        $data['post_time'] = time();

		if(!is_numeric($data['data_id'])) {
			echo json_encode(array('status'=>2, 'info'=>'error'));exit;
		}
        $id = D('Comment')->saveComment($data);
		$data=D('Comment')->getComment($id);
        
		$res = array();
		$res['data'] = $data;
		$res['status'] = 1;
		$res['info'] = 'ok';
		
		echo json_encode($res);
    }


    //获取顶级评论
    public function showTopList(){
    	$data = array();
    	$id = I('get.id', '', 'htmlspecialchars');//数据ID
    	$pid= I('get.pid', '0', 'htmlspecialchars');//父级评论ID
    	$ppid= I('get.ppid', '0', 'htmlspecialchars');//父父级评论ID
    	$page= I('get.p', '1', 'htmlspecialchars');//页码
    	$data=D('Comment')->getCommentList($id,$pid,$ppid,$page,5);
        $count=D('Comment')->getCommentCount($id,$pid,$ppid);
    	$res = array();
    	$res['count'] = $count;
		$res['data'] = $data;
    	echo json_encode($res);
    }

     //获取次级评论
    public function showSubList(){
        $data = array();
        $id = I('get.id', '', 'htmlspecialchars');//数据ID
        $pid= I('get.pid', '0', 'htmlspecialchars');//父级评论ID
        $ppid= I('get.ppid', '0', 'htmlspecialchars');//父父级评论ID
        $page= I('get.p', '1', 'htmlspecialchars');//页码
        $data=D('Comment')->getCommentList($id,$pid,$ppid,$page,3);
        $count=D('Comment')->getCommentCount($id,$pid,$ppid);
        $res = array();
        $res['count'] = $count;
        $res['data'] = $data;
        echo json_encode($res);
    }

    //赞评论
    public function replayPraise(){
        $id = I('post.id', '', 'htmlspecialchars');//数据ID
        if(is_numeric($id)){
            D('Comment')->praiseComment($id);
            echo json_encode(array('status'=>1, 'info'=>'赞 +1'));exit;
        }else{ 
            echo json_encode(array('status'=>2, 'info'=>'已经赞过了'));exit;
        }
          
    }

    //举报评论
    public function replayReport(){

    }


    //显示回复
    public function replayShow(){
    	$var['id'] = I('get.id', '', 'htmlspecialchars');
    	$var['data_id'] = I('get.data_id', '', 'htmlspecialchars');
        $var['uid'] = I('get.uid', '0', 'htmlspecialchars');
        $var['nickname'] = I('get.name', '0', 'htmlspecialchars');
    	$res='';
		$res.='<div class="comt_item_reply" id="comt_item_reply_'.$var['id'].'">';
		$res.='<div id="comt_item_reply_show_'.$var['id'].'"> ';
		$res.='<script type="text/javascript">';
		$res.='$(document).ready(function() {';
		$res.='getrecomment_list('.$var['data_id'].','.$var['id'].');';
		$res.='});';
		$res.='</script>';
		$res.='</div>';
		$res.='<a href="javascript:;" data-page="2" onclick="getrecomment_list_more('.$var['data_id'].','.$var['id'].',this)" class="get_more get_more_s_'.$var['id'].'">加载更多</a>';
		$res.='<div class="replybox clear" id="replybox_'.$var['id'].'">';
		$res.='<textarea onblur="re_onfocus(this)" id="Pj_Add_Input_reply_'.$var['id'].'" class="Pj_Add_Input_reply fl" placeholder="回复 '.$var['nickname'].'"></textarea>';
    	$res.='<input type="button" id="Pj_Btn_Comt_Smt_reply" onclick="PostComment(this);" data-id="'.$var['data_id'].'" data-pid="'.$var['id'].'" data-puid="'.$var['uid'].'" data-content="Pj_Add_Input_reply_'.$var['id'].'" class="fl" value="回复">';  
		$res.='<div class="ds-toolbar-buttons-re"><a onclick="$(\'#smilies-r-'.$var['id'].'\').toggle();" class="ds-toolbar-button ds-add-emote" title="插入表情"></a></div>';
		$res.='<div style="clear:both;"></div>';
		$res.='<div id="smilies-r-'.$var['id'].'" data-content="Pj_Add_Input_reply_'.$var['id'].'" style=" display:none;margin-bottom:5px;"> <a href="javascript:;" onclick="grin(\':arrow:\',this)"> <img src="./Public/smilies/smilies/icon_arrow.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':grin:\',this)"><img src="./Public/smilies/smilies/icon_biggrin.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':!:\',this)"><img src="./Public/smilies/smilies/icon_exclaim.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':?:\',this)"><img src="./Public/smilies/smilies/icon_question.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':cool:\',this)"><img src="./Public/smilies/smilies/icon_cool.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':roll:\',this)"><img src="./Public/smilies/smilies/icon_rolleyes.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':eek:\',this)"><img src="./Public/smilies/smilies/icon_eek.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':evil:\',this)"><img src="./Public/smilies/smilies/icon_evil.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':razz:\',this)"><img src="./Public/smilies/smilies/icon_razz.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':mrgreen:\',this)"><img src="./Public/smilies/smilies/icon_mrgreen.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':smile:\',this)"><img src="./Public/smilies/smilies/icon_smile.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':oops:\',this)"><img src="./Public/smilies/smilies/icon_redface.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':lol:\',this)"><img src="./Public/smilies/smilies/icon_lol.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':mad:\',this)"><img src="./Public/smilies/smilies/icon_mad.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':twisted:\',this)"><img src="./Public/smilies/smilies/icon_twisted.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':wink:\',this)"><img src="./Public/smilies/smilies/icon_wink.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':idea:\',this)"><img src="./Public/smilies/smilies/icon_idea.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':cry:\',this)"><img src="./Public/smilies/smilies/icon_cry.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':shock:\',this)"><img src="./Public/smilies/smilies/icon_surprised.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':neutral:\',this)"><img src="./Public/smilies/smilies/icon_neutral.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':sad:\',this)"><img src="./Public/smilies/smilies/icon_sad.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':???:\',this)"><img src="./Public/smilies/smilies/icon_confused.gif" alt="" data-bd-imgshare-binded="1"></a>';
    	$res.='</div>';
		$res.='</div>';
				
		echo $res;
    }

    //显示评论
    public function showComment(){
    	$var['id'] = I('get.id', '', 'htmlspecialchars');
    	$res='';
    	$res='<div class="pinglun_box mb10">';
    	$res.='<div id="pl-h-'.$var['id'].'"></div>';
    	$res.='<div class="dkyj" id="'.$var['id'].'">';
    	$res.='<h3>最新评论</h3>';
    	$res.='</div>';
    	$res.='<ul id="comment-show-ui-'.$var['id'].'">';
  		$res.='<script type="text/javascript">';
		$res.='$(document).ready(function() {';
		$res.='getcomment_list('.$var['id'].');';
		$res.='});';
		$res.='</script>';
   		$res.='</ul>';
		$res.='<a href="javascript:;" data-page="2" onclick="getcomment_list_more('.$var[id].',this)" class="get_more get_more_f_'.$var['id'].'">加载更多</a>';
		$res.='<div class="pinglun_sub" id="pinglun_sub_'.$var['id'].'">';
		$res.='<div class="pinglun_s clear">';
		$res.='<textarea id="Pj_Add_Input_'.$var['id'].'" class="Pj_Add_Input" placeholder="我也来神吐槽一句..."></textarea>';
		$res.='<div class="pinglun_yz">';
		$res.='<input type="button" id="Pj_Btn_Comt_Smt" onclick="PostComment(this);" data-id="'.$var['id'].'" data-pid="0" data-ip="192.168.1.1" data-content="Pj_Add_Input_'.$var['id'].'" value="评论">';
		$res.='</div>';
    	$res.='<div class="ds-toolbar-buttons"><a onclick="$(\'#smilies-'.$var['id'].'\').toggle();" class="ds-toolbar-button ds-add-emote" title="插入表情"></a></div>';
    	$res.='<div id="smilies-'.$var['id'].'" data-content="Pj_Add_Input_'.$var['id'].'" style=" display:none;margin-bottom:5px;"> <a href="javascript:;" onclick="grin(\':arrow:\',this)"> <img src="./Public/smilies/smilies/icon_arrow.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':grin:\',this)"><img src="./Public/smilies/smilies/icon_biggrin.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':!:\',this)"><img src="./Public/smilies/smilies/icon_exclaim.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':?:\',this)"><img src="./Public/smilies/smilies/icon_question.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':cool:\',this)"><img src="./Public/smilies/smilies/icon_cool.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':roll:\',this)"><img src="./Public/smilies/smilies/icon_rolleyes.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':eek:\',this)"><img src="./Public/smilies/smilies/icon_eek.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':evil:\',this)"><img src="./Public/smilies/smilies/icon_evil.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':razz:\',this)"><img src="./Public/smilies/smilies/icon_razz.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':mrgreen:\',this)"><img src="./Public/smilies/smilies/icon_mrgreen.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':smile:\',this)"><img src="./Public/smilies/smilies/icon_smile.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':oops:\',this)"><img src="./Public/smilies/smilies/icon_redface.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':lol:\',this)"><img src="./Public/smilies/smilies/icon_lol.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':mad:\',this)"><img src="./Public/smilies/smilies/icon_mad.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':twisted:\',this)"><img src="./Public/smilies/smilies/icon_twisted.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':wink:\',this)"><img src="./Public/smilies/smilies/icon_wink.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':idea:\',this)"><img src="./Public/smilies/smilies/icon_idea.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':cry:\',this)"><img src="./Public/smilies/smilies/icon_cry.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':shock:\',this)"><img src="./Public/smilies/smilies/icon_surprised.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':neutral:\',this)"><img src="./Public/smilies/smilies/icon_neutral.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':sad:\',this)"><img src="./Public/smilies/smilies/icon_sad.gif" alt="" data-bd-imgshare-binded="1"></a> <a href="javascript:;" onclick="grin(\':???:\',this)"><img src="./Public/smilies/smilies/icon_confused.gif" alt="" data-bd-imgshare-binded="1"></a>';
    	$res.='<div style="clear:both;"></div>';
    	$res.='</div>';
    	$res.='</div>';
    	$res.='</div>';
    	$res.='</div>';
    	echo $res;
    }
}
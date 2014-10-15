// JavaScript Document

$(document).ready(function() {
	$('#open_feed').bind('click',
	function() {
		$('.qq_list').show();
		$('#feed').animate({
			top: "10%"
		},
		"slow")
	});
	$('.close').click(function() {
		$('#feed').animate({
			top: "-100%"
		},
		"slow");
		$('.qq_list').hide();
	});
	$('.qq_zhezhao').click(function() {
		$('#feed').animate({
			top: "-100%"
		},
		"slow");
		$('.qq_list').hide();
	});
	function gotoTop(min_height) {
		var gotoTop_html = '<div id="gotoTop">回到顶部</div>';
		$("body").append(gotoTop_html);
		$("#gotoTop").click(function() {
			$('html,body').animate({
				scrollTop: 0
			},700);
		}).hover(function() {
			$(this).addClass("hover");
		},
		function() {
			$(this).removeClass("hover");
		});
		min_height ? min_height = min_height: min_height = 200;
		$(window).scroll(function() {
			var s = $(window).scrollTop();
			if (s > min_height) {
				$("#gotoTop").fadeIn(100);
			} else {
				$("#gotoTop").fadeOut(200);
			};
		});
	};
	gotoTop();
});

/*pingtop*/

(function($) {
	$.fn.pin = function(options) {
		var defaultVal = {
			data: {
				foot: 'body',
				m_t: '0',
				m_b: '0',
				z_index: ' ',
			}
		};
		var obj = $.extend(defaultVal, options);
		return this.each(function() {
			var dom = $(this);
			var data = obj.data;
			var p_o = dom.offset();
			$(window).scroll(function(w) {
				wh = $(this).scrollTop();
				var p_w = dom.width();
				var p_h = dom.height();
				var f_h = $(data.foot).offset();
				var w_h = p_h + wh;
				if (wh > p_o.top) {
					if (w_h < f_h.top) {
						dom.css({
							'position': 'fixed',
							'top': data.m_t,
							'left': p_o.left,
							'width': p_w,
							'z-index': data.z_index,
						});
					} else {
						dom.css({
							'position': 'fixed',
							'top': -(w_h - f_h.top) - data.m_b,
							'left': p_o.left,
							'width': p_w,
							'z-index': data.z_index,
						});
					}
				} else if (wh < p_o.top) {
					dom.css({
						'position': '',
						'top': '',
						'left': '',
						'width': '',
						'z-index': '',
					});
				}
			});
		});
	}
})(jQuery);

function follow_scroll() {
	var isIE6 = !window.XMLHttpRequest;
	var scroll_top = parseInt($(document).scrollTop());
	if (!isIE6) {
		var header_top = 10;
	} else {
		var header_top = 0;
	}

	$(".imglist_dctie").each(function() {
		var leftNode = $(this).parent(".imglist_bigbox_r").parent(".imglist_bigbox").children(".imglist_bigbox_l");
		var leftNode_height = parseInt(leftNode.outerHeight());
		var leftNode_top = parseInt(leftNode.offset().top);
		var currentNode_height = parseInt($(this).outerHeight());
		var currentNode_top = parseInt($(this).offset().top);
		if (scroll_top >= leftNode_top - header_top && scroll_top < (leftNode_top + leftNode_height - currentNode_height - header_top))
		{
			if (!isIE6) {
				$(this).css({
					position: "fixed",
					top: header_top
				});
			}else {
				$(this).css({
					"position": "absolute",
					top: scroll_top + 10
				});
			}
		} else{
			if (scroll_top < leftNode_top) {
				$(this).css({
					"position": "static"
				});
			}
			if (scroll_top > (leftNode_top + leftNode_height - currentNode_height - header_top))
			{
				currentNode_top = (leftNode_height - currentNode_height + 45);
				$(this).css({
					"position": "absolute",
					"top": currentNode_top + "px"
				});
			}
		}
	});
}

window.onscroll = follow_scroll;

/*换一换*/

exchange = function() {
	$.post('/Index/rand_data',
	function(data) {
		if (data.status == 1) {
			var html = '<a href="' + data.data.href + '" rel="bookmark"><div class="rand_img imgxg"><img src="' + data.data.pic + '" alt="' + data.data.title + '"></div><div class="rand_title">' + data.data.title + '</div></a>';
			$('.rand_art').html(html);
			$(".rand_img img").load(function() {
				$('#rand').html('换一换');
			});
		} else {
			exchange()
		}
	});
}

login = function() {
	$('#reg_box').hide();
	$('#login_box').fadeIn(100);
}

logout=function(url,dom){
	$.post(U('Home/Base/logout'),{
		refurl:url
	}, function(data){
		if (data.status==1) {
			//window.location.reload();
			window.location.href = data.url;
		}
		layer.tips(data.info, dom, {
			guide: 0,
			time: 2
		}); 
	},"json");
	return false;
}

reg = function() {
	$('#login_box').hide();
	$('#reg_box').fadeIn(100);
}

wBox_close = function() {
	$('#reg_box').hide();
	$('#login_box').fadeOut(100);
}

//提交登陆
$("#loginform").submit(function() {
	var self = $(this);
	$.post(self.attr("action"), self.serialize(), function(data){
		if (data.status==1) {
			window.location.href = data.url;
		} else {
			$("#i--1").removeClass('error');
			$("#i--2").removeClass('error');
			$("#i-" + data.url).addClass('error').focus();
			$("#error_msg").show();
			$("#error_txt").text(data.info);
		}
	},"json");
	return false;
});

//第三方登陆
SLogin = function(type) {
	var relf = window.location.href;
	window.open('/User/slogin?type=' + type + '&ref=' + relf, 'newwindow', 'height=400,width=600,top=0,left=0,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no');
}

//检测登录
is_login = function() {
	if (ISLOGIN > 0) {
		return true;
	} else {
		login()
	}
}

//提交注册
$("#reform").submit(function() {
	var self = $(this);
	$.post(self.attr("action"), self.serialize(), function(data) {
		if (data.status) {
			window.location.href = data.url;
		} else {
			$("#rerror_txt").text(data.info);
			$("#rerror_msg").show();
			$(".reloadverify").click();
		}
	},"json");
	return false;
});

$(function() {
	var verifyimg = $(".verifyimg").attr("src");
	$(".reloadverify").click(function() {
		if (verifyimg.indexOf('?') > 0) {
			$(".verifyimg").attr("src", verifyimg + '&random=' + Math.random());
		} else {
			$(".verifyimg").attr("src", verifyimg.replace(/\?.*$/, '') + '?' + Math.random());
		}
	});
});

//顶踩操作
dingcai = function(type, id, dom) {
	$.post(U('Home/Data/dingCai'), {
		type: type,
		id: id
	},function(data) {
		//console.log(data);
		if (data.status == 1) {
			if (type == 'ding')
			{
				var r = parseInt($('#dingcai_ding_' + id).html());
				$('#dingcai_ding_' + id).text(r+1);
				$(dom).addClass('click');
				layer.tips("赞 +1 ", dom, {
					guide: 0,
					time: 2
				});
			} else {
				var r = parseInt($('#dingcai_cai_' + id).html());
				$('#dingcai_cai_' + id).text(r-1);
				$(dom).addClass('click');
				layer.tips("踩 +1 ", dom, {
					guide: 0,
					time: 2
				});
			}
		} else {
			layer.tips(data.info, dom, {
				guide: 0,
				time: 2
			});
		}
	}, 'json');
}

//收藏操作
love = function(id) {
	if (is_login()) {
		$.post('/Adds/love', {
			id: id
		},function(data) {
			if (data.status == 1) {
				$('#love_' + id).text(data.info.love);
			}
		});
	}
}

//获取评论界面
getcomment = function(id) {
	$.get(U('Home/Comment/showComment'), {
		id: id
	},
	function(data) {
		$('#showcomment_' + id).html(data);
	});
}

//获取顶级评论列表
getcomment_list = function(id) {
	$.get(U('Home/Comment/showTopList'), {
		id: id
	},function(data) {		
		if (data.count > 0) {
			if (data.count <= 5) {
				$('.get_more_f_' + id).hide();
			}
			PostCommentlist(data.data);
			var c = Number(data.count) - Number(5);
			$('.get_more_f_' + id).html("还剩" + c + "条评论，点击查看");
		} else {
			$('#pl-h-' + id).hide();
			$('#pl-l-' + id).hide();
			$('.get_more_f_' + id).hide();
		}
	},'json');
}

//获取二级评论列表
getrecomment_list = function(id, pid) {
	if (pid > 0) {
		var is_re = true;
	}
	$.get(U('Home/Comment/showSubList'), {
		id: id,
		pid: pid
	},function(data) {		
		if (data.count <= 3) {
			$('.get_more_s_' + pid).hide();
		}
		if (is_re) {
			var c = Number(data.count) - Number(3);
			$('.get_more_s_' + pid).html("还剩" + c + "条回复，点击查看");
			PostreCommentlist(data.data, pid)
		} else {
			PostCommentlist(data.data)
		}
	},'json');
}

//获取三级评论列表
getrerecomment_list = function(id, pid, ppid) {
	$.get(U('Home/Comment/showSubList'), {
		id: id,
		pid: pid,
		ppid: ppid
	},
	function(data) {
		PostrereCommentlist(data.data, pid)
	},'json');
}

//显示顶级评论列表
PostCommentlist = function(datas){
	var PostCommentlist_html='';
   $.each( datas, function(i, data){
  		$('#comment-show-ui-'+data.data_id).append('<li class="comt_item"><div class="comt_item_avatar"><img src="'+data.avatar+'" alt=""></div><div class="comt_item_body"><div class="comt_item_main" id="comt_item_main_'+data.id+'"><div class="comt_item_top"><div class="comt_item_name">'+data.nickname+'<'+data.area+'>'+'</div><div class="comt_item_time">'+data.post_time+'</div></div><div class="comt_item_con"><pre>'+data.content+'</pre></div><div class="comt_item_bom"><div class="comt_item_bombox"> <a href="javascript:;" onclick="re_report('+data.id+',this)">举报</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="re_praise('+data.id+',this)">赞 (<span>'+data.praise+'</span>)</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" id="replay_'+data.id+'_'+data.data_id+'" onclick="replay('+data.id+','+data.data_id+',this,\'show\','+data.uid+',\''+ data.nickname +'\')" "data-open"="close">回复 <!--(<span id="re_count_'+data.id+'">'+data.comment+'</span>)--></a></div></div></div></div></li>');
		if(data.comment>0){
			replay(data.id,data.data_id,$('#replay_'+data.id+'_'+data.data_id+''),'hide','\''+data.nickname+'\'');
			//getrecomment_list(data.data_id,data.id);
		}
	});	
    //$('#comment-show-ui').append(PostCommentlist_html);
}

//显示二级评论
PostreCommentlist = function(datas, id) {
	var PostreCommentlist_html = '';
	$.each(datas,function(i, data) {
		$('#comt_item_reply_show_' + id).append('<div class="comt_item_reply_wrap"><div class="comt_item_reply_avatar"><img src="' + data.avatar + '" alt=""></div><div class="comt_item_reply_body"><div class="comt_item_reply_top"><div class="comt_item_reply_name"><a href="javascript:;">' + data.nickname +'<'+data.area+'>'+ '</a> 回复: ' + data.pnickname + '</div><div class="comt_item_reply_time">' + data.post_time + '</div></div><div class="comt_item_reply_con"><pre>' + data.content+'wo de ' + '</pre></div><div class="comt_item_bom"><div class="comt_item_bombox"> <a href="javascript:;" onclick="re_report(' + data.id + ',this)">举报</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="re_praise(' + data.id + ',this)">赞 (<span>' + data.praise + '</span>)</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="replay_to(' + data.data_id + ',' + data.id + ',' + data.pid + ',' + data.uid + ',this)">回复 </a></div></div><div id="re_re_play_' + data.id + '" class="re_re_play"></div></div></div><div class="reply_hr"></div>');
		getrerecomment_list(data.data_id, data.id, data.pid);
	});
}

//显示三级评论列表组装
PostrereCommentlist = function(datas, id) {
	var PostrereCommentlist_html = '';
	$.each(datas,function(i, data) {
		var PostrereCommentlist_html_add = '<a href="javascript:;" onclick="re_report(' + data.id + ',this)">举报</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="re_praise(' + data.id + ',this)">赞 (<span>' + data.praise + '</span>)</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="replay_to(' + data.data_id + ',' + data.pid + ',' + data.ppid + ',' + data.uid + ',this)">回复 </a>';
		PostrereCommentlist_html += '<div class="reply_hr"></div><div class="comt_item_reply_wrap"><div class="comt_item_reply_avatar"><img src="' + data.avatar + '" alt=""></div><div class="comt_item_reply_body"><div class="comt_item_reply_top"><div class="comt_item_reply_name"><a href="javascript:;">' + data.nickname +'<'+data.area+'>'+ '</a> 回复: ' + data.pnickname +'<'+data.area+'>'+ '</div><div class="comt_item_reply_time">' + data.post_time + '</div></div><div class="comt_item_reply_con"><pre>' + data.content + '</pre></div><div class="comt_item_bom"><div class="comt_item_bombox">' + PostrereCommentlist_html_add + '</div></div></div></div>';
	});
	$('#re_re_play_' + id).append(PostrereCommentlist_html);
}

//获取更多顶级评论
getcomment_list_more = function(id, dom) {
	var p = $(dom).attr('data-page');
	$.get(U('Home/Comment/showTopList'), {
		id: id,
		p: p
	},function(data) {
		if (data.data == null) {
			$(dom).html('没有了！！');
		} else {
			var c = Number(data.count) - (Number(5) * Number(p));
			if (c > 0) {
				$(dom).html("还剩" + c + "条评论，点击查看");
			} else {
				$(dom).html('没有了！！');
			}
			PostCommentlist(data.data)
			$(dom).attr('data-page', Number(p) + 1);
		}
	},"json");
}

//获取更多二级评论
getrecomment_list_more = function(id, pid, dom) {
	if (pid > 0) {
		var is_re = true;
	}
	var p = $(dom).attr('data-page');
	$.get(U('Home/Comment/showSubList'), {
		id: id,
		pid: pid,
		p: p
	},
	function(data) {
		if (data.data == null) {
			$(dom).html('没有了！！');
		} else {
			var c = Number(data.count) - (Number(3) * Number(p));
			if (c > 0) {
				$(dom).html("还剩" + c + "条评论，点击查看");
			} else {
				$(dom).html('没有了！！');
			}
			PostreCommentlist(data.data, pid);
			$(dom).attr('data-page', Number(p) + 1);
		}
	},'json');
}

//评论
PostComment = function(dom) {
	var id = $(dom).attr('data-id');  // 主键
	var pid = $(dom).attr('data-pid');  // 父节点
	var puid = $(dom).attr('data-puid');
	var input = $(dom).attr('data-content');  // textarea id
	var content = $('#' + input).val();
	if (content == '') {
		layer.tips('请输入评论内容', dom, {
			guide: 0,
			time: 2
		});
		$('#' + input).addClass('input-error').focus();
		return false;
	}
	if (pid > 0) {
		if (!is_login()) {
			return false;
		}
	}
	var ll = layer.load('评论提交中...');
	$.post(U('Home/Comment/postComment'), {
			id: id,
			pid: pid,
			puid: puid,
			content: content
	},function(data) {
		if (data.status == 1) {
			layer.close(ll)
			//layer.msg('评论成功', 2, 1);
			layer.tips(data.info, dom, {
				guide: 0,
				time: 2
			});
			$('#' + input).val('');
			$('#pl-h-' + id).show();
			$('#pl-l-' + id).show();
			$('#replybox_' + pid).hide();
			$('#pinglun_sub_' + pid).hide();
			PostComment_ok(data.data);  // 暂时屏蔽 2014-09-30
			setTimeout("is_login()", 3000);
		} else {
			layer.close(ll)
			layer.tips(data.info, dom, {
				guide: 0,
				time: 2
			});
		}
	}, 'json');
}

//评论成功
PostComment_ok = function(data) {
	if (data.pid == 0) {
		var html = '<li class="comt_item"><div class="comt_item_avatar"><img src="'+data.avatar+'" alt=""></div><div class="comt_item_body"><div class="comt_item_main" id="comt_item_main_'+data.id+'"><div class="comt_item_top"><div class="comt_item_name">'+data.nickname+'<'+data.area+'>'+'</div><div class="comt_item_time">'+data.post_time+'</div></div><div class="comt_item_con"><pre>'+data.content+'</pre></div><div class="comt_item_bom"><div class="comt_item_bombox"> <a href="javascript:;" onclick="re_report('+data.id+',this)">举报</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="re_praise('+data.id+',this)">赞 (<span>'+data.praise +'</span>)</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" id="replay_'+data.id+'_'+data.data_id+'" onclick="replay('+data.id+','+data.data_id+',this,\'show\','+ data.uid +',\''+ data.nickname +'\')" "data-open"="close">回复 <!--(<span id="re_count_'+data.id+'">'+data.comment+'</span>)--></a></div></div></div></div></li>';	
		$('#comment-show-ui-' + data.data_id).append(html);
	} else if (data.pid > 0 && data.ppid == 0) {
		var html = '<div class="comt_item_reply_wrap"><div class="comt_item_reply_avatar"><img src="' + data.avatar + '" alt=""></div><div class="comt_item_reply_body"><div class="comt_item_reply_top"><div class="comt_item_reply_name"><a href="javascript:;">' + data.nickname +'<'+data.area+'>'+ '</a> 回复: ' + data.pnickname + '</div><div class="comt_item_reply_time">' + data.post_time + '</div></div><div class="comt_item_reply_con"><pre>' + data.content + '</pre></div><div class="comt_item_bom"><div class="comt_item_bombox"> <a href="javascript:;" onclick="re_report(' + data.id + ',this)">举报</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="re_praise(' + data.id + ',this)">赞 (<span>' + data.praise + '</span>)</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="replay_to(' + data.data_id + ',' + data.id + ',' + data.pid + ',' + data.uid + ',this)">回复 </a></div></div><div id="re_re_play_' + data.id + '" class="re_re_play"></div></div></div><div class="reply_hr"></div>';
		var re_count = $('#re_count_' + data.pid).html();
		var re_count_num = Number(re_count) + Number(1);
		$('#re_count_' + data.pid).html(re_count_num);
		$('#comt_item_reply_show_' + data.pid).append(html);
	} else if (data.pid > 0 && data.ppid > 0) {
		var PostrereCommentlist_html = '<div class="reply_hr"></div><div class="comt_item_reply_wrap"><div class="comt_item_reply_avatar"><img src="' + data.avatar + '" alt=""></div><div class="comt_item_reply_body"><div class="comt_item_reply_top"><div class="comt_item_reply_name"><a href="javascript:;">' + data.nickname +'<'+data.area+'>'+ '</a> 回复: </div><div class="comt_item_reply_time">' + data.post_time + '</div></div><div class="comt_item_reply_con"><pre>' + data.content + '</pre></div><div class="comt_item_bom"><div class="comt_item_bombox"> <a href="javascript:;" onclick="re_report(' + data.id + ',this)">举报</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="re_praise(' + data.id + ',this)">赞 (<span>' + data.praise + '</span>)</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="replay_to(' + data.data_id + ',' + data.pid + ',' + data.ppid + ',' + data.uid + ',this)">回复 </a></div></div></div></div>';
		$('#re_re_play_' + data.pid).append(PostrereCommentlist_html);

	}

}

//回复操作
replay = function(id, data_id, dom, status, uid,name) {
	var is_open = $(dom).attr('data-open');
	var box_open = $('#replybox_' + id).attr('data-open');
	if (box_open == 'close') {
		$('#replybox_' + id).show().attr('data-open', 'open');
		$('#replybox_' + id).find('textarea').attr('placeholder', '回复 ' + name + ' :').focus();
		return;
	}
	if (is_open == 'open') {
		$('#comt_item_reply_' + id).slideUp(100);
		$('#comt_reply_arrow_' + id).hide();
		$(dom).attr('data-open', 'close');
		// $('#pinglun_sub_'+doc_id).show();
	} else if (is_open == 'close') {
		$('#comt_item_reply_' + id).slideDown(100);
		$('#comt_reply_arrow_' + id).show();
		$('#replybox_' + id).show();
		$(dom).attr('data-open', 'open');
		// $('#pinglun_sub_'+doc_id).hide();
	} else {
		$.get(U('Home/Comment/replayShow'), {
			id: id,
			data_id: data_id,
			uid: uid,
			name:name
		},function(data) {
			$(dom).after('<div class="comt_reply_arrow" id="comt_reply_arrow_' + id + '"><em></em><i></i></div>').attr('data-open', 'open');
			$('#comt_item_main_' + id).after(data);
			//$('#pinglun_sub_'+doc_id).hide();
			if (status == 'hide') {
				$('#replybox_' + id).hide().attr('data-open', 'close');
			}
		});
	}
}

//回复评论再评论
replay_to = function(data_id, pid, ppid, puid, dom) {
	if (is_login()) {
		 var ii = layer.prompt({
			title: '回复',
			type: 3,
		},function(val) {
			$.post(U('Home/Comment/postComment'), {
				id: data_id,
				pid: pid,
				ppid: ppid,
				puid: puid,
				content: val
			},function(data) {
				if (data.status == 1) {
					PostComment_ok(data.data);	
				}else{
					console.info(data);
				}
				layer.close(ii);		
			},'json');
		});
	}
	return false;
}

//回复框 失去焦点事件
re_onfocus = function(dom) {
	//$(dom).parent().hide().attr('data-open','close');
}

//赞评论
re_praise = function(id, dom) {
	var zan_old_num = $(dom).find('span').html();
	$.post(U('Home/Comment/replayPraise'), {
		id: id
	},
	function(data) {
		if (data.status == 1) {
			$(dom).find('span').html(Number(zan_old_num) + 1);
			layer.tips(data.info, dom, {
				guide: 0,
				time: 2
			});
		} else {
			layer.tips(data.info, dom, {
				guide: 0,
				time: 2
			});
		}
	},'json');
}

//举报评论
re_report = function(id, dom) {
	if (is_login()) {
		layer.prompt({
			title: '请填写举报理由，并确认',
			type: 3
		},function(val) {
			$.post(U('Home/Comment/replayReport'), {
				id: id,
				val: val
			},
			function(data) {
				if (data.status == 1) {
					$(dom).text('已举报');
					layer.tips(data.info, dom, {
						guide: 0,
						time: 2
					});
				} else {
					$(dom).text('已举报');
					layer.tips(data.info, dom, {
						guide: 0,
						time: 2
					});
				}
			},'json');
		});
	}
}

//快捷投稿标签
$('#woxiaola_key').focus(function() {

	$('#woxiaola_post_key').slideDown('fast');

});

post_add_tag = function(dom) {
	var name = $(dom).html();
	var val = $('#woxiaola_key').val();
	var arr = new Array();
	arr = val.split(',');
	if (arr.length >= 3) {
		layer.tips("最多只能有三个标签！", dom, {
			guide: 0,
			time: 2
		});
		return false;
	}

	if (val == '') {
		$('#woxiaola_key').val(name);
	} else {
		$('#woxiaola_key').val(val + ',' + name);
	}
	$(dom).addClass('click').attr('onclick', '');
}

//快捷投稿
post_woxiaola = function(dom) {
	var title = $('#woxiaoal_title').val();
	var content = $('#woxiaola_content').val();
	var key = $('#woxiaola_key').val();
	var pic = $("#woxiaola_post_img").html();
	var arr = new Array();
	arr = key.split(',');
	if (arr.length > 3) {
		layer.tips("最多只能有三个标签！", $('#woxiaola_key'), {
			guide: 0,
			time: 2
		});
		return false;
	}
	if (pic != '') {
		var c = content + pic;
	} else {
		var c = content;
	}
	if (c == '') {
		layer.msg('怎么可以没有内容！', 2, 0);
		$('#woxiaola_content').focus();
	} else if (title == '') {
		$('#woxiaoal_title').focus();
		layer.msg('标题忘记写啦！', 2, 0);
	} else {
		if (is_login) {
			$.ajax({
				url: '/Member/tougao',
				type: 'POST',
				data: {
					category_id: 45,
					key: key,
					title: title,
					content: c,
					model_id: 2,
					type: 2,
					pid: 0,
					name: ''
				},success: function(d) {
					if (d.status == 1) {
						$('#woxiaoal_title').val('');
						$('#woxiaola_content').val('');
						$('#woxiaola_key').val('');
						$("#woxiaola_post_img").html('').hide();
						$('#woxiaola_post_key').find('a').removeClass('click').attr('onclick', 'post_add_tag(this)');
						layer.msg('发布成功！', 2, 1);
					} else {
						layer.msg('发布失败！', 2, 0);
					}
				}
			});
		}
	}
	$(dom).html();
}

//添加表情
grin = function(val, dom) {
	var t = $(dom).parent().attr('data-content');
	$('#' + t).insertContent(val);
}

$(function() {
	/*  在textarea处插入文本--Start */
	(function($) {
		$.fn.extend({insertContent: function(myValue, t) {
				var $t = $(this)[0];
				if (document.selection) { // ie  
					this.focus();
					var sel = document.selection.createRange();
					sel.text = myValue;
					this.focus();
					sel.moveStart('character', -l);
					var wee = sel.text.length;
					if (arguments.length == 2) {
						var l = $t.value.length;
						sel.moveEnd("character", wee + t);
						t <= 0 ? sel.moveStart("character", wee - 2 * t - myValue.length) : sel.moveStart("character", wee - t - myValue.length);
						sel.select();
					}
				} else if ($t.selectionStart || $t.selectionStart == '0') {
					var startPos = $t.selectionStart;
					var endPos = $t.selectionEnd;
					var scrollTop = $t.scrollTop;
					$t.value = $t.value.substring(0, startPos) + myValue + $t.value.substring(endPos,$t.value.length);
					this.focus();
					$t.selectionStart = startPos + myValue.length;
					$t.selectionEnd = startPos + myValue.length;
					$t.scrollTop = scrollTop;
					if (arguments.length == 2) {
						$t.setSelectionRange(startPos - t,$t.selectionEnd + t);
						this.focus();
					}
				} else {
					this.value += myValue;
					this.focus();
				}
			}
		})
	})(jQuery);
	/* 在textarea处插入文本--Ending */
});
/**
 * 简化url 生成pathinfo模式字符串
 * @param string url 'Home/Action/method' 形式
 * @param string params 参数
 */
function U(url, params) {
	if(url.lastIndexOf('/') == url.length-1) {
		url = url.substr(0, url.length-1);
	}
	
	var siteUrl = ROOT + '/' + url;
	if("undefined" != typeof params) {
		var paramArr = null;
		if(params.indexOf('&') > 0) {
			paramArr = params.split('&');
		} else {
			paramArr = [params];
		}
		var tmp = null;
		for(var i=0; i<paramArr.length; i++) {
			tmp = paramArr[i].split('=');
			siteUrl += '/' + tmp[0] + '/' + tmp[1];
		}
	}
	
	return siteUrl;
}

function setCookie(c_name, value, expiredays) {

	var exdate = new Date()

		exdate.setDate(exdate.getDate() + expiredays);

	document.cookie = c_name + "=" + escape(value) +

		((expiredays == null) ? "" : ";expires=" + exdate.toGMTString());

}

function getCookie(c_name) {

	if (document.cookie.length > 0) {

		c_start = document.cookie.indexOf(c_name + "=")

			if (c_start != -1) {

				c_start = c_start + c_name.length + 1

					c_end = document.cookie.indexOf(";", c_start)

					if (c_end == -1)

						c_end = document.cookie.length

							return unescape(document.cookie.substring(c_start, c_end))

			}

	}

	return ""

}



// 前台js

function mySubstr(str, len){

    str = str.replace(/(^\s*)|(\s*$)/g, "");

    var newLength = 0; 

    var newStr = "";

    var chineseRegex = /[^\x00-\xff]/g;

    var singleChar = "";

    var strLength = str.replace(chineseRegex,"**").length;

    for(var i = 0;i < strLength;i++){

        singleChar = str.substr(i,1);

        if(singleChar.match(chineseRegex) != null){

            newLength += 2;

        }else{

            newLength++;

        }

        if(newLength > len){

            break;

        }

        newStr += singleChar;

    }

    if(strLength > len){

        newStr += "..";

    }

    return newStr;

}



/*

$("#guanzhu").live("click", guanZhuJingBi);

// 关注

function guanZhuJingBi() {

	$.ajax({

		type : 'POST',

		url : 'Public/ifGuanZhu',

		data : {

		    'openid' : $('#openid').val()

		},

		dataType : 'json',

		success : function (data) {

			if (data.status == 1) {

				WED114.msgbox.show(data.msg, 4, 1500);

				$('#all_jinbi_num').html(data.guanzhunum);

			} else {

			    //WED114.msgbox.show(data.msg, 5, 1500);

			}

		}

	});

}



// 领取

function lingQuJingBi() {

	$.ajax({

		type : 'POST',

		url : '/index.php?m=Public&a=todayjinbi',

		data : {

			'openid' : $('#openid').val()

		},

		success : function (data) {

			if (data.status == 1) {

				WED114.msgbox.show(data.msg, 4, 1500);

				$('#all_jinbi_num').html(data.num);

			} else {

				//WED114.msgbox.show(data.msg, 5, 1500);

			}

		},

		dataType : 'json'

	});

}

*/

// 邀请

function yaoQingHaoYou() {

	fusion2.dialog.invite

	({

		msg : "小伙伴。。。赶快来看看吧，笑死我了~",

		/*img: "",*/

		context : "点击进入",

		onSuccess : function (ret) {

			$.ajax({

				type : 'POST',

				url : '/index.php?m=Public&a=yaoqingjingbi',

				data : {

					'openid' : $('#openid').val()

				},

				success : function (data) {

				    /*

					if (data.status == 1) {

						$('#all_jinbi_num').html(data.num);

						WED114.msgbox.show(data.msg, 4, 1500);

					} else {

						WED114.msgbox.show(data.msg, 5, 1500);

					}

					*/

				},

				dataType : 'json'

			});

		},

		onCancel : function () {},

		onClose : function () {}

	});

	return false;

}



// 分享

function share(id) {

	sendStory(id, 'sharenum');

}



function sendStory(id, classname) {

	var title = $('#article_title_' + id).html();

	title = mySubstr(title, 48);

	var img = $('#postarticlecontent_' + id+' img').attr('src');

	fusion2.dialog.sendStory

	({

		title : title,

		img : img,

		summary : "。。。PS:<<点击左边图片查看大图",

		msg : title + "小伙伴。。。赶快来看看吧，笑死我了~",

		button : "进入应用",

		source : "ref=story&act=default",

		context : "send-story",

		onShown : function (opt) {},

		onSuccess : function (opt) {



		},

		onCancel : function (opt) {},

		onClose : function (opt) {}

	});

}



// 收藏

function postArticle(id) {



	var content = $('#postarticlecontent_'+id).html();

	var myDate = new Date();

	var fulldate = new Date();

	var year = fulldate.getFullYear();

	var month = fulldate.getMonth() + 1;

	var day = fulldate.getDate();

	var date = year + "年" + month + "月" + day + "日";

	fusion2.dialog.saveBlog

	({

		title : "精彩图集" + "(" + date + ")" + "--每天十个精彩分享",

		content : content,

		context : "",

		onSuccess : function (opt) {


		},

		onCancel : function (opt) {},

		onClose : function (opt) {}

	})

	return false;

}

/*

// 兑换

function duiHuanJingBi(id) {



	$.ajax({

		type : 'POST',

		url : '/index.php?m=Public&a=duihuan',

		data : {

			'openid' : $('#openid').val(),

			'id' : id

		},

		success : function (data) {

			if (data.status == 1) {

				$('#all_jinbi_num').html(data.num);

				window.location.href = data.url;

			} else {

				//WED114.msgbox.show(data.msg, 5, 1500);

			}

		},

		dataType : 'json'

	});

}

*/
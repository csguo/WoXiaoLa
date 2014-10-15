/*------ pop start --------*/

setCookie('show', 0);

//遮罩高度

function maskHeight() {

	$("#mask").height($(document).height());

	$("#mask iframe").height($(document).height());

}



// 弹出

function tanchuKuang(html) {

    

	// 判断是否有弹出层

	var show = getCookie('show');

	if (show == 1) {

	    return false;

	}

	

	$("#pop-content").html(html);

	fusion2.canvas.getClientRect({

		onSuccess : function (rect) {

			/* do sth. */

			var top1 = rect.top;

			var left1 = rect.left;

			var bottom1 = rect.bottom;

			var right1 = rect.right;

			$("#pop").css("top", parseInt(top1) + (parseInt(bottom1) - parseInt(top1) - parseInt($("#pop-content").children("div").css("height"))) / 2);

			$("#pop").css("width", parseInt($("#pop-content").children("div").css("width")));

			$("#pop").css("left", parseInt(left1) + (parseInt(right1) - parseInt(left1) - parseInt($("#pop-content").children("div").css("width"))) / 2);

		}

	});

	$("#mask").show();

	maskHeight();

	$("#pop").show();

	fusion2.canvas.getClientRect({

		onSuccess : function (rect) {

			var top1 = rect.top;

			var bottom1 = rect.bottom;

			$("#pop").css("top", parseInt(top1) + (parseInt(bottom1) - parseInt(top1) - parseInt($("#pop-content").children("div").height())) / 2);

		}

	});

	

	// 设置已经显示

	setCookie('show', 1);

	

	return false;

}



// 跟随

fusion2.iface.updateClientRect(function (rect) {

	var top1 = rect.top;

	var left1 = rect.left;

	var bottom1 = rect.bottom;

	var right1 = rect.right;

	var _top = parseInt(top1) + (parseInt(bottom1) - parseInt(top1) - parseInt($("#pop-content").children("div").css("height"))) / 2;

	$("#pop").css("top", (_top > 0) ? _top : 0);

	$("#pop").css("width", parseInt($("#pop-content").children("div").css("width")));

});



// 关闭

function tanchuKuangClose() {

	$("#pop-content").html("");

	$("#mask").hide();

	$("#pop").hide();

	

	setCookie('show', 0);

	

	var guanzhu_show = getCookie('guanzhu_show');

	if (guanzhu_show != 1) {

		if (guanzhu == 1) {

			// 弹出关注

			setTimeout('guanZhuTankuang()', 5000);

		}

	}

    /*

	//未显示过应用社交广告，30秒后展示

	if ((getCookie('show_publicize') != 1)) {

		setTimeout(function () {

			fusion2.dialog.showActivity();

		}, 15000);

		setCookie('show_publicize', 1);

	}

    */

}



// 关闭弹出层

$(".con_close").live("click", tanchuKuangClose);



// 关注

function guanZhuTankuang() {

    

	// 显示过关注

	setCookie('guanzhu_show', 1);

	

	var guanZhuTankuangHtml = '<div class="pop-box-guanzhu">' +

		'<a id="guanzhu" class="ico con_close" href="javascript:void(0);"></a>' +
		'<a id="xiazai" target="_blank" class="xiazai" href="http://xh.huakang.com/download/ewm.html"></a>' +
		'<div class="approve">' +

		'<p class="attention">关注腾讯官方认证空间</p>' +

		'<p class="look">查看顶级爆笑图，挑战你的幽默极限！</p>' +

		'<i class="ico ico_corner"></i>' +

		'</div> ' +

		'<div class="btn">' + 


		'<iframe src="http://open.qzone.qq.com/like?url=http%3A%2F%2Fuser.qzone.qq.com%2F2818851377&type=button_num&width=400&height=30&style=3" allowtransparency="true" scrolling="no" border="0" frameborder="0" id="guanzhuframe_id" style="width:150px; height:50px;border:none;overflow:hidden;"></iframe>' +

		'</div>';

	tanchuKuang(guanZhuTankuangHtml);

}



// 兑换

function duiHuanTanKuang() {

    var duihuantankuangHtml = 

	                      '<div class="pop-box-duihuan">' +

						  '<a class="ico con_close" href="javascript:void(0);"></a>' +

						  '<div class="title">金币兑换</div>' +

						  '<div class="btn">' +

						  '<a class="first" onclick="duiHuanJingBi(\'1\');"></a>' +

						  '<a class="second" onclick="duiHuanJingBi(\'2\');"></a>' +

						  '<a class="third" onclick="duiHuanJingBi(\'3\');"></a>' +

						  '</div>' +

						  '</div>';

    tanchuKuang(duihuantankuangHtml);

}



// 弹出关注

setTimeout('guanZhuTankuang()', 1500000000);



// 弹出兑换

//$('#duihuan').live('click', duiHuanTanKuang);
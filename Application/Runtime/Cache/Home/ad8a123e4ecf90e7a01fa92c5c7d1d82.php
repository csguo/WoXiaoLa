<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  
  <head>
    <meta charset="utf-8">
<title>
	<?php echo ($title); ?>
</title>
<meta name="author" content="">
<link href="/web/Public/Home/css/global.css" rel="stylesheet" type="text/css">
<link href="/web/Public/Home/css/channel.css" rel="stylesheet" type="text/css">
<link href="/web/Public/Home/css/style_new.css" rel="stylesheet" type="text/css">
<link href="/web/Public/Home/css/bdsstyle.css" rel="stylesheet" type="text/css">

<link type="text/css" rel="stylesheet" href="/web/Public/static/layer/skin/layer.css">
<link type="text/css" rel="stylesheet" href="/web/Public/static/layer/skin/layer.ext.css">
<script type="text/javascript" src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
	var ROOT = '/web',
	APP = '/web/index.php',
	ISLOGIN = '<?php echo ($uid); ?>';
</script>

  </head>
  
  <body id="index">
    <!-- 头部 -->
    <div class="header">
	<div class="headerBg">
		<div class="headerTop"> 
			<a href="/" class="logo fl"></a>
			<ul class="nav fl">
	        <li class="navHasub navHot"><a href="<?php echo U('Index/index');?>" target="_self"><span>首页</span></a></li>
	        <li class="navHasub navHot"><a href="<?php echo U('Image/index');?>" target="_self"><span>搞笑图片</span></a></li>
	        <li class="navHasub navHot"><a href="<?php echo U('Index/index');?>" target="_self"><span>搞笑段子</span></a></li>
	        <li class="navHasub navHot"><a href="<?php echo U('Index/index');?>" target="_self"><span>内涵漫画</span></a></li>
			</ul>
			<div class="top_right">
	      		<?php if($uname != ''): ?><a href="">test</a>|<a href="javascript:;" onclick="logout(/web/index.php/Home/Index/Details/id/3,this)">退出</a></div>
				<?php else: ?>
					<a href="javascript:;" onclick="login()">登陆</a>|<a href="javascript:;" onclick="reg()">注册</a><?php endif; ?>
			</div>
		</div>
	</div>
</div>
    <div class="container mt20">
      <div class="content">
        <div class="colMain">
          <div class="colMainBd mainUnTag mainUnTagShen individualPost">
            <div class="untagTit">
              <h1> <?php echo ($val['title']); ?> </h1>
            </div>
            <div class="postContainer unTagImgs pb15">
              <div class="sectionleft sectionright ">
                <div class="unTagImgsCon" style=" line-height:2.5em; margin-bottom:25px; font-size:14px;">
                  <?php echo ($val['content']); ?>
                </div>
              </div>
            </div>
            <div class="adbox" style="width:468px; margin:0 auto;">
            </div>
            <div class="pageNext">
              <a href="" title="下一条笑话" class="pageNextBtn"> 下一条笑话</a>
            </div>
            <div style="padding:20px 150px;">
              <!-- JiaThis Button BEGIN -->
              <div class="jiathis_style_32x32">
                <a class="jiathis_button_qzone" title="分享到QQ空间">
                  <span class="jiathis_txt jtico jtico_qzone"></span>
                </a>
                <a class="jiathis_button_tsina" title="分享到新浪微博">
                  <span class="jiathis_txt jtico jtico_tsina"></span>
                </a>
                <a class="jiathis_button_tqq" title="分享到腾讯微博">
                  <span class="jiathis_txt jtico jtico_tqq"></span>
                </a>
                <a class="jiathis_button_renren" title="分享到人人网">
                  <span class="jiathis_txt jtico jtico_renren"></span>
                </a>
                <a class="jiathis_button_kaixin001" title="分享到开心网">
                  <span class="jiathis_txt jtico jtico_kaixin001"></span>
                </a>
                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jiathis_separator jtico jtico_jiathis" target="_blank">
                </a>
                <a class="jiathis_counter_style">
                  <span class="jiathis_button_expanded jiathis_counter jiathis_bubble_style" id="jiathis_counter_15" title="累计分享2次">2</span>
                </a>
              </div>
              <script type="text/javascript">
                var jiathis_config = {
                  url: "http://wxl.qh84.com/2921.html",
                  summary: "哈哈哈哈哈",
                  title: "老兄，老兄，这可使不得，使不得呀-我笑了 #http://wxl.qh84.com/Uploads/Picture/2014-08-18/53f16f29bbd9f.jpg#",
                  shortUrl: false,
                  hideMore: false
                }
              </script>
              <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8">
              </script>
              <!-- JiaThis Button END -->
            </div>
            <div class="adbox" style="width:500px; margin:0 auto 10px;"></div>
            <div class="afterbar" style="height:28px;">
              <div class="vote">
                <ul class="itemVoteContainer">
                  <li>
                    <a onclick="dingcai('ding','<?php echo ($val['id']); ?>',this)" href="javascript:void(0);"class="itemVoteUp" title="顶这个热门笑话">
                      <span class="icon"></span>
                    </a>
                  </li>
                  <li>
                    <h3 class="itemLoveCount" id="dingcai_ding_<?php echo ($val['id']); ?>"><?php echo ($val['ding']); ?></h3>
                  </li>
                  <li>
                    <a onclick="dingcai('cai','<?php echo ($val['id']); ?>',this)" href="javascript:void(0);" class="itemVoteDown" title="踩这个热门笑话">
                      <span class="icon"></span>
                    </a>
                  </li>
                  <li>
                    <h3 class="itemLoveCount" id="dingcai_cai_<?php echo ($val['id']); ?>"><?php echo ($val['cai']); ?></h3>
                  </li>
                  <!-- 点击数字变色：在H3后追加类，赞：good,踩：meh-->
                </ul>
              </div>
              <div class="shareVline fl"></div>
              <div class="sideViews" style="">
                <span class="sideCommentNub fr">
                  <a href="javascript:void(0);" id="sideCommentNub"></a>
                  <a id="sideCommentNub" href="javascript:void(0);">1</a>
                </span>
                <span class="sideComment fr" title="笑话评论次数"></span>
                <div class="shareVline fr"></div>
                <span class="sideViewNub fr"><?php echo ($val['view_count']); ?></span>
                <span class="sideView fr" title="笑话浏览次数"></span>
                <div class="shareVline fr"></div>
                <span class="sideTips fr"><a><?php echo ($val['tags']); ?></a></span>
                <span class="sideTipsIcon fr" title="<?php echo ($val['tags']); ?>"></span>

              </div>
            </div>
          </div>
          <div class="ad630"></div>
          <style>
            .pinglun_box{ width:100%;} .Pj_Add_Input{ width:496px;} .ds-toolbar-buttons{
            left:492px;} .Pj_Add_Input_reply{ width:435px;} .ds-toolbar-buttons-re{
            left:432px;}
          </style>
          <script type="text/javascript">
            $(document).ready(function() {
              getcomment('<?php echo ($val['id']); ?>');
            });
          </script>
          <div id="showcomment_<?php echo ($val['id']); ?>" style="margin-top:10px;"></div>
          <div class="pinglun_box mb10"></div>
          <div class="ad630"></div>
          <div class="bottom_one">
            <!--model1-->
            <div class="bottom_nav bottom_nav_a"></div>
            <div class="bottom_list">
              <ul>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53eb00cc65fcd_138x100.jpg" width="138"
                    height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href=""> 这个是丰胸吗？</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53eb006f57483_138x100.jpg" width="138"
                    height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">这样才凉爽</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53eaffc4bcfb0_138x100.jpg" width="138"
                    height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">我们可是两厢情愿</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53eaff49e1454_138x100.jpg" width="138"
                    height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href=""> 我一个人承受不来</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53eae1213dac5_138x100.jpg" width="138"
                    height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">妹子需要帮忙吗 </a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53eae17925c13_138x100.jpg" width="138"
                    height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">我帮你解啊？</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53eae09026f6c_138x100.jpg" width="138"
                    height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href=""> 这个酒吧,不敢来</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53eadfdc8229d_138x100.jpg" width="138"
                    height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">海涛口味一直不轻 </a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="bottom_list_dy">
            </div>
            <div class="bottom_list_link">
              <ul></ul>
            </div>
            <div class="bottom_list_dy"> </div>
            <!--model2-->
            <div class="bottom_nav bottom_nav_b bottom_nav_top"> </div>
            <div class="bottom_list">
              <ul>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e09fc46af56_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">内裤里面有什么</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e09f4938c74_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">我让你帮我撸一撸</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e09afcacf3f_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">我老婆出轨了</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e097d0515f7_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">老师我想上厕所 </a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="bottom_list_dy"></div>
            <div class="bottom_list_link">
              <ul></ul>
            </div>
            <div class="bottom_list_dy"></div>
            <!--model3-->
            <div class="bottom_nav bottom_nav_c bottom_nav_top"></div>
            <div class="bottom_list">
              <ul>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e092eda77bd_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href=""> 这是什么玩意儿</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e092cdc3d05_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">一辈子没失误</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e0929291a33_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">不止的吸引人</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e09264258e7_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">意外的缩紧</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e09219299f3_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href=""> 青出于蓝而胜于蓝 </a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e091d87c794_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href=""> 喜欢选美小姐</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e09160789f8_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href=""> 突然的造访</a>
                  </div>
                </li>
                <li class="bottom_list_right">
                  <a href="">
                    <img src="/web/Uploads/Picture/2014-08-27/53e090f684a8c_138x100.jpg" width="138" height="100">
                  </a>
                  <div class="bottom_list_title">
                    <a href="">问号码</a>
                  </div>
                </li>
              </ul>
            </div>
            <div class="bottom_list_dy"> </div>
            <div class="bottom_list_link">
              <ul></ul>
            </div>
            <div class="bottom_list_dy"></div>
          </div>
          <div class="ad630"></div>
        </div>
          <!-- 右侧 -->
          <div class="colExtra">
  <!--<div class="adbox"><script>index_1();</script></div>-->
  <div class="cebian_box">
    <div class="guanzhu_box">
      <p class="tit_font">关注我们</p>
      <span class="fl">
        <img src="/web/Public/Home/images/img_033.png" width="144" height="144">
      </span>
      <div class="fr guanzhu_box_list">
        <div class="guanzhu_list">
          <span>
            <img src="/web/Public/Home/images/img_05.png" width="45" height="45">
          </span>
          <a target="_blank" href="http://weibo.com/p/1005055242322769" class="guanzhu_text fr">新浪微博</a>
        </div>
        <div class="clearcyh"></div>
        <div class="guanzhu_list">
          <span>
            <img src="/web/Public/Home/images/img_08.png" width="45" height="45">
          </span>
          <a href="http://t.qq.com/weibozxyl1807" class="guanzhu_text fr">腾讯微博</a>
        </div>
        <div class="clearcyh"></div>
        <div class="guanzhu_list">
          <span>
            <img src="/web/Public/Home/images/img_10.png" width="45" height="44">
          </span>
          <a class="guanzhu_text fr">
            <iframe src="http://open.qzone.qq.com/like?url=http%3A%2F%2Fuser.qzone.qq.com%2F2818851377&amp;type=button&amp;width=400&amp;height=30&amp;style=3"
            allowtransparency="true" scrolling="no" border="0" frameborder="0" style="width:100px;height:30px;border:none;overflow:hidden; margin-left:22px; margin-top:12px;">
            </iframe>
          </a>
        </div>
        <div class="clearcyh"></div>
      </div>
      <div class="clearcyh"></div>
      <div></div>
    </div>
    <div class="kuaisu_xiaoliao_box">
      <div class="woxiaola_post_box">
        <input class="woxiaola_title" id="woxiaoal_title" placeholder="这里写标题..">
        <div class="woxiaola_post_hr"></div>
        <textarea placeholder="过程很精彩，这里写内容.." id="woxiaola_content" class="kuaisu_xiaoliao_wenben"
        name="kuaisu_xiaoliao" cols="" rows="">
        </textarea>
        <div class="woxiaola_post_hr"></div>
        <input class="woxiaola_title" id="woxiaola_key" placeholder="标签：多个用 , 隔开">
      </div>
      <div class="woxiaola_post_key" id="woxiaola_post_key">
        <a href="javascript:;" onclick="post_add_tag(this)">囧人糗事</a>
        <a href="javascript:;" onclick="post_add_tag(this)">搞笑图片</a>
        <a href="javascript:;" onclick="post_add_tag(this)">成人笑话</a>
        <a href="javascript:;" onclick="post_add_tag(this)">动物萌货</a>
        <a href="javascript:;" onclick="post_add_tag(this)">内涵</a>
        <a href="javascript:;" onclick="post_add_tag(this)">邪恶漫画</a>
        <a href="javascript:;" onclick="post_add_tag(this)">GIF图</a>
      </div>
      <div class="woxiaola_post_img" id="woxiaola_post_img"></div>
      <a class="kuaisu_fabu" href="javascript:;" onclick="post_woxiaola(this)">发布</a>
      <div class="shangchuan_tupian fl" onclick="login()">
        <div></div>
      </div>
      <div class="clearcyh"></div>
    </div>
    <script type="text/javascript" src="/web/Public/static/uploadify/jquery.uploadify.min.js"></script>
    <script type="text/javascript">
      $("#upload_picture_woxiaola").uploadify({
        "height": 29,
        "swf": "/web/Public/static/uploadify/uploadify.swf",
        "fileObjName": "imgFile",
        "buttonText": "",
        "uploader": "/Addons/execute/_addons/EditorForAdmin/_controller/Upload/_action/ke_upimg.html?dir=image",
        "width": 94,
        'removeTimeout': 1,
        'fileTypeExts': '*.jpg; *.png; *.gif;',
        "onUploadSuccess": uploadPicture,
        'onFallback': function() {
          alert('未检测到兼容版本的Flash.');
        }
      });

      function uploadPicture(file, data) {
        var data = $.parseJSON(data);
        if (data.error == 0) {
          var img = '<img src="' + data.url + '">';
          $('.woxiaola_post_img').append(img).slideDown();
        }
      }
    </script>
    <div class="biaoqian_box">
      <p class="tit_font">热门标签</p>
      <ul class="biaoqian_text">
        <li>
          <a href="/zt/jiongrenjiongshi/">囧人糗事</a>
        </li>
        <li>
          <a href="/zt/gaoxiaotupian/">搞笑图片</a>
        </li>
        <li>
          <a href="/zt/crxh/">成人笑话</a>
        </li>
        <li>
          <a href="/zt/dwmh/">动物萌货</a>
        </li>
        <li>
          <a href="/zt/neihan/">内涵</a>
        </li>
        <li>
          <a href="/zt/xieemanhua/">邪恶漫画</a>
        </li>
        <li>
          <a href="/zt/giftu/">GIF图</a>
        </li>
      </ul>
      <div class="clearcyh"></div>
    </div>
    <div id="colExtra">
      <div class="cainixihuan_box">
        <p class="tit_font fl">猜你喜欢</p>
        <span class="huanyipi fr">
          <!--<img src="/web/Public/Home/images/img_14.png" width="12" height="12"/>
          <a href="#">换一批</a>
          -->
        </span>
        <div class="clearcyh"></div>
        <ul class="cainixihuan_list">
          <li>
            <a href="" target="_blank">
              <span>
                <img src="/web/Uploads/Picture/2014-08-27/53fd8899b9e9c_140x100.jpg" alt="键盘新练习指法">
              </span>
              键盘新练习指法
            </a>
          </li>
          <li>
            <a href="" target="_blank">
              <span>
                <img src="/web/Uploads/Picture/2014-08-27/53fd4e47cc209_140x100.jpg" alt="前后八世笑话">
              </span>
              前后八世笑话
            </a>
          </li>
        </ul>
        <div class="clearcyh"></div>
      </div>
      <div class="guanzhu_down">
        <a href="http://www.woxiaola.com/download/ewm.html" class="down_icon">
          <img src="/web/Public/Home/images/img_20.png" width="300" height="50">
        </a>
        <a target="_blank" href="http://weibo.com/p/1005055242322769" class="bottom_guanzhu">
          <img src="/web/Public/Home/images/img_23.png" width="92" height="30">
        </a>
        <a href="http://t.qq.com/weibozxyl1807" class="bottom_guanzhu">
          <img src="/web/Public/Home/images/img_25.png" width="92" height="30">
        </a>
        <a target="_blank" href="http://user.qzone.qq.com/2818851377">
          <img src="/web/Public/Home/images/img_27.png" width="92" height="30">
        </a>
        <div class="clearcyh"></div>
      </div>
    </div>
  </div>
</div>
<style>
  .affix { position: fixed; bottom: 65px; }
</style>
<script type="text/javascript">
  $(function() {
    var r_l = $('#colExtra').offset().top;
    $(window).scroll(function() {
      $(window).scrollTop()
      // side = $('#side_nav').offset().top;
      if ($(window).scrollTop() >= r_l) {
        $('.cebian_box').addClass('affix');
      } else {
        $('.cebian_box').removeClass('affix');
      }
    });
  });
</script>
      </div>
      <!-- 底部 -->
      <div class="footer">
  <div class="foot"> </div>
  <div class="footVline"></div>
  <div class="footRights">
    <p> Copyright © <a href="/"> 吾湿网 </a> All Rights Reserved. 吉ICP备14000457号-1 <a href="javascript:;" class="underline ml5"> 免责声明</a> </p>
  </div>
</div>
      <div></div>
      <!-- mask 遮罩 -->
      <div id="mask">
        <iframe>
        </iframe>
      </div>
      <!-- end mask 遮罩 -->
      <!-- pop 弹出层-->
      <div id="pop" style="top: 0px;">
        <div id="pop-content"></div>
      </div>
      <!-- end pop 弹出层 -->
      <!-- 登陆弹框 -->
<div id="login_box" style="display: none;">
  <div id="wBox_overlay" class="wBox_hide wBox_overlayBG" style="opacity: 0.5; height: 100%; width: 100%; background:#000; z-index: 999999999; position:fixed; top:0; left:0;">
  </div>
  <div id="wBox" style=" left:50%; top:50%; margin-left:-295px; margin-top:-200px;display: block; z-index: 1000000000; position:fixed;">
    <div class="wBox_content" id="wBoxContent" style="position: static;">
      <div class="landing_contain">
        <div class="landing_tit">
          <a title="关闭" href="javascript:void(0)" onclick="wBox_close()" class="wBox_close"></a>登录笑话吧
        </div>
        <div class="landing_left">
          <div class="landing_sontit">用以下帐号快速登录</div>
          <div class="landing_main">
            <ul>
              <li><a id="xlog_qq" onclick="SLogin('qq');" class="landing_qq" title="QQ帐户" href="javascript:;">QQ帐户</a></li>
              <li><a id="xlog_sina" onclick="SLogin('sina');" class="landing_wb" title="微博帐户" href="javascript:;">微博帐户</a></li>
            </ul>
          </div>
          <div class="landing_register">还没有笑话吧帐号<a title="注册" href="javascript:;" onclick="reg()" id="register_start_btn">立即注册</a></div>
        </div>
        <div class="landing_right">
          <div class="landing_sontit">笑话吧帐号登录</div>
          <div class="landing_prompt">
            <div id="error_msg" style="display:none;"><span></span><font id="error_txt"></font></div>
          </div>
          <form id="loginform" action="/web/index.php/Home/Index/login" method="post">
            <input type="text" name="username" id="i--1" class="landing_text" placeholder="用户名/手机号/邮箱">
            <input type="password" name="password" id="i--2" placeholder="登录密码" class="landing_text" style="display: inline-block;">
            <div class="landing_checkbox">
              <input type="checkbox" checked="checked" value="2592000" name="cookietime">
              <label>记住密码</label>
              <a href="" target="_blank">忘记密码了?</a></div>
            <div class="landing_button">
              <input type="hidden" name="refurl" value="/web/index.php/Home/Index/Details/id/3">
              <button id="xlogin_btn" type="submit">立即登录</button>
            </div>
          </form>
        </div>
        <div class="landgin_link"></div>
      </div>
    </div>
  </div>
</div>
      <div id="reg_box" style="display: none;">
  <div id="wBox_overlay" class="wBox_hide wBox_overlayBG" style="opacity: 0.5; height: 100%; width: 100%; background:#000; z-index: 999999999; position:fixed; top:0; left:0;"></div>
  <div id="wBox" style=" left:50%; top:50%; margin-left:-345px; margin-top:-270px;display: block; z-index: 1000000000; position:fixed;">
    <div class="wBox_content" id="wBoxContent" style="position: static;">
      <div class="landing_contain2"> <!-- 登陆标题 start -->
        <div class="landing_tit"><a title="关闭" href="javascript:void(0)" onclick="wBox_close()" class="wBox_close"></a>注册笑话吧</div>
        <!-- 登陆标题 end --> <!-- 登陆左块 start -->
        <div class="landing_left">
          <div class="landing_sontit">用以下帐号快速注册</div>
          <div class="landing_main">
            <ul>
              <li><a id="xlog_qq" onclick="SLogin('qq');" class="landing_qq" title="QQ帐户" href="javascript:;">QQ帐户</a></li>
              <li><a id="xlog_sina" onclick="SLogin('sina');" class="landing_wb" title="微博帐户" href="javascript:;">微博帐户</a></li>
            </ul>
          </div>
          <div class="landing_register">已有笑话吧帐号<a title="注册" href="javascript:;" onclick="login();" id="register_start_btn">立即登陆</a></div>
        </div>
        <!-- 登陆左块 end --> <!-- 登陆右块 start -->
        <div class="landing_right">
          <div class="join_tit">笑话吧帐号注册</div>
          <!-- 错误提示 -->
          <div class="landing_right xcarRegister_mainR"> 
            <!-- 用户名注册 start -->
            <div class="landing_registerMain xcarRegister_mainRY" id="register_n" style="display: block;">
              <div class="landing_prompt">
                <div id="rerror_msg" style="display:none;"><span></span><font id="rerror_txt"></font></div>
              </div>
              <form name="form_n" action="/User/register.html" method="post" id="reform">
                <div>
                  <label class="xcarRegister_label">用户名：</label>
                  <input type="text" placeholder="取一个独特的名字，字母汉字数字均可" name="username" id="r--1" class="landing_text">
                </div>
                <div>
                  <label class="xcarRegister_label">登录密码：</label>
                  <input type="password" placeholder="6-16位英文字母、符号或数字" name="password" id="r--2" class="landing_text">
                </div>
                <div>
                  <label class="xcarRegister_label">确认密码：</label>
                  <input type="text" placeholder="请再次输入密码" name="repassword" id="r--3" class="landing_text">
                </div>
                <div>
                  <label class="xcarRegister_label">电子邮件：</label>
                  <input type="email" placeholder="用于确认身份及找回用户名和密码" name="email" id="r--4" class="landing_text">
                </div>
                <div>
                  <label class="xcarRegister_label">验证码：</label>
                  <input type="text" id="r--5" name="verify" placeholder="请输入验证码" class="landing_check" maxlength="5">
                  <img id="chk_img" class="verifyimg reloadverify" style="height:38px; margin-bottom:7px;" name="chk_img" src="/User/verify.html"> <a id="checkpincode" class="reloadverify" href="javascript:pincode();">换一组</a> </div>
                <div class="landing_button landing_buttonT">
                  <button type="submit" id="button_n">提交注册</button>
                </div>
              </form>
            </div> 
          <!-- 用户名注册 end --> 
          </div>
        </div>
        <!-- 登陆右块 end --> <!-- 分割线 start -->
        <div class="landgin_link"></div>
      <!-- 分割线 end -->
      </div>
    </div>
  </div>
</div>
      <script type="text/javascript" src="/web/Public/Home/js/showjs.js">
      </script>
      <script type="text/javascript" src="/web/Public/static/layer/layer.min.js">
      </script>
      <script type="text/javascript" src="/web/Public/static/layer/extend/layer.ext.js">
      </script>
      <script type="text/javascript" src="/web/Public/Home/js/jquery.scrollfollow.js">
      </script>
      <script type="text/javascript" src="/web/Public/Home/js/common.js">
      </script>
      <script type="text/javascript" src="/web/Public/Home/js/toast.js">
      </script>
      <script type="text/javascript" charset="utf-8" src="http://fusion.qq.com/fusion_loader?appid=1101738184&amp;platform=qzone">
      </script>
      <script type="text/javascript">
        var Class = {
          create: function() {
            return function() {
              this.initialize.apply(this, arguments);
            };
          }
        };
        Function.prototype.bind = function(object) {
          var method = this;
          return function() {
            method.apply(object, arguments);
          };
        };
        var Scroll = Class.create();
        Scroll.prototype = {
          initialize: function(element, height) {
            this.element = element;
            this.element.innerHTML += this.element.innerHTML;
            this.height = height;
            this.maxHeight = this.element.scrollHeight / 2;
            this.counter = 0;
            this.scroll();
            this.timer = "";
            this.element.onmouseover = this.stop.bind(this);
            this.element.onmouseout = function() {
              this.timer = setTimeout(this.scroll.bind(this), 1000);
            }.bind(this);
          },
          scroll: function() {
            if (this.element.scrollTop < this.maxHeight) {
              this.element.scrollTop++;
              this.counter++;
            } else {
              this.element.scrollTop = 0;
              this.counter = 0;
            }
            if (this.counter < this.height) {
              this.timer = setTimeout(this.scroll.bind(this), 1);
            } else {
              this.counter = 0;
              this.timer = setTimeout(this.scroll.bind(this), 3000);
            }
          },
          stop: function() {
            clearTimeout(this.timer);
          }
        };
        var myscroll = new Scroll(document.getElementById("links-list"), 15);
      </script>
      <script type="text/javascript">
        var page = '1';
        if (page == 2) {
          login()
        }
      </script>
  </body>

</html>
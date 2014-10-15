<?php


function filterExpression($str){
	$str=str_replace(':arrow:', '<img src="./Public/smilies/smilies/icon_arrow.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':grin:', '<img src="./Public/smilies/smilies/icon_biggrin.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':!:', '<img src="./Public/smilies/smilies/icon_exclaim.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':?:', '<img src="./Public/smilies/smilies/icon_question.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':cool:', '<img src="./Public/smilies/smilies/icon_cool.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':roll:', '<img src="./Public/smilies/smilies/icon_rolleyes.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':eek:', '<img src="./Public/smilies/smilies/icon_eek.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':evil:', '<img src="./Public/smilies/smilies/icon_evil.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':razz:', '<img src="./Public/smilies/smilies/icon_razz.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':mrgreen:', '<img src="./Public/smilies/smilies/icon_mrgreen.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':smile:', '<img src="./Public/smilies/smilies/icon_smile.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':oops:', '<img src="./Public/smilies/smilies/icon_redface.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':lol:', '<img src="./Public/smilies/smilies/icon_lol.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':mad:', '<img src="./Public/smilies/smilies/icon_mad.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':twisted:', '<img src="./Public/smilies/smilies/icon_twisted.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':wink:', '<img src="./Public/smilies/smilies/icon_wink.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':idea:', '<img src="./Public/smilies/smilies/icon_idea.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':cry:', '<img src="./Public/smilies/smilies/icon_cry.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':shock:', '<img src="./Public/smilies/smilies/icon_surprised.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':neutral:', '<img src="./Public/smilies/smilies/icon_neutral.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':sad:', '<img src="./Public/smilies/smilies/icon_sad.gif" alt="" data-bd-imgshare-binded="1">', $str);
	$str=str_replace(':???:', '<img src="./Public/smilies/smilies/icon_confused.gif" alt="" data-bd-imgshare-binded="1">', $str);
	return $str;
}
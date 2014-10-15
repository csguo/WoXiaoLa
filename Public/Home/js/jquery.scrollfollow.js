$(function(){
	$(window).scroll(function(){
		var el = $('.fundong');
		var leftTop = $(this).scrollTop();
		el.each(function(){
			var obj = $(this);
			var top = obj.parent().parent().parent().offset().top;
			var divHeight = obj.parent().parent().parent().height();
			var gunHeight = obj.height();

			if(top-110>leftTop){
				obj.css({"position":"static","top":"30px"});
			}else if((top-30+divHeight)<leftTop+gunHeight){
				obj.css({"position":"absolute","top":(divHeight+60-gunHeight)+"px"});
			}else if(top-100<leftTop){
				obj.css({"position":"fixed","top":"110px"});
			}
		})
	})

})

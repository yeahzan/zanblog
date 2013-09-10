<footer id="zan-footer">	      	
	Copyright © 2013 <a target="_blank" title="杭州网站建设" href="http://www.yeahzan.com/">佚站互联</a> YEAHZAN.COM - 用心创造每一站, <a target="_blank" title="杭州网站建设" href="http://www.yeahzan.com/">杭州网站建设</a>. All Rights Reserved.
	<!--统计代码开始-->
    <?php $analytics = get_option('zanblog_analytics');if ($analytics != "") : ?>
    	<?php echo stripslashes($analytics); ?>
    <?php endif ?>
    <!--统计代码结束-->
</footer>
<!-- //zan-footer -->

<div style="display: none;" class="icon-angle-up" id="gotop"></div>
<script type='text/javascript'>
	backTop=function (btnId){
		var btn=document.getElementById(btnId);
		var d=document.documentElement;
		var b=document.body;
		window.onscroll=set;
		btn.onclick=function (){
			btn.style.display="none";
			window.onscroll=null;
			this.timer=setInterval(function(){
				d.scrollTop-=Math.ceil((d.scrollTop+b.scrollTop)*0.1);
				b.scrollTop-=Math.ceil((d.scrollTop+b.scrollTop)*0.1);
				if((d.scrollTop+b.scrollTop)==0) clearInterval(btn.timer,window.onscroll=set);
			},10);
		};
		function set(){btn.style.display=(d.scrollTop+b.scrollTop>100)?'block':"none"}
	};
	backTop('gotop');
</script>

<?php wp_footer(); ?>
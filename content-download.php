<?php
	/*
	Template Name: 内容下载页面
	*/
?>

<?php get_header(); ?>
<div id="zan-bodyer">
	<div class="container">
		<?php 
	    	if(function_exists('bcn_display')) {
	        	echo '<i class="icon-home"></i> ';
	        	bcn_display();
	    	}
	    ?>
		<div class="bs-masthead">
			<h1>Zanblog主题</h1>
			<br/>
			<p>Zanblog是由佚站互联制作的基于Bootstrap3.0的WordPress主题，采用Bootstrap3.0的扁平化设计风格，提供免费下载，希望大家能够喜欢:)<p>
			<p>如果发现Bug或者有意见反馈，可以到<a href="http://www.yeahzan.com/zanblog/message">问题反馈</a>板块留言，感谢您的意见与建议。</p>
			<br/>
			<p class="alert alert-danger">使用过程中碰到问题请务必查看常见问题、更新日志以及使用视频，雷同问题我们不会做任何解答。<p>
			<p>
				<a class="btn btn-large" href="http://pan.baidu.com/share/link?shareid=3576155616&uk=3291201722" target="_blank">主题下载</a>
			
				<a class="btn btn-large" href="http://www.yeahzan.com/zanblog/archives/394.html">常见问题</a>

				<a class="btn btn-large" href="http://www.yeahzan.com/zanblog/archives/496.html">指导视频</a>
			</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>
</body>
</html>
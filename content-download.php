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
			<h1>Zanblog</h1>
			<p>Zanblog是由佚站互联制作的基于Bootstrap3.0的WordPress主题，采用Bootstrap3.0的扁平化设计风格，提供免费下载，希望大家能够喜欢:)<p>
			<p>Zanblog目前的最新版本是V2.0.0，请及时下载更新</p>
			<p>有任何问题都可以在<a href="http://www.yeahzan.com/zanblog/message">留言板</a>处提出，感谢您的意见与建议。</p>
			<p class="alert alert-danger">在下载主题之后请务必看一下使用说明和改动日志，常见问题都可以在那里得到答案。<p>
			<p>
				<a class="btn btn-large" onclick="_gaq.push(['_trackEvent', 'Jumbotron actions', 'Download', 'Download 3.0.0']);" href="http://pan.baidu.com/share/link?shareid=1888597972&uk=3291201722" target="_blank">下载 V2.0.0</a>
			
				<a class="btn btn-large" onclick="_gaq.push(['_trackEvent', 'Jumbotron actions', 'Download', 'Download 3.0.0']);" href="http://www.yeahzan.com/zanblog/archives/131.html">使用说明</a>

				<a class="btn btn-large" onclick="_gaq.push(['_trackEvent', 'Jumbotron actions', 'Download', 'Download 3.0.0']);" href="http://www.yeahzan.com/zanblog/archives/435.html">改动日志</a>
			</p>
		</div>
	</div>
</div>
<?php get_footer(); ?>
</body>
</html>
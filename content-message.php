<?php
/*
Template Name: content-message
*/
?>

<?php get_header(); ?>
<div id="zan-bodyer">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="alert alert-info fade in">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h2 class="gbook-title">欢迎在这里留下您对Zanblog的看法</h2>

					<p>非常感谢您对Zanblog主题的使用与支持，如果您在使用主题的过程中遇到任何问题，都可以在这里留言探讨。</p>
					<p>我们会尽快为您答复。</p>
					<p>也欢迎提出您的宝贵意见与建议，我们会根据反馈情况来进行下一个版本的开发与完善。</p>
	                <p>Zanblog官方群：223133969</p>
	                <p>当前Zanblog最新版本 V2.0.0</p>
					
					<p><span style="color:#D56765">温馨提醒：</span>在下载主题之后请务必看一下<a href="http://www.yeahzan.com/zanblog/archives/131.html">使用说明</a>和<a href="http://www.yeahzan.com/zanblog/archives/289.html">改动日志</a>，常见问题都可以在那里得到答案。</p>
				</div>
				<?php comments_template(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>
</body>
</html>
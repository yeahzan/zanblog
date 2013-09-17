<?php
	/*
	Template Name: Bug提交与意见反馈
	*/
?>

<?php get_header(); ?>
<div id="zan-bodyer">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="alert alert-info fade in">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php 
				    	if(function_exists('bcn_display')) {
				        	echo '<i class="icon-home"></i> ';
				        	bcn_display();
				    	}
				    ?>
					<h3 class="gbook-title">欢迎在这里提交你所发现的Bug或者对Zanblog的意见反馈。</h3>
					<br/>
					<p>非常感谢您对Zanblog主题的使用与支持，如果您在使用主题过程中发现Bug，请以留言的形式在下方提出，核实之后我们会在新版本中修正。</p>
					<br/>
					<p>另外也欢迎在这里提出您的宝贵意见与建议，我们会根据反馈情况决定是否采纳，并且在新版本中加入。</p>
					<br/>
					<p><span style="color:#D56765">灌水及无意义留言将被删除，谢谢合作。</span></p>
					<br/>
	                <p>Zanblog官方群：223133969</p>
					<br/>
					<p><span style="color:#D56765">温馨提醒：</span>版本更新内容可以在“更新日志”栏目查看，请及时下载最新版本。</p>
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
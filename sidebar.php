<aside id="sidebar"  class="col-md-4">
	<?php if(dynamic_sidebar('最热文章')) {?>
		<div class="panel panel-zan">
			<div class="panel-heading">
				<i class="icon-fire"></i> 最热文章
				<i class="icon-remove-sign panel-remove"></i>
				<i class="icon-chevron-sign-up panel-toggle"></i>
			</div>
			<ul class="list-group list-group-flush">
				<?php echo zanblog_get_most_comments(8, 46, 90); ?>
			</ul>
		</div>
	<?php };?>

	<?php if(dynamic_sidebar('最新评论')) {?>
		<div class="panel panel-zan hidden-xs">
			<div class="panel-heading">
				<i class="icon-comments"></i> 最新评论
				<i class="icon-remove-sign panel-remove"></i>
				<i class="icon-chevron-sign-up panel-toggle"></i>
			</div>
			<ul class="list-group list-group-flush">
				<?php
					echo zanblog_latest_comments_list(6, 40, 20);
				?>
			</ul>
		</div>
	<?php };?>

	<?php if(dynamic_sidebar('最新文章')) {?>
		<div class="panel panel-zan hidden-xs">
			<div class="panel-heading">
				<i class="icon-refresh"></i> 最新文章
				<i class="icon-remove-sign panel-remove"></i>
				<i class="icon-chevron-sign-up panel-toggle"></i>
			</div>
			<ul class="list-group list-group-flush">
				<?php $myposts = get_posts('numberposts=8 & offset=0');foreach($myposts as $post) :?>
				<li class="list-group-item">
					<a href="<?php the_permalink(); ?>" rel="bookmark" target="_blank">
						<?php echo zanblog_cut_string(strip_tags($post->post_title), 20); ?>
					</a>
					<span class="badge visible-lg">
						<?php echo $post->comment_count; ?>
					</span>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php };?>

	<?php if(dynamic_sidebar('分类、标签、友链')) {?>
	<div class="panel hidden-xs">
		<ul class="nav nav-pills pills-zan">
		  <li class="active"><a href="#sidebar-categories" data-toggle="tab">分类目录</a></li>
		  <li><a href="#sidebar-tags" data-toggle="tab">热门标签</a></li>
		  <?php if ( is_home() ) { ?>
		  <li><a href="#sidebar-links" data-toggle="tab">友情链接</a></li>
		  <?php } ?>
		</ul>

		<div class="tab-content">
			<div class="tab-pane active nav bs-sidenav fade in" id="sidebar-categories"><?php wp_list_categories('title_li='); ?></div>
			<div class="tab-pane fade" id="sidebar-tags"><?php wp_tag_cloud('smallest=8&largest=24&number=50'); ?></div>
			<?php if ( is_home() ) { ?>
			<div class="tab-pane nav bs-sidenav fade" id="sidebar-links"><?php wp_list_bookmarks('title_li=&categorize=0'); ?></div>
			<?php } ?>
		</div>
	</div>
	<?php };?>

</aside>

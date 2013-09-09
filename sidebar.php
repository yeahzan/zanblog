<aside id="sidebar"  class="col-md-4">
	<!-- <div class="panel panel-info">
		<div class="panel-heading">订阅本站</div>
		<a href="http://feed.feedsky.com/YEAHZANCOM" rel="bookmark" target="_blank" title="订阅到RSS">
			<img src="<?php echo get_bloginfo('template_directory').'/images/rss.png' ?>" alt="订阅到RSS" title="订阅到RSS" />
		</a>
	  	
	</div> -->
	<?php if(dynamic_sidebar('最热文章')) {?>
		<div class="panel panel-zan">
			<div class="panel-heading">
				<i class="icon-fire"></i> 最热文章
				<i class="icon-remove-sign panel-remove"></i>
				<i class="icon-chevron-sign-up panel-toggle"></i>
			</div>
			<ul class="list-group list-group-flush">
				<?php simple_get_most_viewed(); ?>
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
					global $wpdb;
					$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID, comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url,comment_author_email, comment_content AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND comment_author != 'zwwooooo' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 6";
					$comments = $wpdb->get_results($sql);
					foreach ($comments as $comment) {
						$output .= "\n<li class=\"list-group-item\">" . get_avatar(get_comment_author_email(), 40) . "<span class=\"comment-log\"> <a href=\"" . htmlspecialchars(get_comment_link( $comment->comment_ID )) . "\" title=\"on " .$comment->post_title . "\">" . cut_comments_str(strip_tags($comment->com_excerpt),20)."&nbsp;</a></span></li>";
					}
					$output = convert_smilies($output);
					echo $output;
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
					<a href="<?php the_permalink(); ?>" rel="bookmark" target="_blank" title="">
						<?php echo cut_str($post->post_title,36); ?>
					</a>
					<span class="badge visible-lg">
						<?php echo $post->comment_count; ?>
					</span>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php };?>

	<div class="panel hidden-xs">
		<ul class="nav nav-pills pills-zan">
		  <li class="active"><a href="#sidebar-categories" data-toggle="tab">分类目录</a></li>
		  <li><a href="#sidebar-tags" data-toggle="tab">热门标签</a></li>
		  <?php if ( is_home() ) { ?>
		  <li class="visible-lg"><a href="#sidebar-links" data-toggle="tab">友情链接</a></li>
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
<!-- 	<?php if ( is_home() ) { ?>
		<div class="panel">
		  	<?php if(is_dynamic_sidebar()) dynamic_sidebar('友情链接');?> 
		</div>
	<?php } ?> -->
</aside>

<?php get_header(); ?>
<div id="zan-bodyer" style="padding-top: 30px;">
	<div class="container">
		<section class="row">
			<div class="col-lg-8">								
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<article class="article container well">
					<!-- 大型设备文章属性 -->
					<div class="hidden-xs">
					    <div class="data-article">
							<span class="month"><?php the_time(n月) ?></span>
							<span class="day"><?php the_time(d) ?></span>
						</div>
						<div class="title-article">
							<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
						</div>
						<div class="tag-article container">
							<span class="label label-zan"><i class="icon-tags"></i> <?php the_category(','); ?></span>
							<span class="label label-zan"><i class="icon-user"></i> <?php the_author_posts_link(); ?></span>
							<span class="label label-zan"><i class="icon-eye-open"></i> <?php the_views(); ?></span>
						</div>
					</div>
					<!-- //大型设备文章属性 -->

					<!-- 小型设备文章属性 -->
						<div class="visible-xs">
							<div class="title-article">
								<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
							</div>
							<p>
								<i class="icon-calendar"></i> <?php the_date('m-d'); ?>
								<i class="icon-eye-open"></i> <?php the_views(); ?>
							</p>
						</div>
					<!-- //小型设备文章属性 -->

					<div class="centent-article">                    
						<p>
							<?php the_content(); ?>
						</p>

						<!-- Baidu Button BEGIN -->
						<div id="bdshare" class="bdshare_b pull-right" style="line-height: 12px;">
						<img src="http://bdimg.share.baidu.com/static/images/type-button-1.jpg?cdnversion=20120831" />
						<a class="shareCount"></a>
						</div>
						<script type="text/javascript" id="bdshare_js" data="type=button&amp;uid=6553914" ></script>
						<script type="text/javascript" id="bdshell_js"></script>
						<script type="text/javascript">
						document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000);
						</script>
						<!-- Baidu Button END -->
					</div>				
				</article>
				<?php endwhile; else: ?>
				<p><?php _e('抱歉，该页面不存在！'); ?></p>
				<?php endif; ?>
				<?php comments_template(); ?> 									
			</div>
			<?php get_sidebar(); ?>
		</section>
	</div>
</div>
<?php get_footer(); ?>
</body>
</html>
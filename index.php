<?php get_header(); ?>
<section id="zan-bodyer">
	<div class="container">
		<section class="row">
			<section id="mainstay" class="col-md-8">
				<div class="well fade in">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
						欢迎使用由 <a target="_blank" href="http://www.yeahzan.com/">佚站互联</a> 提供的 <strong>Zanblog主题</strong>，Zanblog 2.0.0 正式发布，欢迎下载使用:)。Zanblog官方群：223133969
				</div>
				<figure class="slide hidden-xs">
				  <?php echo do_shortcode("[metaslider id=411]"); ?>
	            </figure>

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="article container well">
				    <div class="data-article hidden-xs">
						<span class="month"><?php the_time(n月) ?></span>
						<span class="day"><?php the_time(d) ?></span>
					</div>
					<!-- 大型设备文章属性 -->
					<section class="hidden-xs">
						<div class="title-article">
							<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
						</div>
						<div class="tag-article container">
							<span class="label label-zan"><i class="icon-tags"></i> <?php the_category(','); ?></span>
							<span class="label label-zan"><i class="icon-user"></i> <?php the_author_posts_link(); ?></span>
							<span class="label label-zan"><i class="icon-eye-open"></i> <?php the_views(); ?></span>
						</div>
						<div class="centent-article">					
							<?php $thumb_img = has_post_thumbnail() ? get_the_post_thumbnail( $post->
							ID, array(730, 300), array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title ))) ) : get_post_img( 730, 300, 1);?>
							<figure class="thumbnail hidden-xs"><?php echo $thumb_img;?></figure>							
							<div class="alert alert-zan">					
								<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 250,"..."); ?>
							</div>
						</div>
						<a class="btn btn-danger pull-right read-more" href="<?php the_permalink() ?>"  title="详细阅读 <?php the_title(); ?>">阅读全文 <span class="badge"><?php comments_number( '0', '1', '%' ); ?></span></a>
					</section>
					<!-- //大型设备文章属性 -->

					<!-- 小型设备文章属性 -->
					<section class="visible-xs">
						<div class="title-article">
							<h4><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
						</div>
						<p>
							<i class="icon-calendar"></i> <?php the_date('m-d-y'); ?>
							<i class="icon-eye-open"></i> <?php the_views(); ?>
						</p>
						<div class="centent-article">					
							<?php $thumb_img = has_post_thumbnail() ? get_the_post_thumbnail( $post->
							ID, array(730, 300), array('alt' => trim(strip_tags( $post->post_title )),'title'=> trim(strip_tags( $post->post_title ))) ) : get_post_img( 730, 300, 1);?>
							<div class="alert alert-zan">					
								<?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 150,"..."); ?>
							</div>
						</div>
						<a class="btn btn-danger pull-right read-more btn-block" href="<?php the_permalink() ?>"  title="详细阅读 <?php the_title(); ?>">阅读全文 <span class="badge"><?php comments_number( '0', '1', '%' ); ?></span></a>
					</section>
					<!-- //小型设备文章属性 -->
				</div>
				<?php endwhile; else: ?>
				<p><?php _e('非常抱歉，没有相关文章.'); ?></p>
				<?php endif; ?>
			</section>
			<?php get_sidebar(); ?>
			<div class="col-md-8"><?php pagination($query_string); ?></div>
		</section>
	</div>
</section>
<!-- //zan-bodyer -->
<?php get_footer(); ?>
</body>
</html>
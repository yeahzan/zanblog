<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="utf-8">
<!-- 设置标题 -->
<title>
  <?php if ( is_home() ) { ?><?php bloginfo('name') ?> | <?php bloginfo('description'); ?><?php } ?>
  <?php if ( is_search() ) { ?>Search Results | <?php bloginfo('name'); ?><?php } ?>
  <?php if ( is_author() ) { ?>Author Archives | <?php bloginfo('name'); ?><?php } ?>
  <?php if ( is_single() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?><?php } ?>
  <?php if ( is_page() ) { ?><?php wp_title(''); ?> | <?php bloginfo('name'); ?><?php } ?>
  <?php if ( is_category() ) { ?><?php single_cat_title(); ?> | <?php bloginfo('name'); ?><?php } ?>
  <?php if ( is_month() ) { ?><?php the_time('F'); ?> | <?php bloginfo('name'); ?><?php } ?>
  <?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?> | Tag Archive | <?php single_tag_title("", true); } } ?>
</title> 

<!-- 设置描述性标签和关键词标签 -->
<?php
 if (is_home()){

        $description = get_option('zanblog_description');
        
        $keywords = get_option('zanblog_keywords');

    } elseif (is_single()){
        if ($post->post_excerpt) {
            $description  = $post->post_excerpt;
    } else {
   if(preg_match('/<p>(.*)<\/p>/iU',trim(strip_tags($post->post_content,"<p>")),$result)){
        $post_content = $result['1'];
       } else {
        $post_content_r = explode("\n",trim(strip_tags($post->post_content)));
        $post_content = $post_content_r['0'];
       }
             $description = substr($post_content,0,220); 
      }
        $keywords = "";
        $tags = wp_get_post_tags($post->ID);
        foreach ($tags as $tag ) {
           $keywords = $keywords . $tag->name . ",";
        }
    }
?>

<meta content="<?php echo trim($description); ?>" name="description"/>
<meta content="<?php echo rtrim($keywords,','); ?>" name="keywords"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<?php wp_head(); ?>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements Responsive IE8-->
<!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/ui/js/modernizr.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/ui/js/respond.min.js"></script>
<![endif]-->

</head>
<body <?php body_class(); ?>>
<header id="zan-header" class="navbar navbar-inverse bs-docs-nav">
  <nav class="container">
    <a href="<?php echo site_url(); ?>"><div class="navbar-brand"></div></a>
    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <div class="navbar-collapse bs-navbar-collapse collapse">
      <?php
        $defaults = array(
          'container' => '',
          'menu_class' => 'nav navbar-nav',
          'walker' => new ZanblogMenu('')
        );
        wp_nav_menu($defaults);
      ?>
      <?php if(dynamic_sidebar('搜索框')) {?>
        <div class="search visible-lg">
           <form method="get" id="searchform" class="form-inline" action="<?php bloginfo('url'); ?>">
              <input class="form-control" type="text" name="s" id="s" placeholder="搜索..." />
              <button type="submit" class="btn btn-danger btn-small" name="submit" ><i class="icon-search"></i></button>
           </form>
        </div>
      <?php };?>
    </div>
  </nav>
  <div id="if-fixed" class="pull-right visible-lg">
    <i class="icon-pushpin"></i>
    <input type="checkbox">
  </div>
</header>
<!-- //zan-header -->
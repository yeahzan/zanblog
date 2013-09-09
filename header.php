<!DOCTYPE html>
<html lang='cn'>
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

<!-- 引入style.css -->
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style.css" /> 

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_enqueue_script("jquery"); ?>
<?php wp_head(); ?>

</head>
<body class="">
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
          'walker' => new My_Walker_Nav_Menu('')
        );
        wp_nav_menu( $defaults );
      ?>
      <div class="search visible-lg">
         <form method="get" id="searchform" class="form-inline" action="<?php bloginfo('url'); ?>">
            <input class="form-control" type="text" name="s" id="s" placeholder="搜索..." />
            <button type="submit" class="btn btn-danger btn-small" name="submit" ><i class="icon-search"></i></button>
         </form>
      </div>
    </div>
  </nav>
  <div id="if-fixed" class="pull-right visible-lg">
    <i class="icon-pushpin"></i>
    <input type="checkbox">
  </div>
</header>
<!-- //zan-header -->
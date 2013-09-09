<?php 

// 引入JS
function wpbootstrap_scripts_with_jquery()
{
	wp_register_script( 'bootstrap-script', get_template_directory_uri() . '/ui/js/bootstrap.js', array( 'jquery' ) );
  wp_register_script( 'custom-script', get_template_directory_uri() . '/ui/js/zanblog.js', array( 'jquery' ) );
  wp_register_script( 'icheck-script', get_template_directory_uri() . '/ui/js/jquery.icheck.js', array( 'jquery' ) );
  wp_register_script( 'modernizr-script', get_template_directory_uri() . '/ui/js/modernizr.js', array( 'jquery' ) );
  wp_register_script( 'respond-script', get_template_directory_uri() . '/ui/js/respond.src.js', array( 'jquery' ) );

  wp_enqueue_script( 'bootstrap-script' );
	wp_enqueue_script( 'custom-script' );
  wp_enqueue_script( 'icheck-script' );
  wp_enqueue_script( 'modernizr-script' );
  wp_enqueue_script( 'respond-script' );

}
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' );


// 引入Zanblog主题选项
require_once(TEMPLATEPATH . '/theme-options.php');


// 引入短代码文件
require_once(TEMPLATEPATH . '/shortcodes.php');


// 小工具
if ( function_exists('register_sidebar') )

{
    register_sidebar(array(
        'name'          => '最热文章',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));
}

{
    register_sidebar(array(
        'name'          => '最新评论',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));
}

{
    register_sidebar(array(
		    'name'			    => '最新文章',
        'before_widget'	=> '',
        'after_widget'	=> '',
        'before_title'  => '',
        'after_title'   => ''
    ));
}

{
    register_sidebar(array(
        'name'          => '分类目录',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));
}

{
    register_sidebar(array(
        'name'          => '热门标签',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '',
        'after_title'   => ''
    ));
}


{
    register_sidebar(array(
		    'name'          => '友情链接',
        'before_widget'	=> '',
        'after_widget'	=> '',
        'before_title'  => '',
        'after_title'   => ''
    ));
}


{
    register_sidebar(array(
        'name'          => '幻灯片',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}

{
    register_sidebar(array(
        'name'          => '搜索框',
        'before_widget' => '',
        'after_widget'  => '',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}


// 给激活的导航菜单添加 active
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current_page_item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}


// 获得文章导引图像
function get_post_img($width="100",$height="100",$sizeTag=2) {   
    global $post, $posts;   
    $first_img = '';   
       
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
      
    $first_img = '<img src="'. $matches[1][0] .'" width="'.$width.'" height="'.$height.'" alt="'.$post->post_title .'"/>';  
      
    return false;
      
} 


//后台文章导引图像管理
if (function_exists('add_theme_support') )
 add_theme_support('post-thumbnails');
add_image_size('large', 730, 300, true);
add_image_size('thumbnail', 140, 100, true);
add_image_size('medium', 110, 110,true);


// 获得热评文章
function simple_get_most_viewed($posts_num=8, $days=90){
    global $wpdb;
    $sql = "SELECT ID , post_title , comment_count
            FROM $wpdb->posts
           WHERE post_type = 'post' AND TO_DAYS(now()) - TO_DAYS(post_date) < $days
		   AND ($wpdb->posts.`post_status` = 'publish' OR $wpdb->posts.`post_status` = 'inherit')
           ORDER BY comment_count DESC LIMIT 0 , $posts_num ";
    $posts = $wpdb->get_results($sql);
    $output = "";
    foreach ($posts as $post){
    	$output .= "\n<li class=\"list-group-item\"><a href= \"".get_permalink($post->ID)."\" rel=\"bookmark\" title=\"".$post->post_title."\" >". mb_strimwidth($post->post_title,0,50)."</a><span class=\"badge visible-lg\">" . $post->comment_count . "</li>";

    }
    echo $output;
}


//标题文字截断
function cut_str($src_str,$cut_length)
{
    $return_str='';
    $i=0;
    $n=0;
    $str_length=strlen($src_str);
    while (($n<$cut_length) && ($i<=$str_length))
    {
        $tmp_str=substr($src_str,$i,1);
        $ascnum=ord($tmp_str);
        if ($ascnum>=224)
        {
            $return_str=$return_str.substr($src_str,$i,3);
            $i=$i+3;
            $n=$n+2;
        }
        elseif ($ascnum>=192)
        {
            $return_str=$return_str.substr($src_str,$i,2);
            $i=$i+2;
            $n=$n+2;
        }
        elseif ($ascnum>=65 && $ascnum<=90)
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+2;
        }
        else 
        {
            $return_str=$return_str.substr($src_str,$i,1);
            $i=$i+1;
            $n=$n+1;
        }
    }
    if ($i<$str_length)
    {
        $return_str = $return_str . '...';
    }
    if (get_post_status() == 'private')
    {
        $return_str = $return_str . '（private）';
    }
    return $return_str;
}


//分页
function pagination($query_string){   

  global $posts_per_page, $paged;   
  $my_query = new WP_Query($query_string ."&posts_per_page=-1");   
  $total_posts = $my_query->post_count;   
  if(empty($paged))$paged = 1;   
  $prev = $paged - 1;   
  $next = $paged + 1;   
  $range = 4; // only edit this if you want to show more page-links   
  $showitems = ($range * 2)+1;   
    
  $pages = ceil($total_posts/$posts_per_page);


  //自动加载页面
  echo "<a id='load-more' class='btn btn-zan btn-block' load-data='努力加载中...' href='" . get_pagenum_link($next) . "'><i></i> <attr>加载更多</attr></a>";


  //手动详细分页
  // if(1 != $pages){   
  // echo "<ul class='pagination pull-right'>";   
  // echo ($paged > 2 && $paged+$range+1 > $pages && $showitems < $pages)? "<li><a href='".get_pagenum_link(1)."'>首页</a></li>":"";   
  // echo ($paged > 1 && $showitems < $pages)? "<li><a href='".get_pagenum_link($prev)."'>上一页</a></li>":"";   
    
  // for ($i=1; $i <= $pages; $i++){   
  // if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){   
  // echo ($paged == $i)? "<li class='active'><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";   
  // }   
  // }   
    
  // echo ($paged < $pages && $showitems < $pages) ? "<li><a href='".get_pagenum_link($next)."'>下一页</a></li>" :"";   
  // echo ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) ? "<li><a href='".get_pagenum_link($pages)."'>末页</a></li>":"";   
  // echo "</ul>\n";   
  // }   
} 


//评论邮件通知
function comment_mail_notify($comment_id) {
  $admin_email = get_bloginfo ('admin_email'); // $admin_email 可改為你指定的 e-mail.
  $comment = get_comment($comment_id);
  $comment_author_email = trim($comment->comment_author_email);
  $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
  $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
  $spam_confirmed = $comment->comment_approved;
  if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email) && ($comment_author_email == $admin_email)) {
    $wp_email = 'no-reply@' . preg_replace('#^www\.#', '', strtolower($_SERVER['SERVER_NAME'])); // e-mail 發出點, no-reply 可改為可用的 e-mail.
    $subject = '您在 [' . get_option("blogname") . '] 的评论有新的回复';
    $message = '
    <div style="background-color:#eef2fa; border:1px solid #d8e3e8; color:#111; padding:0 15px; -moz-border-radius:5px; -webkit-border-radius:5px; -khtml-border-radius:5px; border-radius:5px;">
      <p>' . trim(get_comment($parent_id)->comment_author) . ', 您好!</p>
      <p>您曾在 [' . get_option("blogname") . '] 的文章 《' . get_the_title($comment->comment_post_ID) . '》 上发表评论:<br />'
       . nl2br(get_comment($parent_id)->comment_content) . '</p>
      <p>' . trim($comment->comment_author) . ' 给您的回复如下:<br />'
       . nl2br($comment->comment_content) . '<br /></p>
      <p>您可以点击 <a href="' . htmlspecialchars(get_comment_link($parent_id)) . '">查看回复的完整內容</a></p>
      <p>欢迎再次光临 <a href="' . get_option('home') . '">' . get_option('blogname') . '</a></p>
      <p>(此郵件由系統自動發出, 請勿回覆.)</p>
    </div>';
    $message = convert_smilies($message);
    $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
    $headers = "$from\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";
    wp_mail( $to, $subject, $message, $headers );
    //echo 'mail to ', $to, '<br/> ' , $subject, $message; // for testing
  }
}
add_action('comment_post', 'comment_mail_notify');


//评论头像链接
function cut_comments_str($string, $sublen, $start = 0, $code = 'UTF-8') {
     if($code == 'UTF-8') {
         $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
         preg_match_all($pa, $string, $t_string);
         if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen)) . "...";
         return join('', array_slice($t_string[0], $start, $sublen));
     } else {
         $start = $start * 2;
         $sublen = $sublen * 2;
         $strlen = strlen($string);
         $tmpstr = '';
         for($i = 0; $i < $strlen; $i++) {
             if($i >= $start && $i < ($start + $sublen)) {
                 if(ord(substr($string, $i, 1)) > 129) $tmpstr .= substr($string, $i, 2);
                 else $tmpstr .= substr($string, $i, 1);
             } 
             if(ord(substr($string, $i, 1)) > 129) $i++;
        }
             if(strlen($tmpstr) < $strlen ) $tmpstr .= "...";
             return $tmpstr;
    }
}


//自定义子菜单类
class My_Walker_Nav_Menu extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }
}


//添加彩色Tag插件
function colorCloud($text) { 

  $text = preg_replace_callback('|<a (.+?)>|i', 'colorCloudCallback', $text); 
  return $text; 
} 

function colorCloudCallback($matches) { 

  $text = $matches[1]; 
  $color = dechex(rand(0,16777215)); 
  $pattern = '/style=(\'|\")(.*)(\'|\")/i'; 
  $text = preg_replace($pattern, "style=\"color:#{$color};$2;\"", $text); 
  return "<a $text>"; 
} 

add_filter('wp_tag_cloud', 'colorCloud', 1);


?>
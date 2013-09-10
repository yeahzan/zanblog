<?php
    // 在侧边栏 Widgets 中使用 Shortcode
   add_filter('widget_text', 'do_shortcode');

   // 解决 Shortcode 中自动添加的 br 或者 p 标签
   remove_filter( 'the_content', 'wpautop' );
   add_filter( 'the_content', 'wpautop' , 12);


    //邮箱地址简码， 调用样式[email atts="link"]ketu.seo@gmail.com[/email]
   function antispambot_shortcode_handler($atts, $content='') {
		extract( shortcode_atts( array(
			'link' => '1'
		), $atts ) );
	 
		if($link){
			return '<a href="mailto:'.antispambot($content,1).'" title="mail to '.antispambot($content,0).'">'.antispambot($content,0).'</a>';
		}else{
			return antispambot( $content,0);
		}
	}
	add_shortcode('email', 'antispambot_shortcode_handler');


    // 获取日志中的最新图像， 调用样式[postimage size="" float="left"] 
	function sc_postimage($atts, $content = null) { 

		extract(shortcode_atts(array( 

		"size" => 'thumbnail', 

		"float" => 'none' 

		), $atts)); 

		$images =& get_children( 'post_type=attachment&post_mime_type=image&post_parent=' . get_the_id() ); 

		foreach( $images as $imageID => $imagePost ) 

		$fullimage = wp_get_attachment_image($imageID, $size, false); 

		$imagedata = wp_get_attachment_image_src($imageID, $size, false); 

		$width = ($imagedata[1]+2); 

		$height = ($imagedata[2]+2); 

		return '<div class="postimage" style="width: '.$width.'px; height: '.$height.'px; float: '.$float.';">'.$fullimage.'</div>'; 

		} 

		add_shortcode("postimage", "sc_postimage");    

    // DOC文档预览，调用样式[ssdoc href="http://www.yeahzan.com/download/scheme.doc" target="_blank"]View DOC Via Google[/ssdoc]
	function scd_doc($atts, $content) {

		    return '<a class="viewdoc" href="http://docs.google.com/viewer?url=' . $atts['href'] . '" target="' . $atts['target'] . '" title="'.$content.'" alt="'.$content.'">'.$content.'</a>';
		}
		add_shortcode('ssdoc', 'scd_doc'); 


    //  Google Adsense，调用样式[ssadsense width="468" height="60" slot="60"][/ssadsense]
	function scd_adsense($atts, $content) {
	        extract(shortcode_atts(array(
	                "width" => '',
	                "slot" => '1234567890',
	                "height" => ''
	        ), $atts));
	    return '<div id="adsense"><script type="text/javascript"><!--
	    google_ad_client = "pub-XXXXXXXXXXXXXX";
	    google_ad_slot = "' . $atts['slot'] . '";
	    google_ad_width = ' . $atts['width'] . ';
	    google_ad_height = ' . $atts['height'] . ';
	    //-->
	</script>

	<script type="text/javascript"
	src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
	</script></div>';
	}
	add_shortcode('ssadsense', 'scd_adsense');


	 // 获取bootstrap的危险框样式， 调用样式[danger]内容 [/danger]
    function alert_danger($atts, $content="") { 

		return '<div class="alert alert-danger">'.$content.'</div>'; 

		} 

		add_shortcode('danger', 'alert_danger'); 

	 // 获取bootstrap的success框样式， 调用样式[success]内容 [/success]
    function alert_success($atts, $content="") { 

		return '<div class="alert alert-success">'.$content.'</div>'; 

		} 

		add_shortcode('success', 'alert_success'); 



	 // 获取bootstrap的info框样式， 调用样式[info]内容 [/info]
    function alert_info($atts, $content="") { 

		return '<div class="alert alert-info">'.$content.'</div>'; 

		} 

		add_shortcode('info', 'alert_info'); 

		// 获取bootstrap的alert框样式， 调用样式[alert]内容 [/alert]
    function alert($atts, $content="") { 

		return '<div class="alert">'.$content.'</div>'; 

		} 

		add_shortcode('alert', 'alert'); 

?>
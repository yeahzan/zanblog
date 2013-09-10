<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Yeahzan
 * @subpackage Zanblog
 * @since Zanblog 2.0.0
 */

get_header(); ?>
<div id="content" class="site-content" role="main">
	<div class="alert alert-danger text-center">
		<h1 class="page-title"><i class="icon-frown"></i> 无法找到该页面（404）</h1>
	</div>
	<div class="page-content well text-center">
		<h2>很遗憾，你所要寻找的页面已经丢失或者已经被删除。</h2>
		<h3>你可以回到 <a href="http://www.yeahzan.com/zanblog"><i class="icon-mail-forward"></i> Zanblog</a> 或者可以选择到 <a href="http://www.yeahzan.com/"><i class="icon-home"></i> 佚站互联</a> 看看 <i class="icon-smile"></i></h3>
	</div>
</div>
<?php get_footer(); ?>
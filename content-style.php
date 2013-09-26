<?php
	/*
	Template Name: 样式参考页面
	*/
?>

<?php get_header(); ?>
<div id="zan-bodyer">
	<div class="container">
		<?php 
	    	if(function_exists('bcn_display')) {
	        	echo '<i class="icon-home"></i> ';
	        	bcn_display();
	    	}
	    ?>
		<header class="bs-masthead">
			<h1>CSS样式参考</h1>
			<div class="alert alert-info"><p>通过对应的CSS样式调用，我们可以把自己的文章变得更加丰富多彩。</p></div>
		</header>

		<section class="well">
			<div id="btn-css">
				<div class="page-header">
					<h1>按钮样式CSS</h1>
				</div>
				<h3>样式预览：</h3>
				<div class="alert">
					<button type="button" class="btn btn-default">默认</button>

					<button type="button" class="btn btn-primary">主要</button>

					<button type="button" class="btn btn-success">成功</button>

					<button type="button" class="btn btn-info">信息</button>

					<button type="button" class="btn btn-warning">警告</button>

					<button type="button" class="btn btn-danger">危险</button>

					<button type="button" class="btn btn-link">链接</button>
				</div>
				<h3>代码调用：</h3>
				<div class="alert">
					<p><code>&lt;button type="button" class="btn btn-default"&gt;默认&lt;/button&gt;</code></p>
					<p><code>&lt;button type="button" class="btn btn-primary"&gt;主要&lt;/button&gt;</code></p>
					<p><code>&lt;button type="button" class="btn btn-success"&gt;成功&lt;/button&gt;</code></p>
					<p><code>&lt;button type="button" class="btn btn-info"&gt;信息&lt;/button&gt;</code></p>
					<p><code>&lt;button type="button" class="btn btn-warning"&gt;警告&lt;/button&gt;</code></p>
					<p><code>&lt;button type="button" class="btn btn-danger"&gt;危险&lt;/button&gt;</code></p>
					<p><code>&lt;button type="button" class="btn btn-link"&gt;链接&lt;/button&gt;</code></p>
				</div>
				<h3>说明：这些btn类都可以放入到a标签中进行使用</h3>
				<div class="alert">
					<p><code>&lt;a href="#" class="btn btn-default"&gt;默认&lt;/a&gt;</code></p>
				</div>
			</div>

			</br>
			<div id="alert-css">
				<div class="page-header">
					<h1>背景样式CSS</h1>
				</div>
				<h3>样式预览：</h3>
				<div class="alert">
					<div class="alert alert-success">这是成功背景框</div>
					<div class="alert alert-info">这是信息背景框</div>
					<div class="alert alert-warning">这是警告背景框</div>
					<div class="alert alert-danger">这是危险背景框</div>
				</div>
				<h3>代码调用：</h3>
				<div class="alert">
					<p><code>&lt;div class="alert alert-success"&gt;这是成功背景框&lt;/div&gt;</code></p>
					<p><code>&lt;div class="alert alert-info"&gt;这是信息背景框&lt;/div&gt;</code></p>
					<p><code>&lt;div class="alert alert-warning"&gt;这是警告背景框&lt;/div&gt;</code></p>
					<p><code>&lt;div class="alert alert-danger"&gt;这是危险背景框&lt;/div&gt;</code></p>
				</div>
				<h3>说明：如果想要给背景框添加关闭按钮，则要添加一个class以及一个button标签</h3>
				<div class="alert">
					<div class="alert alert-warning alert-dismissable">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  警告框！这是一个可以关闭的警告框。
					</div>
					<p><code>
						&lt;div class="alert alert-warning alert-dismissable"&gt;
					</code></p>
					<p><code> 
						&lt;button type="button" class="close" data-dismiss="alert" aria-hidden="true"&gt;&times;&lt;/button&gt;
					</code></p>
					<p><code>
						警告框！这是一个可以关闭的警告框。
					</code></p>
					<p><code>
						&lt;/div&gt;
					</code></p>
				</div>
			</div>


			</br>
			<div id="block-css">
				<div class="page-header">
					<h1>引用文段样式CSS</h1>
				</div>
				<h3>样式预览：</h3>
				<div class="alert">
					<blockquote>这是引用文段样式</blockquote>
				</div>
				<h3>代码调用：</h3>
				<div class="alert">
					<p><code>&lt;blockquote&gt;这是引用文段样式&lt;/blockquote&gt;</code></p>
				</div>
				<h3>说明：可以在文章编辑器上的小按钮快速调用该样式</h3>
			</div>
		</section>
	</div>
</div>
<?php get_footer(); ?>
</body>
</html>
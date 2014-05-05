<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="http://www.pangjiujiu.com/static/web/css/base.css" rel="stylesheet" >
<link href="http://www.pangjiujiu.com/static/web/css/red.css" rel="stylesheet" >
<link href="http://www.pangjiujiu.com/static/web/css/activity_detail.css" rel="stylesheet" >
 
<!--js 参数staticconfig-->
<script src="http://www.pangjiujiu.com/static/js/jquery.js"></script>
</head>

<body>
	<div class="wrapper">
		<?php $this->load('web/common/header.php'); ?>
		
		<div class="section">
			
			<ul class="columns-content page-content clearfix">
				
				<!-- BEGIN .col-main -->
				<li class="col-main">
					
					<h2 class="page-title">Seaweed Soap</h2>

						<ul class="columns-2 product-single-content clearfix">
							
							<li class="col2 clearfix">
								<!-- BEGIN .slider -->
								<div class="slider-single clearfix">
									<a href="#" title="Slide 1" target="_blank"><img src="http://www.pangjiujiu.com/static/image/image3.jpg" alt="" /></a>
								<!-- END .slider -->
								</div>
							</li>
							<li class="col2 clearfix">
								
								<h2>
									<span class="price-now">£14.99</span>
									<span class="price-original">£19.99</span>
								</h2>
								
								<p>Vestibulum lacinia neque eu mi accumsan faucibus. Vivamus sed odio nisl, porta facilisis magna. Maecenas sed mi ac ante gravida porta id eget odio. Mauris vel leo nibh. Quisque enim sem, porttitor et congue vehicula, congue sit amet felis.</p>
								
								<form method="post" action="cart.html" class="qty-product-single clearfix" />
									<div class="qty-fields-large clearfix fl">
							        	<input type="button" class="plusminus minus" id="minus1" value="-"><input maxlength="12" class="qty-text" size="4" value="1" name="quantity"><input type="button" class="plusminus plus" id="plus1" value="+">
									</div>
								    <button type="submit" class="button3 fr">Add to cart &raquo;</button>	
								</form>
								
							</li>
						
						</ul>
						
						<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
							<ul class="nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
								<li class="ui-state-default ui-corner-top ui-tabs-selected ui-state-active"><a href="#tabs-tab-title-1">Product Features</a></li>
								<li class="ui-state-default ui-corner-top"><a href="#tabs-tab-title-2">Technical Specs</a></li>
								<li class="ui-state-default ui-corner-top"><a href="#tabs-tab-title-3">Delivery</a></li>
							</ul>
							<div id="tabs-tab-title-1" class="ui-tabs-panel ui-widget-content ui-corner-bottom"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent et rhoncus neque. Maecenas enim nunc, dapibus in mattis eleifend, luctus et magna. Maecenas nunc est, posuere sed convallis tincidunt</p></div>
							<div id="tabs-tab-title-2" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide"><p>Morbi lacinia, nisi nec rutrum faucibus, enim augue feugiat libero, sit amet sollicitudin massa nisi eget nulla. Etiam pretium, est sit amet eleifend posuere, tellus nisl interdum massa</p></div>
							<div id="tabs-tab-title-3" class="ui-tabs-panel ui-widget-content ui-corner-bottom ui-tabs-hide"><p>Ut bibendum ullamcorper tortor, eget aliquet odio facilisis quis. Nulla interdum aliquet scelerisque. Curabitur ante metus, laoreet eu convallis a, tristique a arcu. Donec id erat sed lectus congue tempor</p></div>
						</div>
				
				<!-- END .col-main -->
				</li>
				
				<!-- BEGIN .col-sidebar -->
				<li class="col-sidebar">
				
					<div class="widget">
						<div class="widget-title clearfix"><h4 class="tag-title">Categories</h4></div>
						<ul>
							<li><a href="#">Skin Care</a></li>
							<li><a href="#">Bath &amp; Body Care</a></li>
							<li><a href="#">Fragrance</a></li>
							<li><a href="#">Make-Up</a></li>
							<li><a href="#">Hair</a></li>
							<li><a href="#">Moisturisers</a></li>
						</ul>
					</div>
					
					<div class="widget">
						<div class="widget-title clearfix"><h4 class="tag-title">Recent Posts</h4></div>
						
						<ul class="latest-posts-list clearfix">
							
							<li class="clearfix">
								<div class="lpl-content">
									<h6><a href="blog-single.html" rel="bookmark">Dasellus ac nibh urna donec 
									ac urna</a> <span> Posted Jun 13, 2012 By admin</span></h6>
								</div>
							</li>
							
							<li class="clearfix">
								<div class="lpl-content">
									<h6><a href="blog-single.html" rel="bookmark">Dasellus ac nibh urna donec 
									ac urna</a> <span> Posted Jun 13, 2012 By admin</span></h6>
								</div>
							</li>
							
							<li class="clearfix">
								<div class="lpl-content">
									<h6><a href="blog-single.html" rel="bookmark">Dasellus ac nibh urna donec 
									ac urna</a> <span> Posted Jun 13, 2012 By admin</span></h6>
								</div>
							</li>
							
						</ul>
					
					</div>
					
				<!-- END .col-sidebar -->
				</li>
				
			</ul>
			
		<!-- END .section -->
		</div>

		<?php $this->load('web/common/footer.php'); ?>
	</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="http://www.pangjiujiu.com/static/web/css/base.css" rel="stylesheet" >
<link href="http://www.pangjiujiu.com/static/web/css/red.css" rel="stylesheet" >
<link href="http://www.pangjiujiu.com/static/web/css/slide.css" rel="stylesheet" >
<link href="http://www.pangjiujiu.com/static/web/css/index.css" rel="stylesheet" >

<script type="text/javascript" src="http://www.pangjiujiu.com/static/js/jquery.js"></script>
<script type="text/javascript" src="http://www.pangjiujiu.com/static/js/jquery.flexslider-min.js"></script>
<!--js 参数staticconfig-->
</head>
<body>
	<div class="wrapper">
		<?php $this->load('web/common/header.php'); ?>
		<div class="slider slide-loader clearfix">
			<ul class="slides">
				<li>
					<a href="#" title="Slide 1" target="_blank"><img src="/static/web/images/slide3.jpg" alt=""></a>
				</li>
				<li>
					<a href="#" title="Slide 2" target="_blank"><img src="/static/web/images/slide2.jpg" alt=""></a>
				</li>
				<li>
					<a href="#" title="Slide 3" target="_blank"><img src="/static/web/images/slide1.jpg" alt=""></a>
				</li>
			</ul>
		<!-- END .slider -->
		</div>
		<?php if (!empty($this->latestPost) && is_array($this->latestPost)) { ?>
		<div class="section-mini2">
			<div class="tag-title-wrap clearfix">
                <h4 class="tag-title">最新活动</h4>
            </div>
            <ul class="lists">
            	<?php foreach ($this->latestPost as $key => $value) { ?>
            		<li><a href="<?php echo $value['activity_url']?>">[<?php echo $value['classify']?>] <?php echo $value['title']?></a><span><?php echo $value['pub_time']?></span></li>		
            	<?php } ?>
		    </ul>
		</div>
		<?php } ?>
		<div class="section-mini2">
			<div class="tag-title-wrap clearfix">
                <h4 class="tag-title">热门活动</h4>
            </div>
            <ul class="lists">
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智小sadgsd天地 索取即得+送神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智小天地 索取即得+送神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智小天地 索取即得+sadg送神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智小天地 索取即得sadhgtgki+送ASF神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智sadg小天地 索取即得+送神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智小天地 索取即得+送神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智小fgkj天地 索取即得+送神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智小天地 索取即得+送神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		        <li>
		        <a href="#">[免费抽奖] sagsdagsdgsadg巧虎乐智小天地 索取即得+笔绘画组</a><span>2013-5-5</span>
		        </li>
		        
		        <li>
		        <a href="#">[免费抽奖] 巧虎乐智小fgkj天地 索取即得+送神奇水笔绘画组(1500份)</a><span>2013-5-5</span>
		        </li>
		    </ul>
		</div>
		<?php $this->load('web/common/footer.php'); ?>
	</div>
<script type="text/javascript">
// Slider
$(window).load(function(){
  $('.slider').flexslider({
    animation: "slide",
	controlNav: false
  });
});

$(window).load(function(){
  $('.slider-single').flexslider({
    animation: "slide",
	controlNav: true,
	directionNav: false
  });
});
</script>
</body>
</html>
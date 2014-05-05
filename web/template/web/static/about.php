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
		<div class="section">
			<?php echo $this->aboutArticle['content']; ?>
		</div>
		<?php $this->load('web/common/footer.php'); ?>
	</div>
</body>
</html>
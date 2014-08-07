<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title ?></title>
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/reset.css');?>" />
<script src="<?php echo base_url('js/jquery-1.11.1.js');?>"></script>
<script src="<?php echo base_url('js/jquery.confirm.js');?>"></script>
<script src="<?php echo base_url('js/jquery.form.js');?>"></script>
<script src="<?php echo base_url('js/jquery.validate.js');?>"></script>
<script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>
<link href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/all.css');?>" />
</head>

<body>
	<div class="all">
		<div class="top">
			<div class="logo">
				<a href="<?php echo base_url();?>" title="home"><img src="<?php echo base_url('image/logo.png');?>" alt="logo" /></a>
			</div>
			<div class="menu">
				<ul>
					<li><a href="<?php echo site_url('/view_all') ;?>" title="商品">商品總覽</a> |</li>
					<li><a href="<?php echo site_url('/create') ;?>" title="新增">新增商品</a> |</li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="<?php echo base_url('image/banner1.png');?>" alt="">
    </div>
    <div class="item">
      <img src="<?php echo base_url('image/banner2.png');?>" alt="">
    </div>
    <div class="item">
      <img src="<?php echo base_url('image/banner3.png');?>" alt="">
    </div>
    <div class="item">
      <img src="<?php echo base_url('image/banner4.png');?>" alt="">
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>

<div class="content">
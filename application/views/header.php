<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>cognise | allfields - dashbaord</title>
	<link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="/styles/allfields.css">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements and font icon fix for IE6-7 -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--[if lt IE 8]>
		<script type="text/javascript" src="http://allfields.cognise.co.nz/assets/js/icon-font-ie7.min.js"></script>

	<![endif]-->
	<script type="text/javascript" src="http://allfields.cognise.co.nz/assets/js/jquery.min.js?1404778332"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="navbar">
		<div class="navbar-inner">		
			<span class="pull-right">
				<a class="btn btn-primary dark deepDark" href="/"><span class="fui-user user_icon"></span>&nbsp;&nbsp;<?php echo $user['first_name'].' '.$user['last_name'] ?></a>
				<a class="btn btn-primary dark deepDark" href="/"><span class="fui-lock"></span>&nbsp;&nbsp;Logout</a>
			</span>
							
			<span class="brand">
				<a href="/">
					<img src="http://allfields.cognise.co.nz/assets/img/cognise_logo.png" border="0">
				</a>
			</span>
			<span class="links">
				<a href="/" class="btn btn-primary dark">Dashboard</a>
				<a href="/" class="btn btn-success">Courses</a>
			</span>										
		</div>
		
		<div class="breadcrumbs">
			&nbsp;&nbsp;/&nbsp;&nbsp;<a href="/"><?php echo $page_name ?></a>
		</div>
	</div>
	<div class="container base_block">
		<div class="row">
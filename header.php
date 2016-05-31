<!DOCTYPE html>
<html>
	<head>
		<title><?php bloginfo('title'); ?> | <?php bloginfo('description');?></title>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class();?>>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
        		</button>
				<a href="#page-top" class="navbar-brand"><?php bloginfo('title'); ?></a>
			</div>
				<?php
					$menu_args = array(
					            'theme_location' => 'primary',
					            'container_class' => 'collapse navbar-collapse', 
					            'container_id' => 'bs-example-navbar-collapse-1', 
					            'menu_class' => 'nav navbar-nav navbar-right', 
					    	);
					wp_nav_menu($menu_args);
				?>
			</div>
		</nav>

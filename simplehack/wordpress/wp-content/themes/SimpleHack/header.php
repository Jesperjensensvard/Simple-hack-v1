<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--[if lt IE 9]>
		<script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
        <title>Simple Hack</title>
		<?php wp_head(); ?>
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicons/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicons/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicons/site.webmanifest">
		<link rel="mask-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicons/safari-pinned-tab.svg" color="#000000">
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/favicons/favicon.ico">	
		<link href="https://fonts.googleapis.com/css?family=Suez+One&display=swap" rel="stylesheet">
	</head>
	<body <?php body_class() ?>>

		<?php // add air if its not template-page 
			$is_page_template_value = 	is_page_template( 'template-page.php' );	
		?>

	<header class="header" id="main-header">
		<div class="g-header-special">
			<div class="main-menu-wrapper clearfix">
				<div class="logo-container ">
					<div class="logo-wrapper">
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/demo/logo.png" alt="">
					</div>
				</div>
				<nav class="main-nav">
					<?php 
						if (0 !== $locations1['main_menu']) {
							wp_nav_menu( array(
								'theme_location' => 'main_menu',
								'depth' => 3
							) );
						} 
					?>	
				</nav>
				<div class="menu-button-wrapper">
					<i onclick="myFunction()" class="fas fa-bars menu-button-icon"></i>
				</div>
				
			</div>
		</div>
		<div class="s-second-header">
			<nav class="second-nav" id="second-men">
					<?php 
						if (0 !== $locations1['main_menu']) {
							wp_nav_menu( array(
								'theme_location' => 'main_menu',
								'depth' => 3
							) );
						} 
					?>	
				</nav>
			</div>
		</div>
	</header>

	<?php 
		if($is_page_template_value != 1 ){
			echo '<div class="s-header-special-air">';
			echo '</div>';
		}
	?>
		

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header>
			<h1><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo('name'); ?></a></h1>
			<nav><?php wp_nav_menu(); ?></nav>
		</header>
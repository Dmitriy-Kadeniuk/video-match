<<<<<<< HEAD
<?php session_start(); ?>

<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package video-match
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'video-match'); ?></a>
		<aside id="sidebar">
			<header id="masthead" class="site-header">
				<nav>
					<div class="navbar">
						<div class="container nav-container">
							<input class="checkbox" type="checkbox" name="" id="" />
							<div class="hamburger-lines">
								<span class="line line1"></span>
								<span class="line line2"></span>
								<span class="line line3"></span>
							</div>
							<div class="logo">
							<?php 
									if (isset($_SESSION['user_name'])) {
										$user_name = $_SESSION['user_name'];
										// Теперь $user_name содержит имя пользователя
									}
									if (isset($_SESSION['user_id'])) {
										$user_id = $_SESSION['user_id'];
									}
									
								?>
								<h1>VideoMatch</h1>
								<span class="reg-name">Name:<?php echo $user_name ?></span>
								<span class="reg-name">ID:<?php echo $user_id ?></span>
							</div>
							<div class="menu-items">
								<?php

								wp_nav_menu(
									array(
										'theme_location' => 'menu',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
							</div>
						</div>
					</div>
				</nav>
			</header><!-- #masthead -->
		</aside>
=======
<?php session_start(); ?>

<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package video-match
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'video-match'); ?></a>
		<aside id="sidebar">
			<header id="masthead" class="site-header">
				<nav>
					<div class="navbar">
						<div class="container nav-container">
							<input class="checkbox" type="checkbox" name="" id="" />
							<div class="hamburger-lines">
								<span class="line line1"></span>
								<span class="line line2"></span>
								<span class="line line3"></span>
							</div>
							<div class="logo">
								<h1>VideoMatch</h1>
							</div>
							<div class="menu-items">
								<?php

								wp_nav_menu(
									array(
										'theme_location' => 'menu',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
							</div>
						</div>
					</div>
				</nav>
			</header><!-- #masthead -->
		</aside>
>>>>>>> b5964a3070cc6c6b8bb2b0f4ad6ad9b2f0a1fa25

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
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Righteous&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Підключення бібліотеки Slick Carousel (після jQuery) -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header id="masthead" class="site-header">
			<div class="logo-users">
				<div id="logo" class="logo">
					<h1>VideoMatch</h1>
				</div>
				<div class="user">
					<?php
					if (isset($_SESSION['user_name'])) {
						$user_name = $_SESSION['user_name'];
					?>
						<h5>
							<?php echo $user_name; ?>
						</h5>
					<?php
					}
					wp_nav_menu(
						('menu=Sign in/Sign up')
					);
					?>

					<!-- <?php
							if (isset($_SESSION['user_name'])) {

								$user_name = $_SESSION['user_name'];
							}
							// if (isset($_SESSION['user_id'])) {
							// 	$user_id = $_SESSION['user_id'];
							// }

							?> -->
				</div>
			</div>
		</header><!-- #masthead -->
		<div id="wrapper">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'video-match'); ?></a>
			<aside id="sidebar">

				<nav>
					<div class="navbar">
						<div class="container nav-container">
							<input class="checkbox" type="checkbox" name="" id="" />
							<div class="hamburger-lines">
								<span class="line line1"></span>
								<span class="line line2"></span>
								<span class="line line3"></span>
							</div>
							<div class="menu-items">
								<?php
								wp_nav_menu(
									('menu=Main Menu')
								);
								?>
							</div>
						</div>
					</div>
				</nav>

			</aside>
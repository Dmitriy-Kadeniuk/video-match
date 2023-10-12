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
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
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
																if (!isset($_SESSION['user_name'])) {
																	// Пользователь не аутентифицирован
																	echo '<a href="/login"> <img src="../wp-content/themes/video-match/img/login/sign.svg" alt=""></a>';
																} else {
																	echo '<div class="mega-menu"><h5>' . $_SESSION['user_name'] 
																	. ', ID: ' . $_SESSION['user_id'] 
																	. '</h5>
																	<nav>
																	<ul>
																	<li><a href="' . get_template_directory_uri() . '/page-seting.php">Settings</a><li>
																	<li ><a href="' . get_template_directory_uri() . '/function/logout.php">Exit<svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512" xml:space="preserve"><g><path d="M11.85 7.35a1.6 1.6 0 1 1 3.2 0 1.6 1.6 0 0 1-3.2 0zm-.55 4.569 1.595 1.063a1 1 0 0 0 .555.169h3.2a1 1 0 1 0 0-2h-2.897l-1.504-1.003a1.792 1.792 0 0 0-2.463.452l-2.02 2.828a2.579 2.579 0 0 0-.275 2.533 2.581 2.581 0 0 0 2.023 1.552l1.808.258-1.221 3.663a.999.999 0 1 0 1.897.633l1.297-3.891c.17-.508.105-1.06-.176-1.516a1.792 1.792 0 0 0-1.277-.836l-2.045-.292a.59.59 0 0 1-.467-.358.589.589 0 0 1 .063-.584l1.908-2.67zM2.25 6.25h4.793L5.896 7.397a.5.5 0 1 0 .707.707l2-2a.5.5 0 0 0 0-.707l-2-2a.5.5 0 1 0-.707.707L7.043 5.25H2.25a.5.5 0 1 0 0 1zm4.298 11.066-.116.234H2.25a1 1 0 1 0 0 2h4.8a1 1 0 0 0 .894-.553l.18-.36a4.037 4.037 0 0 1-1.576-1.321zm.747-7.598-2.4 1.6a1 1 0 1 0 1.11 1.664l.47-.313c.025-.038.045-.077.07-.114l2.02-2.827c.047-.066.105-.117.156-.178H7.85a1 1 0 0 0-.555.168zM20.25 1.25h-8a2.502 2.502 0 0 0-2.5 2.5v4.41a3.76 3.76 0 0 1 1-.275V3.75c0-.827.673-1.5 1.5-1.5h8c.827 0 1.5.673 1.5 1.5v16c0 .827-.673 1.5-1.5 1.5h-5.872l-.333 1h6.205c1.379 0 2.5-1.121 2.5-2.5v-16c0-1.379-1.121-2.5-2.5-2.5z" fill="currentColor" opacity="1" data-original="#000000"/></g></svg></a><li>
																	</ul>
																	</nav>';
																}
																?>

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
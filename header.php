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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'video-match' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<?php
			$user_name = ""; // Инициализация переменной

			// Проверяем, залогинен ли пользователь (в зависимости от вашей логики)
			if (isset($_SESSION['user_name'])) {
				$user_name = $_SESSION['user_name']; // Получаем имя пользователя из сессии
				// Теперь $user_name содержит имя залогиненного пользователя
			}
			
			// Проверяем, есть ли кука с именем пользователя
			if (isset($_COOKIE['user_name'])) {
				$user_name = $_COOKIE['user_name']; // Получаем имя пользователя из куки
				// Теперь $user_name содержит имя пользователя, если кука установлена
			}
			
			echo $user_name;
			
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

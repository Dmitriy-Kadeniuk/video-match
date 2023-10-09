<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package video-match
 */

?>
<footer id="colophon" class="site-footer">
	<div class="site-info">
		<div class="footer">
			<div id="logo" class="logo">
				<h1>VideoMatch</h1>
			</div>

			<div class="second-menu">
				<?php

				wp_nav_menu(
					('menu=Second Menu')
				);
				?>
			</div>
			<div class="main-menu">
				<?php

				wp_nav_menu(
					('menu=Main Menu')
				);
				?>
			</div>
			


			<div class="soc-icons">
				<h6>Connect with us</h6>
				<div class="icons">
					<a href="#">
						<img src="../wp-content/themes/video-match/img/soc-icons/Instagram.svg" alt="">
					</a>
					<a href="#">
						<img src="../wp-content/themes/video-match/img/soc-icons/Facebook.svg" alt="">
					</a>
					<a href="#">
						<img src="../wp-content/themes/video-match/img/soc-icons/Gmail.svg" alt="">
					</a>

				</div>
			</div>
		</div>
		<div class="copyright">
			<span>©Copyright 2023 VideoMatch.</span>
		</div>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
<?php session_start(); ?>
<?php get_header(); 
?>
<main>
<ul class="tabs">
        <li class="tab-link active" data-tab="login">Login</li>
        <li class="tab-link" data-tab="register">Register</li>
    </ul>
    <?php get_template_part('function/login'); ?>
    <?php get_template_part('function/register'); ?>
</main>

<?php
get_sidebar();
get_footer();
?>




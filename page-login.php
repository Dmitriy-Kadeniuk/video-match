<?php session_start(); ?>
<?php get_header(); 
?>
<main class="register">
    <section>
    <h1>Welcome Back !</h1>
    </section>
    <section >
<ul class="tabs" style="display:none;">
        <li class="tab-link active" data-tab="login">Login</li>
        <li class="tab-link" data-tab="register">Register</li>
    </ul>
    <?php get_template_part('function/login'); ?>
    <?php get_template_part('function/register'); ?>
    </section>
</main>

<?php
get_sidebar();
get_footer();
?>





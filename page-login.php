<?php session_start(); ?>
<?php get_header(); 
?>
<main class="register">

    <section>
        <h1>Welcome Back !</h1>
        <img src="../wp-content/themes/video-match/img/login/Ellipse 1.svg" alt="">
    </section>

    
    <section >
        <ul class="tabs" style="display:none;">
            <li class="tab-link active" data-tab="login">Login</li>
            <li class="tab-link" data-tab="register">Register</li>
        </ul>
        <?php get_template_part('function/login'); ?>
        <?php get_template_part('function/register'); ?>
        <img src="../wp-content/themes/video-match/img/login/Ellipse 2.svg" alt="">
    </section>

    </div>

</main>

<?php
get_sidebar();
get_footer();
?>





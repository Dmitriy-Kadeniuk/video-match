<?php session_start();
 get_header(); 
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
        <?php 
        include get_template_directory() . '/function/login.php';
        include get_template_directory() . '/function/register.php';        
        ?>
        <img src="../wp-content/themes/video-match/img/login/Ellipse 2.svg" alt="">
    </section>

    </div>

</main>

<?php
get_sidebar();
get_footer();
?>





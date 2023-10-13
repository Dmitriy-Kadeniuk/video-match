<?php session_start(); ?>
<?php get_header(); 
?>
<main class="Seting">
    <h1>Settings</h1>
    
    <?php get_template_part('function/search-users'); ?>
    <?php get_template_part('function/rename'); ?>


    </div>

</main>

<?php
get_sidebar();
get_footer();
?>










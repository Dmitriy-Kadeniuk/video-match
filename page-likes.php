<?php
get_header();
?>

<main id="primary" class="site-main">
    <div id="movie-container">
        <div class="movie-card">
            <img src="" alt="Movie Poster" id="movie-poster">
            <h1 id="movie-title"></h1>
            <i class="fas fa-info-circle"></i>
            <p id="movie-overview"></p>
        </div>
        <div class="navigation-swipe">
            <button id="close-button">❌</button>
            <button id="like-button">💓</button>
            
        </div>
    </div>
    
    <?php get_template_part('function/likes'); ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>
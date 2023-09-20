<?php
get_header();
?>

<main id="primary" class="site-main">
    <div id="movie-container">
        <div class="movie-card">
            <img src="" alt="Movie Poster" id="movie-poster">
            <h2 id="movie-title"></h2>
            <p id="movie-overview"></p>
        </div>
        <div class="navigation-swipe">
            <button id="close-button">Хуйня</button>
            <button id="like-button">Збс</button>
        </div>
    </div>
    

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>
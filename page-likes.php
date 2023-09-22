<?php
get_header();
?>
<main id="primary" class="site-main">


    <form method="POST"  action="" name="send-form" id="send-form">
    <div id="movie-container">
        <div class="movie-card">
            <img src="" alt="Movie Poster" id="movie-poster">
            <h1 id="movie-title"></h1>
            <input  id="movie_id" name="movie_id" value></input>
            <i class="fas fa-info-circle"></i>
            <p id="movie-overview"></p>
        </div>
        
    </div>

    </form>
    <div class="navigation-swipe">
            <button id="close-button">❌</button>
            <button id="like-button" name="send-form" >💓</button>
            
        </div>
    
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>
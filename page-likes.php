<<<<<<< HEAD
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
=======
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
            <button id="close-button">Хуйня</button>
            <button id="like-button">Збс</button>
            
        </div>
    </div>
    

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
>>>>>>> b5964a3070cc6c6b8bb2b0f4ad6ad9b2f0a1fa25
?>
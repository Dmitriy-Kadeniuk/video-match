<?php
get_header();
?>
<main id="primary" class="site-main">


<form method="POST" action="" name="send-form" id="send-form">
        <div id="movie-container">
            <div class="img-film">
                <img src="" alt="Movie Poster" id="movie-poster">
                <input type="hidden" id="movie_id" name="movie_id" value="">
                <div class="overview">
                    <i class="fas fa-info-circle"></i>
                    <p id="movie-overview"></p>
                </div>
            </div>
            <h1 id="movie-title"></h1>
        </div>

    </form>

    <div class="navigation-swipe">
        <div id="close-button"><img src="../wp-content/themes/video-match/img/dis.svg" alt=""></div>
        <div id="like-button" name="send-form"><img src="../wp-content/themes/video-match/img/like.svg" alt=""></div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </div>
</main>

<?php
get_sidebar();
get_footer();
?>
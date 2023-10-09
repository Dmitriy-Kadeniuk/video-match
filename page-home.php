<?php
get_header();
?>

<main id="primary" class="site-main">
    <div class="container">
        <div id="filmCarousel" class="carousel slide" data-ride="carousel">
            <!-- Слайди фільмів будуть тут -->
            <div class="carousel-inner">
                <!-- Перший слайд буде тут -->

            </div>
            <ol class="carousel-indicators">
                <li data-target="#filmCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#filmCarousel" data-slide-to="1"></li>
                <li data-target="#filmCarousel" data-slide-to="2"></li>
            </ol>

        </div>
        <!-- <div class="film-container">
      
        </div>
        <div id="movies-container">
       
         </div> -->

    </div>
    </div>
    <div class="all-film">
        <h2>
            The Most Trending Now
        </h2>
        <div id="allFilmCarousel" class="carousel slide" data-ride="carousel">
            <!-- Слайди фільмів будуть тут -->
            <div class="carousel-inner">
                <!-- Перший слайд буде тут -->

            </div>
            <ol class="carousel-indicators" id="indicatorsList">
                <!-- Індикатори будуть додані за допомогою JavaScript -->
            </ol>

        </div>
    </div>
    <div id="wrapper-films">
        <div class="popular-film">
            <h2>
                Popular Films
            </h2>
            <div id="popularFilmCarousel" class="carousel slide" data-ride="carousel">
                <!-- Слайди фільмів будуть тут -->
                <div class="carousel-inner">
                    <!-- Перший слайд буде тут -->

                </div>

                <!-- HTML-код для стрілок вперед та назад -->
                <div class="carousel-controls">
                    <a class="carousel-control-prev" href="#popularFilmCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#popularFilmCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
        <h1>
            ---------------------------------------<br>
            ТУТ БУДЕ БЛОК Search movies by category<br>
            ---------------------------------------
        </h1>
        <div class="serials">
            <h2>
                Popular TV series
            </h2>
            <div id="serialsFilmCarousel" class="carousel slide" data-ride="carousel">
                <!-- Слайди фільмів будуть тут -->
                <div class="carousel-inner">
                    <!-- Перший слайд буде тут -->

                </div>

                <!-- HTML-код для стрілок вперед та назад -->
                <div class="carousel-controls">
                    <a class="carousel-control-prev" href="#serialsFilmCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#serialsFilmCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>

    </div>
    <div class="everywhere">
        <div class="everywhere-container">
            <div class="everywhere-container__watch">
                <h3>Watch everywhere</h3>
                <div class="description">
                    <h5>You can find everything related to movies here. Be without limited. You can browse anywhere on your phone, tablet, laptop. You can be flexible. You can also use our app offline.<h5>
                    <button class="lets-start btn"><a href="#">Let’s start</a></button>
                </div>
            </div>
            <div class="everywhere-container__img">
                <img src="../wp-content/themes/video-match/img/Mockup.svg" alt="">
            </div>
        </div>

    </div>
</main><!-- #main -->


<?php
get_sidebar();
get_footer();
?>
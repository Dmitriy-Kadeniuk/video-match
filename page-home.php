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
    </div>
</main><!-- #main -->


<?php
get_sidebar();
get_footer();
?>
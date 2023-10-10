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
        <div class="all-sliders">
            <div class="slider">
                <!-- Ваші слайди будуть тут -->
            </div>

        </div>
    </div>

    <div id="wrapper-films">
        <div class="popular-film">
            <h2>
                Popular Films
            </h2>
            <div class="all-sliders">
                <div class="slider1">
                    <!-- Ваші слайди будуть тут -->
                </div>
                <div class="navigation">
                    <div class="prev1">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <path d="M84 108a3.988 3.988 0 0 1-2.828-1.172l-40-40a3.997 3.997 0 0 1 0-5.656l40-40c1.563-1.563 4.094-1.563 5.656 0s1.563 4.094 0 5.656L49.656 64l37.172 37.172a3.997 3.997 0 0 1 0 5.656A3.988 3.988 0 0 1 84 108z" fill="currentColor" opacity="1" data-original="#000000" />
                            </g>
                        </svg>
                    </div>
                    <div class="next1">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <path d="M42.7 29.6 26.2 13.1l-2.4-2.4c-1.8-1.8-4.7 1-2.8 2.8L37.5 30l.9.9-15 15-2.3 2.3c-1.8 1.8 1 4.7 2.8 2.8l16.4-16.4 2.3-2.3c.9-.6.9-1.9.1-2.7z" fill="currentColor" opacity="1" data-original="#000000" />
                            </g>
                        </svg>
                    </div>
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
            <div class="all-sliders">
                <div class="slider2">
                    <!-- Ваші слайди будуть тут -->
                </div>
                <div class="navigation">
                    <div class="prev2">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 128 128" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <path d="M84 108a3.988 3.988 0 0 1-2.828-1.172l-40-40a3.997 3.997 0 0 1 0-5.656l40-40c1.563-1.563 4.094-1.563 5.656 0s1.563 4.094 0 5.656L49.656 64l37.172 37.172a3.997 3.997 0 0 1 0 5.656A3.988 3.988 0 0 1 84 108z" fill="currentColor" opacity="1" data-original="#000000" />
                            </g>
                        </svg>
                    </div>
                    <div class="next2">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve">
                            <g>
                                <path d="M42.7 29.6 26.2 13.1l-2.4-2.4c-1.8-1.8-4.7 1-2.8 2.8L37.5 30l.9.9-15 15-2.3 2.3c-1.8 1.8 1 4.7 2.8 2.8l16.4-16.4 2.3-2.3c.9-.6.9-1.9.1-2.7z" fill="currentColor" opacity="1" data-original="#000000" />
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="everywhere">
        <div class="everywhere-container">
            <div class="everywhere-container__watch">
                <h3>
                    Looking for a movie night?
                </h3>
                <div class="description">
                    <h5>On our website, you'll find movies for every taste, and that's not all! Invite your friend, enter their ID in the settings, and choose movies together. All the ones that match will appear on the <a href="/match"> Match!</a>
                    </h5>
                    <button class="lets-start btn"><a href="/likes">Let’s start</a></button>
                </div>
            </div>
            <div class="everywhere-container__img">
                <img src="../wp-content/themes/video-match/img/Mockup.svg" alt="">
            </div>
        </div>

    </div>
    <!-- Підключення бібліотеки Slick Carousel (після jQuery) -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Ваш JavaScript-код -->

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>
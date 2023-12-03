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
        <div id="close-button"><img src="../wp-content/themes/video-match/img/dis.svg" alt="">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve">
                <g>
                    <path fill="#eb423f" d="M24.266 176c.089-56 49.25-96 104-96A103.714 103.714 0 0 1 224 144l-23.734 48L264 240l-80 56 72 56-31.734 80S24 344 24.266 176z" opacity="1" data-original="#eb423f" />
                    <path fill="#eb423f" d="m287.785 432 24.292-88L240 296l80.086-48L264 192l24-48a103.9 103.9 0 0 1 95.888-64C438.7 80 487.915 120 488 176c.266 176-200.215 256-200.215 256z" opacity="1" data-original="#eb423f" />
                    <g fill="#c7312e">
                        <path d="M150.67 180.8a8 8 0 0 1-11.2 1.6l-29.14-21.85-25.36 5.07 18.16 30.26a8 8 0 0 1-13.72 8.24l-24-40a7.992 7.992 0 0 1-.57-7.09l14.27-35.67-15.77-19.7c-.13-.16-.25-.33-.36-.49a104.967 104.967 0 0 1 13.64-8.52L94.51 115a8 8 0 0 1 1.18 7.97l-10.51 26.29 25.52-5.1a7.97 7.97 0 0 1 6.37 1.44l32 24a8.005 8.005 0 0 1 1.6 11.2zM465.85 273.22c-2.3 4.81-4.76 9.51-7.33 14.09-.14-.05-.28-.11-.42-.17l-53.62-23.83a7.995 7.995 0 0 1-3.9-10.89L421 211.58l-40.84-20.42a8 8 0 0 1 7.15-14.32l48 24a8.017 8.017 0 0 1 3.58 10.74l-20.26 40.51 45.97 20.43a8.017 8.017 0 0 1 1.25.7z" fill="#c7312e" opacity="1" data-original="#c7312e" />
                    </g>
                </g>
            </svg>


        </div>
        <div id="like-button" name="send-form">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve">
                <defs>
                    <linearGradient id="red-blue" x1="49.31" x2="24.76" y1="66.41" y2="6.03" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#053BA3" />
                        <stop offset="1" stop-color="#ff0000" />
                    </linearGradient>
                </defs>
                <g>
                    <path fill="url(#red-blue)" d="M58.92 22.3A14.9 14.9 0 0 0 45.72 9 15.08 15.08 0 0 0 34 12.7a20.89 20.89 0 0 0-2 2.2 20.89 20.89 0 0 0-2-2.2 15 15 0 0 0-20 22.4l16 16.4.1.1A8.58 8.58 0 0 0 32 54a8.41 8.41 0 0 0 5.9-2.4l.1-.1 16-16.4a15.05 15.05 0 0 0 4.92-12.8z" data-name="Layer 1" opacity="1" data-original="url(#a)" />
                </g>
            </svg>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    </div>
</main>

<?php
get_sidebar();
get_footer();
?>
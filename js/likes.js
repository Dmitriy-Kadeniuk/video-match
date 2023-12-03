$(document).ready(function() {
    $("#like-button").click(function(event) {
        event.preventDefault();

        // Получаем movieId при каждом клике на кнопку
        let movieId = document.getElementById('movie_id').value;
        console.log("movieId до клика на кнопку:", movieId);

        $.ajax({
            type: "POST",
            url: "/wp-content/themes/video-match/function/likes.php",
            data: { movie_id: movieId },
            success: function(response) {
                console.log("Фильм добавлен в избранное.");
            },
            error: function(error) {
                console.error("Произошла ошибка: " + error);
            }
        });
    });
});

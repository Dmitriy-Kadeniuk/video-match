$(document).ready(function() {
    $("#like-button").click(function(event) {
        event.preventDefault();

        let movieid = $("#movie_id").val();
        console.log("movieId:", movieid);

        let data = {
            movie_id: movieid
        };

        $.ajax({
            type: "POST",
            url: "/wp-content/themes/video-match/function/likes.php",
            data: data,
            success: function(response) {
                console.log("Фильм добавлен в избранное.");
            },
            error: function(error) {
                console.error("Произошла ошибка: " + error);
            }
        });
    });
});
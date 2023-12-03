$(document).ready(function() {
    $("#like-button").click(function(event) {
        event.preventDefault();

        // Получаем значение movie_id из элемента с id "movie_id"
        let movieid = $("#movie_id").val();
        console.log("movieId:", movieid); // Проверьте, что это значение не undefined или пустое

        // Создаем объект данных для отправки на сервер
        let data = {
            movie_id: movieid
        };

        // Отправляем данные формы на сервер с использованием AJAX
        // Тут делаеться Аякс запрос к серверу с передачей данных
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

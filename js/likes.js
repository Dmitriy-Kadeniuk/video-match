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
            url: "/wp-content/themes/video-match/function/likes.php", // Полный путь к вашему обработчику PHP
            data: data,
            success: function(response) {
                // Обработка успешного ответа от сервера (например, обновление части страницы)
                console.log("Фильм добавлен в избранное.");

                // Вместо этой строки вы можете выполнить любое действие, которое вам нужно
                // Например, обновить список избранных фильмов без перезагрузки страницы
            },
            error: function(error) {
                // Обработка ошибок
                console.error("Произошла ошибка: " + error);
            }
        });
    });
});

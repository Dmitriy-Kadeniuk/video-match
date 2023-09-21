<?php
// Проверка, была ли отправлена форма с кнопкой "Like"
if (isset($_POST['like-button'])) {
    // Получаем id фильма, который пользователь лайкнул
    $movie_id = $_POST['movie_id'];

    // Получаем id текущего пользователя (из сессии или откуда-либо еще)
    $user_id = $_SESSION['user_id'];

    // Подключение к базе данных
    $mysql = new mysqli("localhost", "root", "root", "local");
    $mysql->query("SET NAMES 'UTF8'");

    // Выполняем вставку в таблицу user_likes
    $insert_query = "INSERT INTO user_likes (user_id, movie_id) VALUES ('$user_id', '$movie_id')";

    if ($mysql->query($insert_query)) {
        // Успешно добавили лайк, можно отправить какой-то ответ клиенту
        echo "Фильм добавлен в избранное.";
    } else {
        // Обработка ошибки
        echo "Ошибка: " . $mysql->error;
    }

    // Закрытие соединения с базой данных
    $mysql->close();
}
?>
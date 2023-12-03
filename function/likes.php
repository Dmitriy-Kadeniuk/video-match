<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $movie_id = $_POST['movie_id'];

    $connection = mysqli_connect("localhost", "root", "root", "local");

    if (!$connection) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }

    $query = "INSERT INTO user_likes (user_id, movie_id) VALUES ('$user_id', '$movie_id')";

    if (mysqli_query($connection, $query)) {
        echo "Фильм добавлен в избранное.";
    } else {
        echo "Ошибка: " . mysqli_error($connection);
    }

    error_log("Movie ID received: " . $movie_id);

    mysqli_close($connection);
} else {
    echo "Ошибка: Пользователь не авторизован.";
}

?>

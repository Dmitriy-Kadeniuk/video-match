<?php session_start(); ?>
<ul class="wishlist">
    <?php
    // Подключение к базе данных
    $connection = mysqli_connect("localhost", "root", "root", "local");

    // Проверка подключения
    if (!$connection) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }

    // user_id вашего авторизованного пользователя
    $user_id = $_SESSION['user_id'];

    // SQL-запрос для выбора всех movie_id для данного user_id
    $query = "SELECT movie_id FROM user_likes WHERE user_id = '$user_id'";

    // Выполнение запроса
    $result = mysqli_query($connection, $query);

    if ($result) {
        // Выводим movie_id в виде списка <li>
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li class='wishlist-movie'>{$row['movie_id']}</li>";
        }
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
    }

    // Закрытие соединения с базой данных
    mysqli_close($connection);
    ?>
</ul>

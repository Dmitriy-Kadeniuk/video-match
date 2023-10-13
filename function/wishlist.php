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
            $movie_id = $row['movie_id'];

            // Виконуємо запит до  API, щоб отримати інформацію про фільм за його ID
            $api_key = "19cc2d55ec287216302aaf07144d9835";
            $api_url = "https://api.themoviedb.org/3/movie/$movie_id?api_key=$api_key";

            // Виконуємо запит до API
            $api_response = file_get_contents($api_url);

            // Парсимо відповідь API
            $api_data = json_decode($api_response, true);

            // Виводимо назву фільму, якщо вона доступна
            if (isset($api_data['title'])) {
                echo "<li class='wishlist-movie'>" . $api_data['title'] . "</li>";
            }
        }
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
    }

    // Закрытие соединения с базой данных
    mysqli_close($connection);
    ?>
</ul>
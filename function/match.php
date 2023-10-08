<ul>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];
	}

// Подключение к базе данных
$connection = mysqli_connect("localhost", "root", "root", "local");

// Проверка подключения
if (!$connection) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// Пользователь 1 и 2
$user1_id = $user_id;
$user2_id = 12;

// SQL-запрос для получения муви ID для пользователя 1
$query1 = "SELECT movie_id FROM user_likes WHERE user_id = '$user1_id'";

// SQL-запрос для получения муви ID для пользователя 2
$query2 = "SELECT movie_id FROM user_likes WHERE user_id = '$user2_id'";

// Выполнение запросов
$result1 = mysqli_query($connection, $query1);
$result2 = mysqli_query($connection, $query2);

if ($result1 && $result2) {
    // Создаем массивы для хранения муви ID каждого пользователя
    $user1_movies = [];
    $user2_movies = [];

    // Заполняем массивы муви ID
    while ($row = mysqli_fetch_assoc($result1)) {
        $user1_movies[] = $row['movie_id'];
    }

    while ($row = mysqli_fetch_assoc($result2)) {
        $user2_movies[] = $row['movie_id'];
    }

    // Находим муви ID, которые совпадают у обоих пользователей
    $common_movies = array_intersect($user1_movies, $user2_movies);

    // Выводим совпадающие муви ID
    echo "Совпадающие муви ID у пользователей $user1_id и $user2_id: ";
    foreach ($common_movies as $movie_id) {
        echo "<li class='wishlist-movie'>$movie_id</li>";
    }
} else {
    echo "Ошибка при выполнении запросов: " . mysqli_error($connection);
}

// Закрытие соединения с базой данных
mysqli_close($connection);
?>
</ul>
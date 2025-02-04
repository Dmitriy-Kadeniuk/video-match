<ul>
    <?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }

    $connection = mysqli_connect("MySQL-8.2", "root", "", "local");

    if (!$connection) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }

    $user1_id = $user_id;
    $user2_id = 12;

    $query1 = "SELECT movie_id FROM user_likes WHERE user_id = '$user1_id'";

    $query2 = "SELECT movie_id FROM user_likes WHERE user_id = '$user2_id'";

    $result1 = mysqli_query($connection, $query1);
    $result2 = mysqli_query($connection, $query2);

    if ($result1 && $result2) {
        $user1_movies = [];
        $user2_movies = [];

        while ($row = mysqli_fetch_assoc($result1)) {
            $user1_movies[] = $row['movie_id'];
        }

        while ($row = mysqli_fetch_assoc($result2)) {
            $user2_movies[] = $row['movie_id'];
        }

        $common_movies = array_intersect($user1_movies, $user2_movies);

        echo "Спільні фільми у користувачів $user1_id та $user2_id: ";
        echo "<ul>";

        foreach ($common_movies as $movie_id) {
            $api_key = "19cc2d55ec287216302aaf07144d9835";
            $api_url = "https://api.themoviedb.org/3/movie/$movie_id?api_key=$api_key";

            $api_response = file_get_contents($api_url);

            $api_data = json_decode($api_response, true);

            if (isset($api_data['title'])) {
                echo "<li class='wishlist-movie'>" . $api_data['title'] . "</li>";
            }
        }

        echo "</ul>";
        // // Выводим совпадающие муви ID
        // echo "Совпадающие муви ID у пользователей $user1_id и $user2_id: ";
        // foreach ($common_movies as $movie_id) {
        //     echo "<li class='wishlist-movie'>$movie_id</li>";
        // }
    } else {
        echo "Ошибка при выполнении запросов: " . mysqli_error($connection);
    }

    mysqli_close($connection);
    ?>
</ul>
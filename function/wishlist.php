<?php session_start(); ?>
<div class="container">
    <h2>Your wishlist</h2>
    <div class="wishlist">

        <?php
        $connection = mysqli_connect("localhost", "root", "", "project-film");

        if (!$connection) {
            die("Ошибка подключения к базе данных: " . mysqli_connect_error());
        }

        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        } else {
            $user_id = "0";
            echo "<span>Что бы просмотреть информацию, ввойдите в систему</span>";
        }

        $query = "SELECT movie_id FROM user_likes WHERE user_id = '$user_id'";

        $result = mysqli_query($connection, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $movie_id = $row['movie_id'];

                $api_key = "19cc2d55ec287216302aaf07144d9835";
                $api_url = "https://api.themoviedb.org/3/movie/$movie_id?api_key=$api_key";

                $api_response = file_get_contents($api_url);

                $api_data = json_decode($api_response, true);

                if (isset($api_data['title'])) {
                    echo "<div class='wishlist-movie' id='$movie_id'>";
                    echo "<div class='img-film'>";
                    $poster_path = isset($api_data['poster_path']) ? $api_data['poster_path'] : '';
                    echo "<img class='film-image' src='https://image.tmdb.org/t/p/w500{$poster_path}' alt='Movie Poster'>";

                    echo "<div class='description'>";
                    echo "<h1>{$api_data['title']}</h1>";

                    $release_date = isset($api_data['release_date']) ? date('Y', strtotime($api_data['release_date'])) : '';
                    echo "<h5>{$release_date}</h5>";
                    echo "</div>";

                    echo "</div>";
                    echo "</div>";
                }
            }
        } else {
            echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
        }

        mysqli_close($connection);
        ?>
    </div>
</div>
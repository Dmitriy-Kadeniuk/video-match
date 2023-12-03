<?php session_start(); ?>
<ul class="wishlist">
    <?php
    $connection = mysqli_connect("localhost", "root", "root", "local");
    
    if (!$connection) {
        die("Ошибка подключения к базе данных: " . mysqli_connect_error());
    }

if(isset($_SESSION['user_id'])){
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
                echo "<li class='wishlist-movie' id = ".$movie_id.">" . $api_data['title'] . "</li>";
                
            }
        }
    } else {
        echo "Ошибка при выполнении запроса: " . mysqli_error($connection);
    }

    mysqli_close($connection);
    ?>
</ul>

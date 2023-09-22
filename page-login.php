<<<<<<< HEAD
<?php session_start(); ?>
<?php get_header(); 
?>
<main>
<ul class="tabs">
        <li class="tab-link active" data-tab="login">Login</li>
        <li class="tab-link" data-tab="register">Register</li>
    </ul>
    <?php get_template_part('function/login'); ?>
    <?php get_template_part('function/register'); ?>
</main>

<?php
get_sidebar();
get_footer();
?>



=======
<?php session_start(); ?>
<?php get_header(); ?>
<main>
    <section>
        <h1>Login</h1>
        <form method="POST" action="">
            <input id="user_name" type="text" name="user_name" placeholder="Имя пользователя">
            <input id="user_password" type="password" name="user_password" placeholder="Пароль">
            <input type="submit" value="Войти">
        </form>
        <?php
            // Вывод сообщения об ошибке, если есть
            if (!empty($error_message)) {
                echo "<p>$error_message</p>";
            }
        ?>
    </section>
</main>



<?php

// Подключение к базе данных
$mysql = new mysqli("localhost", "root", "root", "local");
$mysql->query("SET NAMES 'UTF8'");

// Переменные для хранения введенных пользователем данных
$user_name = "";
$user_password = "";

// Переменная для сообщения об ошибке
$error_message = "";

// Проверка, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные, введенные пользователем
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];

    // Запрос к базе данных для проверки учетных данных
    $query = "SELECT * FROM users WHERE name = '$user_name' AND password = '$user_password'";
    $result = $mysql->query($query);

    // Проверяем, есть ли пользователь с такими данными
    if ($result->num_rows > 0) {
        // Учетные данные верны, пользователь аутентифицирован
        echo "Вы успешно вошли! <br>";
        echo $user_name;
        $login_successful = true; // Установите флаг успешной аутентификации
    } else {
        // Учетные данные неверны, выводим сообщение об ошибке
        $error_message = "Неверное имя пользователя или пароль.";
    }
}


// Ваш код для проверки имени пользователя и пароля

if ($login_successful) {
    $_SESSION['user_name'] = $user_name; // Сохраняем имя пользователя в сессии
}

// Закрытие соединения с базой данных
$mysql->close();
?>


>>>>>>> b5964a3070cc6c6b8bb2b0f4ad6ad9b2f0a1fa25

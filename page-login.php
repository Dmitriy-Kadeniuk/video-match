<?php session_start(); ?>
<?php get_header(); ?>
<main>
<ul class="tabs">
        <li class="tab-link active" data-tab="login">Login</li>
        <li class="tab-link" data-tab="register">Register</li>
    </ul>
    <section id="login" class="tab-content active">
        <h1>Login</h1>
        <form method="POST" action="">
            <input id="user_name" type="text" name="user_name" placeholder="Имя пользователя">
            <input id="user_password" type="password" name="user_password" placeholder="Пароль">
            <input type="submit" value="Send">
        </form>
        <?php
            // Вывод сообщения об ошибке, если есть
            if (!empty($error_message)) {
                echo "<p>$error_message</p>";
            }
        ?>
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
        }else{
            echo "Вы не авторизованы";
        }

        // Закрытие соединения с базой данных
        $mysql->close();
        ?>
    </section>
    <section id="register" class="tab-content">
        <h1>Register</h1>
        <form method="POST" action="">
            <input id="register_name" type="text" name="register_name" placeholder="name">
            <input id="register_email" type="email" name="register_email" placeholder="email">
            <input id="register_password" type="password" name="register_password" placeholder="password">
            <input type="submit" value="Send">
        </form>
        <?php
            $error_message = ""; // Инициализация переменной для сообщения об ошибке

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user_name = $_POST["register_name"];
                $user_email = $_POST["register_email"];
                $user_password = $_POST["register_password"];

                // Создаем соединение с базой данных и выполняем запрос на вставку данных
                $mysql = new mysqli("localhost", "root", "root", "local");
                $mysql->query("SET NAMES 'UTF8'");
                $insert_query = "INSERT INTO users (name, password, email) VALUES ('$user_name', '$user_password', '$user_email')";


                if ($mysql->query($insert_query)) {
                    echo "Регистрация успешна.";
                } else {
                    $error_message = "Ошибка регистрации: " . $mysql->error;
                    echo $error_message; // Выводим сообщение об ошибке
                }
                
                $mysql->close();
            }
        ?>
    </section>
</main>
<script>
    document.addEventListener("DOMContentLoaded", function() {
    const tabLinks = document.querySelectorAll(".tab-link");
    const tabContents = document.querySelectorAll(".tab-content");

    tabLinks.forEach(link => {
        link.addEventListener("click", () => {
            // Удалите класс 'active' у всех табов и секций
            tabLinks.forEach(tab => tab.classList.remove("active"));
            tabContents.forEach(content => content.classList.remove("active"));

            // Добавьте класс 'active' только к выбранному табу и соответствующей секции
            const target = link.getAttribute("data-tab");
            document.querySelector(`#${target}`).classList.add("active");
            link.classList.add("active");
        });
    });
});
</script>






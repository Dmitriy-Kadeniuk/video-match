<?php session_start(); ?>
<?php get_header(); 
?>
<main>
<ul class="tabs">
        <li class="tab-link active" data-tab="login">Login</li>
        <li class="tab-link" data-tab="register">Register</li>
    </ul>
    <section id="login" class="tab-content active">
        <h1>Login</h1>
        <form method="POST" action="">
            <input id="user_name" type="text" name="user_name" placeholder="Имя пользователя" required>
            <input id="user_password" type="password" name="user_password" placeholder="Пароль" required>
            <input type="submit" value="Send">
        </form>
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
                $user_name = $_POST["user_name"] ?? null;
                $user_password = $_POST["user_password"] ?? null;

                // Запрос к базе данных для проверки учетных данных
                $query = "SELECT * FROM users WHERE name = '$user_name' AND password = '$user_password'";
                $result = $mysql->query($query);

                // Проверяем, есть ли пользователь с такими данными
                if ($result->num_rows > 0) {
                    // Учетные данные верны, пользователь аутентифицирован
                    $_SESSION['user_name'] = $user_name; // Сохраняем имя пользователя в сессии
                } else {
                    // Учетные данные неверны, выводим сообщение об ошибке
                    $error_message = "Неверное имя пользователя или пароль.";
                }
            }

            // Проверка сессии
            if (!isset($_SESSION['user_name'])) {
                // Пользователь не аутентифицирован
                echo "Вы не авторизованы";
            }else{
                echo $_SESSION['user_name'];
                echo "<br>Вы авторизованы";
            }

            // Закрытие соединения с базой данных
            $mysql->close();
        ?>
    </section>
    <section id="register" class="tab-content">
        <h1>Register</h1>
        <form method="POST" action="">
            <input id="register_name" type="text" name="register_name" placeholder="name" required>
            <input id="register_email" type="email" name="register_email" placeholder="email" required>
            <input id="register_password" type="password" name="register_password" placeholder="password" required>
            <input type="submit" value="Send">
        </form>
        <?php
            $error_message = ""; // Инициализация переменной для сообщения об ошибке

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user_name = $_POST["register_name"] ;
                $user_email = $_POST["register_email"] ;
                $user_password = $_POST["register_password"] ;

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

<?php
get_sidebar();
get_footer();
?>





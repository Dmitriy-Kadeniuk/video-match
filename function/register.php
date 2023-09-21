<?php
            $error_message = ""; // Инициализация переменной для сообщения об ошибке

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['register'])) {
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
            }
            
        ?>
        <section id="register" class="tab-content">
        <h1>Register</h1>
        <form method="POST" action="" name="register">
        <input id="register_name" type="text" name="register_name" placeholder="name" required>
        <input id="register_email" type="email" name="register_email" placeholder="email" required>
        <input id="register_password" type="password" name="register_password" placeholder="password" required>

            <input type="submit" value="register" name="register">
        </form>
        
    </section>
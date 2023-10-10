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
                    $register_successful= "Регистрация успешна.";
                    
                } else {
                    $error_message = "Ошибка регистрации: " . $mysql->error;
                    
                }
                $mysql->close();
            }   
            }
            
        ?>
        <section id="register" class="tab-content">
        <h1>Register</h1>
        <span>Just some details to get you in!</span>
        <form method="POST" action="" name="register">
        <input id="register_name" type="text" name="register_name" placeholder="Name" required>
        <input id="register_email" type="email" name="register_email" placeholder="Email" required>
        <input id="register_password" type="password" name="register_password" placeholder="Password" required>

            <input type="submit" value="register" name="register">
        </form>
        <ul class="tabs">
        <h4>Already Registered?</h4><li class="tab-link active" data-tab="login">Login</li>
        
    </ul>

    </section>
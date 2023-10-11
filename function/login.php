
        <section id="login" class="tab-content active">

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
                if (isset($_POST['login'])) {
                // Получаем данные, введенные пользователем
                $user_name = $_POST["user_name"] ?? null;
                $user_password = $_POST["user_password"] ?? null;

                // Запрос к базе данных для проверки учетных данных
                $query = "SELECT * FROM users WHERE name = '$user_name' AND password = '$user_password'";
                $result = $mysql->query($query);

                if ($result->num_rows > 0) {
                    // Учетные данные верны, пользователь аутентифицирован
                    $user_data = $result->fetch_assoc();
                    $_SESSION['user_name'] = $user_name; // Сохраняем имя пользователя в сессии
                    $_SESSION['user_id'] = $user_data['id'];  
               
                } else {
                    // Учетные данные неверны, выводим сообщение об ошибке
                    $error_message = "Неверное имя пользователя или пароль.";
                }
                
            }
            }

            

            // Закрытие соединения с базой данных
            $mysql->close();
        ?>
        <span class="authorized" <?php echo isset($_SESSION['user_name']) ? 'style="background-color: rgb(11, 145, 11);"' : 'style="background-color: rgb(172, 17, 6);"' ?>><?php // Проверка сессии
            if (!isset($_SESSION['user_name'])) {
                // Пользователь не аутентифицирован
                echo "Вы не авторизованы";
            }else{
                
                echo $_SESSION['user_name'];
                echo "<br>Вы авторизованы"; 
                    // После успешной аутентификации перенаправляем на главную страницу
                
            } ?></span>
        <h1>Login</h1>
        <span>Glad you’re back!</span>
        <form method="POST" action="" name="login">
            <input id="user_name" type="text" name="user_name" placeholder="Имя пользователя" required>
            <input id="user_password" type="password" name="user_password" placeholder="Пароль" required>
            <input type="submit" value="login" name="login">
        </form>
        <ul class="tabs">
        
        <h4>Don’t have an account ?</h4><li class="tab-link" data-tab="register">Register</li>
    </ul>
    </section>
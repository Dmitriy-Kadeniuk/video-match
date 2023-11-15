
        <section id="login" class="tab-content active">

        <?php
            $mysql = new mysqli("localhost", "root", "", "local");
            $mysql->query("SET NAMES 'UTF8'");

            $user_name = "";
            $user_password = "";
            $error_message = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['login'])) {
                $user_name = $_POST["user_name"];
                $user_password = $_POST["user_password"];

                $query = "SELECT * FROM users WHERE name = '$user_name' AND password = '$user_password'";
                $result = $mysql->query($query);

                if ($result->num_rows > 0) {
                    $user_data = $result->fetch_assoc();
                    $_SESSION['user_name'] = $user_name;
                    $_SESSION['user_id'] = $user_data['id'];  

               
                } else {
                    $error_message = "Неверное имя пользователя или пароль.";
                }
                
            }
            }

            

            $mysql->close();
        ?>
        <span class="authorized" <?php echo isset($_SESSION['user_name']) ? 'style="background-color: rgb(11, 145, 11);"' : 'style="background-color: rgb(172, 17, 6);"' ?>><?php // Проверка сессии
            if (!isset($_SESSION['user_name'])) {
                echo "Вы не авторизованы";
            }else{
                
                echo $_SESSION['user_name'];
                echo "<br>Вы авторизованы"; 
                
            } ?></span>
        <h1>Login</h1>
        <span>Glad you’re back!</span>
        <form method="POST" action="" name="login">
            <input id="user_name" type="text" name="user_name" placeholder="Имя пользователя" required>
            <input id="user_password" type="password" name="user_password" placeholder="Пароль" required>
            <input type="submit" value="Login" name="login">
        </form>
        <ul class="tabs">
        
        <h4>Don’t have an account ?</h4><li class="tab-link" data-tab="register">Register</li>
    </ul>
    </section>
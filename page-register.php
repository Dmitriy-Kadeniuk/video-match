<main>
    <section>
        <h1>Register</h1>
        <form method="POST" action="">
            <input id="register_name" type="text" name="register_name" placeholder="name">
            <input id="register_email" type="email" name="register_email" placeholder="email">
            <input id="register_password" type="password" name="register_password" placeholder="password">
            <input type="submit" value="Send">
        </form>
        <?php
            $error_message = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $user_name = $_POST["register_name"];
                $user_email = $_POST["register_email"];
                $user_password = $_POST["register_password"];

                $mysql = new mysqli("localhost", "root", "", "project-film");
                $mysql->query("SET NAMES 'UTF8'");
                $insert_query = "INSERT INTO users (name, password, email) VALUES ('$user_name', '$user_password', '$user_email')";


                if ($mysql->query($insert_query)) {
                    echo "Регистрация успешна.";
                } else {
                    $error_message = "Ошибка регистрации: " . $mysql->error;
                    echo $error_message; 
                }
                
                $mysql->close();
            }
        ?>
    </section>
    </div>
</main>

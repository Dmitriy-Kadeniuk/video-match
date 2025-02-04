<?php
session_start(); // Важно! Запускаем сессию

$connection = new mysqli("MySQL-8.2", "root", "", "local");
if ($connection->connect_error) {
    die("Ошибка подключения: " . $connection->connect_error);
}
$connection->set_charset("utf8");

$user_name = "";
$user_password = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    if (!empty($_POST["user_name"]) && !empty($_POST["user_password"])) {
        $user_name = $_POST["user_name"];
        $user_password = $_POST["user_password"];

        $query = $connection->prepare("SELECT * FROM users WHERE name = ? AND password = ?");
        $query->bind_param("ss", $user_name, $user_password);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $user_data = $result->fetch_assoc();
            $_SESSION['user_name'] = $user_name;
            $_SESSION['user_id'] = $user_data['id'];  
        } else {
            $error_message = "Неверное имя пользователя или пароль.";
        }

        $query->close();
    } else {
        $error_message = "Введите имя пользователя и пароль.";
    }
}

$connection->close();
?>

<section id="login" class="tab-content active">
    <span class="authorized" 
        <?php echo isset($_SESSION['user_name']) ? 'style="background-color: rgb(11, 145, 11);"' : 'style="background-color: rgb(172, 17, 6);"' ?>>
        <?php
        if (!isset($_SESSION['user_name'])) {
            echo "Вы не авторизованы";
        } else {
            echo $_SESSION['user_name'] . "<br>Вы авторизованы"; 
        }
        ?>
    </span>

    <h1>Login</h1>
    <span>Glad you’re back!</span>

    <?php if (!empty($error_message)): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>

    <form method="POST" action="" name="login">
        <input id="user_name" type="text" name="user_name" placeholder="Имя пользователя" required>
        <input id="user_password" type="password" name="user_password" placeholder="Пароль" required>
        <input type="submit" value="Login" name="login">
    </form>

    <ul class="tabs">
        <h4>Don’t have an account?</h4>
        <li class="tab-link" data-tab="register">Register</li>
    </ul>
</section>

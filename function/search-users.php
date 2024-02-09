<?php
session_start();

$mysql = new mysqli("localhost", "root", "", "film-match");
$mysql->query("SET NAMES 'UTF8'");

$found_user_id = "";
$found_user_name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["search_user"])) {
        $search_user_id = $_POST["search_user"];

        $query = "SELECT * FROM users WHERE id = $search_user_id";
        $result = $mysql->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $found_user_id = $row['id'];
            $found_user_name = $row['name'];
            $_SESSION['found_user_id'] = $found_user_id;
            $_SESSION['found_user_name'] = $found_user_name;
        } else {
            $found_user_id = 'User с таким ID не найден';
            $found_user_name = "";
            $_SESSION['found_user_id'] = $found_user_id;
        }
    }
}

if (isset($_SESSION['found_user_id'])) {
    $found_user_id = $_SESSION['found_user_id'];
}

if (isset($_SESSION['found_user_name'])) {
    $found_user_name = $_SESSION['found_user_name'];
}
?>

<section class="section_search_users">
    <h3>Search Users</h3>
    <h4>User:
        <?php echo esc_html($found_user_name); ?>
        <?php echo esc_html($found_user_id); ?>
    </h4>
    <form id="search_users" method="POST" action="" name="search_users">
        <label for="">Введите ID пользователя</label>
        <input type="text" name="search_user" placeholder="Введите ID пользователя"
            value="<?php echo $found_user_id ?>">
        <input type="submit" name="search_users" class="main-button">
    </form>
</section>

<?php
session_start();


$mysql = new mysqli("localhost", "root", "", "local");
$mysql->query("SET NAMES 'UTF8'");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rename_user"])) {
        $new_username = $_POST["rename_user"];
    
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
    
            echo "User ID: $user_id";
    
            $update_query = "UPDATE users SET name = ? WHERE id = ?";
            $stmt = $mysql->prepare($update_query);
    
            if ($stmt) {
                $stmt->bind_param("si", $new_username, $user_id);
                $stmt->execute();
    
                // После успешного выполнения запроса
                $_SESSION["name"] = $new_username;
    
                $stmt->close();
            } else {
                echo "Error in preparing statement: " . $mysql->error;
            }
        } else {
            echo "User ID not found in session";
        }
    }
    

?>

<section class="rename_account">
    <h3>Rename account</h3>
    <form method="POST" action="" name="rename">
        <label for="">Введите новое имя пользователя</label>
        <input type="text" name="rename_user" placeholder="Введите новое имя пользователя">
        <input type="submit" name="rename">
    </form>
</section>

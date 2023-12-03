<?php
session_start();


$mysql = new mysqli("localhost", "root", "root", "local");
$mysql->query("SET NAMES 'UTF8'");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rename_user"])) {
        $new_username = $_POST["rename_user"];
    
        if (isset($_SESSION["user_id"])) {
            $user_id = $_SESSION["user_id"];
        
            $update_query = "UPDATE users SET name = ? WHERE id = ?";
            $stmt = $mysql->prepare($update_query);
    
            if ($stmt) {
                $stmt->bind_param("si", $new_username, $user_id);
                $stmt->execute();
    
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
        <input type="submit" name="rename" class="main-button">
    </form>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    function updateUserInfo() {
        $.ajax({
            url: '/wp-content/themes/video-match/function/rename',
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                $('.user').html(response.html);
            },
            error: function(error) {
                console.log('Error updating user info:', error);
            }
        });
    }

});
</script>


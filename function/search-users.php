<?php
session_start();

$mysql = new mysqli("localhost", "root", "", "local");
$mysql->query("SET NAMES 'UTF8'");

$found_user = "";

$found_user = $_POST["search_user"];


?>


<section class="section_search_users">
        <h3>Search Users</h3>
        <form id="search_users" method="POST" action="" name="search_users">
        <label for="">Введите ID пользователя</label>
        <input type="text" name="search_user" placeholder="Введите ID пользователя" value="<?php echo $search_user_id; ?>">
        <input type="submit" name="search_users">
        </form>
        <script>
            $(document).ready(function() {
                let form = $('#search_users');

                form.on('submit', function(event) {
                    event.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: '/wp-content/themes/video-match/function/search-users.php',
                        data: form.serialize(),
                        success: function(response) {
                            $('#result').html(response);
                            console.log("Good");
                            
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            });

        </script>
</section>
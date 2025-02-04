<?php 
session_start();



?>



<section>
        <h3>Search Users</h3>
        <form id="search_users" method="POST" action="" name="search_users">
        <label for="">Введите ID пользователя</label>
        <input type="text" name="search_user" placeholder="Введите ID пользователя">
        <input type="submit" name="search_users">
        </form>
        <span>Найденный пользователь:</span>
        <script>
            $(document).ready(function() {
                let form = $('#search_users');

                form.on('submit', function(event) {
                    event.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: '../function/search-users.php', 
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
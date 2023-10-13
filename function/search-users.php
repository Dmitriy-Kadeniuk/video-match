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
             // Ждем, пока страница полностью загрузится
            $(document).ready(function() {
                // Находим вашу форму по id
                let form = $('#search_users');

                // Обрабатываем отправку формы
                form.on('submit', function(event) {
                    event.preventDefault(); // Предотвращаем стандартное поведение формы

                    // Отправляем данные формы на сервер с использованием Ajax
                    $.ajax({
                        type: 'POST', // Может быть GET или POST, в зависимости от ваших требований
                        url: '../function/search-users.php', // Укажите URL вашего серверного обработчика
                        data: form.serialize(), // Сериализуем данные формы
                        success: function(response) {
                            // Здесь вы можете обработать ответ от сервера
                            // Например, обновить определенную часть страницы
                            $('#result').html(response);
                            console.log("Good");
                        },
                        error: function(error) {
                            // Здесь вы можете обработать ошибку, если что-то пойдет не так
                            console.log(error);
                        }
                    });
                });
            });

        </script>
</section>
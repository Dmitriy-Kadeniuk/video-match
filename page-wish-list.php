<?php
get_header();
?>

<main id="primary" class="site-main">
  <h1>Список бажань</h1>
  <ul id="wishlist-container">
    <!-- Тут буде відображатися список обраних фільмів -->
  </ul>
</main><!-- #main -->

<?php
get_sidebar();
get_footer();
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
  // Отримуємо контейнер для відображення списку обраних фільмів
  const wishlistContainer = document.getElementById('wishlist-container');

  // Отримуємо збережений список обраних фільмів з localStorage
  const wishlist = JSON.parse(localStorage.getItem('wishlist')) || {};

  // Очищаємо контейнер перед відображенням обраного списку
  wishlistContainer.innerHTML = '';

  // Проходимося по ключам (ID фільмів) обраного об'єкту і відображаємо їх
  for (const movieKey in wishlist) {
    if (wishlist.hasOwnProperty(movieKey)) {
      const movie = wishlist[movieKey];
      
      // Створюємо елемент списку для фільму
      const listItem = document.createElement('li');
      listItem.textContent = movie.title; // Тут можна відобразити, наприклад, назву фільму

      // Додаємо елемент до контейнера
      wishlistContainer.appendChild(listItem);
    }
  }
});


</script>

const apiKey = '19cc2d55ec287216302aaf07144d9835';
const movieContainer = document.getElementById('movie-container');
const prevButton = document.getElementById('close-button');
const nextButton = document.getElementById('like-button');
const moviePoster = document.getElementById('movie-poster');
const movieTitle = document.getElementById('movie-title');
const filmOverview = document.getElementById('movie-overview');
const infoIcon = document.querySelector(".fas.fa-info-circle");

let currentPage = 0;
let movies = [];

function fetchMovies() {
  fetch(`https://api.themoviedb.org/3/trending/movie/day?api_key=${apiKey}`)
    .then(function (resp) {
      return resp.json();
    })
    .then(function (data) {
      movies = data.results;
      showMovie(currentPage);
    })
    .catch(function (error) {
      console.error('Помилка запиту:', error);
    });
}

function showMovie(index) {
  const movie = movies[index];
  if (movie) {
    moviePoster.src = `https://image.tmdb.org/t/p/w500/${movie.poster_path}`;
    movieTitle.textContent = movie.title;
    filmOverview.textContent = movie.overview;
  } else {
    // Якщо досягнута кінцева карточка фільму
    moviePoster.src = '';
    movieTitle.textContent = 'Кінець фільмів';
    filmOverview.textContent = '';
  }
}

// prevButton.addEventListener('click', function () {
//   if (currentPage > 0) {
//     currentPage--;
//     showMovie(currentPage);
//   }
// });

prevButton.addEventListener('click', function () {
  // Генеруємо випадковий індекс для обраного фільму
  const randomIndex = Math.floor(Math.random() * movies.length);

  // Переключаємо на випадковий фільм
  showMovie(randomIndex);
});

// nextButton.addEventListener('click', function () {
//   if (currentPage < movies.length - 1) {
//     currentPage++;
//     showMovie(currentPage);
//   }
// });
// Оголосіть змінну для збереження списку обраних фільмів
let wishlist = [];

// При кліку на кнопку "Вподобати"
nextButton.addEventListener('click', function () {
  if (currentPage < movies.length - 1) {
    const selectedMovie = movies[currentPage];

    // Додаємо обраний фільм до списку обраного
    wishlist.push(selectedMovie);

    // Зберігаємо оновлений список обраного фільмів в localStorage
    localStorage.setItem('wishlist', JSON.stringify(wishlist));

    // Перемикаємо до наступного фільму
    currentPage++;
    showMovie(currentPage);
  }
});




fetchMovies();


let isInfoVisible = false;
      //  появление инфо
      filmOverview.style.transition = "opacity 0.5s ease";
      filmOverview.style.opacity = 0;
      filmOverview.style.display = "none";

      infoIcon.addEventListener("click", function () {
        if (filmOverview.style.opacity === "0") {
          setTimeout(() => {
            filmOverview.style.opacity = 1;
          }, 10);

          filmOverview.style.display = "block";
          infoIcon.classList.remove("fa-info-circle"); // Видаляємо клас "fa-info-circle"
          infoIcon.classList.add("fa-times"); // Додаємо клас "fa-times" (знак "закрити")
          isInfoVisible = true;
        } else {
          // Якщо <p> відображається, ховаємо його
          filmOverview.style.opacity = 0;

          setTimeout(() => {
            filmOverview.style.display = "none";
          }, 500);
          infoIcon.classList.remove("fa-times"); // Видаляємо клас "fa-times"
          infoIcon.classList.add("fa-info-circle"); // Додаємо клас "fa-info-circle" (знак інформації)
          isInfoVisible = false;
        }
      });

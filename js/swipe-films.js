// const apiKey = '19cc2d55ec287216302aaf07144d9835';
// const movieContainer = document.getElementById('movie-container');
// const prevButton = document.getElementById('close-button');
// const nextButton = document.getElementById('like-button');
// const moviePoster = document.getElementById('movie-poster');
// const movieTitle = document.getElementById('movie-title');
// const movieid = document.getElementById('movie_id');
// const filmOverview = document.getElementById('movie-overview');
// const infoIcon = document.querySelector(".fas.fa-info-circle");

// let currentPage = 0;
// let movies = [];

// function fetchMovies() {
//   fetch(`https://api.themoviedb.org/3/trending/movie/day?api_key=${apiKey}`)
//     .then(function (resp) {
//       return resp.json();
//     })
//     .then(function (data) {
//       movies = data.results;
//       showMovie(currentPage);
//     })
//     .catch(function (error) {
//       console.error('Помилка запиту:', error);
//     });
// }

// function showMovie(index) {
//   const movie = movies[index];
//   if (movie) {
//     moviePoster.src = `https://image.tmdb.org/t/p/w500/${movie.poster_path}`;
//     movieTitle.textContent = movie.title;

//     document.getElementById('movie_id').value = movie.id;
//     movieid.textContent = movie.id;

//     filmOverview.textContent = movie.overview;
//   } else {
//     // Якщо досягнута кінцева карточка фільму
//     moviePoster.src = '';
//     movieTitle.textContent = 'Кінець фільмів';
//     filmOverview.textContent = '';
//   }
// }

// prevButton.addEventListener('click', function () {
//   // Генеруємо випадковий індекс для обраного фільму
//   const randomIndex = Math.floor(Math.random() * movies.length);

//   // Переключаємо на випадковий фільм
//   showMovie(randomIndex);
// });

// nextButton.addEventListener('click', function () {
//   if (currentPage < movies.length - 1) {
//     currentPage++;
//     showMovie(currentPage);
//   }
// });

// fetchMovies();


// let isInfoVisible = false;
//       //  появление инфо
//       filmOverview.style.transition = "opacity 0.5s ease";
//       filmOverview.style.opacity = 0;
//       filmOverview.style.display = "none";

//       infoIcon.addEventListener("click", function () {
//         if (filmOverview.style.opacity === "0") {
//           setTimeout(() => {
//             filmOverview.style.opacity = 1;
//           }, 10);

//           filmOverview.style.display = "block";
//           infoIcon.classList.remove("fa-info-circle"); // Видаляємо клас "fa-info-circle"
//           infoIcon.classList.add("fa-times"); // Додаємо клас "fa-times" (знак "закрити")
//           isInfoVisible = true;
//         } else {
//           // Якщо <p> відображається, ховаємо його
//           filmOverview.style.opacity = 0;

//           setTimeout(() => {
//             filmOverview.style.display = "none";
//           }, 500);
//           infoIcon.classList.remove("fa-times"); // Видаляємо клас "fa-times"
//           infoIcon.classList.add("fa-info-circle"); // Додаємо клас "fa-info-circle" (знак інформації)
//           isInfoVisible = false;
//         }
//       });

    






const movieContainer = document.getElementById('movie-container');
const prevButton = document.getElementById('close-button');
const nextButton = document.getElementById('like-button');
const moviePoster = document.getElementById('movie-poster');
const movieTitle = document.getElementById('movie-title');
const movieid = document.getElementById('movie_id'); // Оголошення змінної movieid
const filmOverview = document.getElementById('movie-overview');
const infoIcon = document.querySelector(".fas.fa-info-circle");
const baseUrl = "https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&language=en-US";
const options = {
  method: "GET",
  headers: {
    accept: "application/json",
    Authorization:  "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkNmUwODg2NWMxMDZhMmQxNjczMjExNTU3YzAwZjJhOCIsInN1YiI6IjY1MjUwNzc4Y2Y0YjhiMDExYzU5ZDU2YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.HqnsyhV5Kgvy8nw5NbKDb_HIHQvqFnO8qtL_zU5qY4g",
  },
};
const totalMovies = 500; // Змінено з totalPages на totalMovies
let movieCounter = 0; // Лічильник фільмів
let movies = []; // Масив для зберігання фільмів

const fetchMovies = async () => {
  let allMovies = [];

  while (movieCounter < totalMovies) {
    const response = await fetch(`${baseUrl}&page=${allMovies.length + 1}`, options);
    const data = await response.json();
    const newMovies = data.results;
    
    if (newMovies.length === 0) {
      // Якщо більше немає фільмів для завантаження, вийдемо з циклу
      break;
    }
    
    allMovies = [...allMovies, ...newMovies];
    movieCounter += newMovies.length;
  }console.log(allMovies)


  allMovies.sort((a, b) => b.popularity - a.popularity);
  movies = allMovies;
  showMovie(0);
};

fetchMovies().catch(function (error) {
  console.error("Произошла ошибка:", error);
});

function showMovie(index) {
  const movie = movies[index];
  if (movie) {
    moviePoster.src = `https://image.tmdb.org/t/p/w500/${movie.poster_path}`;
    movieTitle.textContent = movie.title;
    movieid.textContent = movie.id;

    document.getElementById('movie_id').value = movie.id;
    movieid.textContent = movie.id;
    console.log(movie.id)

    filmOverview.textContent = movie.overview;
  } else {
    moviePoster.src = '';
    movieTitle.textContent = 'Кінець фільмів';
    filmOverview.textContent = '';
  }
}

prevButton.addEventListener('click', function () {
  const randomIndex = Math.floor(Math.random() * movies.length);

  // Переключаємо на випадковий фільм
  showMovie(randomIndex);
});

function likeMovie(){
  let movieid = document.getElementById("movie_id").value;
  console.log("movieId:", movieid);


  let data = {
      movie_id: movieid
  };

  $.ajax({
      type: "POST",
      url: "/wp-content/themes/video-match/function/likes.php",
      data: data,
      success: function(response) {
          console.log("Фильм добавлен в избранное.");
      },
      error: function(error) {
          console.error("Произошла ошибка: " + error);
      }
  });
};
nextButton.addEventListener('click', function () {

  likeMovie();
  const randomIndex1 = Math.floor(Math.random() * movies.length);

  // Переключаємо на випадковий фільм
  showMovie(randomIndex1);
});


let isInfoVisible = false;

filmOverview.style.transition = "opacity 0.5s ease";
filmOverview.style.opacity = 0;
filmOverview.style.display = "none";
moviePoster.style.filter = "brightness(100%)";
moviePoster.style.transition = "filter 0.5s ease"; 

infoIcon.addEventListener("click", function () {
  if (filmOverview.style.opacity === "0") {
    setTimeout(() => {
      filmOverview.style.opacity = 1;
      moviePoster.style.filter = "brightness(50%)";
    }, 10);

    filmOverview.style.display = "block";
    infoIcon.classList.remove("fa-info-circle");
    infoIcon.classList.add("fa-times");
    isInfoVisible = true;
  } else {
    filmOverview.style.opacity = 0;
    moviePoster.style.filter = "brightness(100%)";

    setTimeout(() => {
      filmOverview.style.display = "none";
    }, 500);
    infoIcon.classList.remove("fa-times");
    infoIcon.classList.add("fa-info-circle");
    isInfoVisible = false;
  }
});







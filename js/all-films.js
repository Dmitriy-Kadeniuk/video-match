// document.addEventListener("DOMContentLoaded", function () {
//   const allFilmCarousel = document.getElementById("allFilmCarousel");
//   const carouselInner = allFilmCarousel.querySelector(".carousel-inner");

//   const options = {
//     method: 'GET',
//     headers: {
//       accept: 'application/json',
//       Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkNmUwODg2NWMxMDZhMmQxNjczMjExNTU3YzAwZjJhOCIsInN1YiI6IjY1MjUwNzc4Y2Y0YjhiMDExYzU5ZDU2YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.HqnsyhV5Kgvy8nw5NbKDb_HIHQvqFnO8qtL_zU5qY4g'
//     }
//   };

//   const baseUrl = 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US';
//   const totalPages = 30;

//   const fetchMovies = async () => {
//     let allMovies = [];

//     for (let page = 1; page <= totalPages; page++) {
//       const response = await fetch(`${baseUrl}&page=${page}`, options);
//       const data = await response.json();
//       allMovies = [...allMovies, ...data.results];
//     }

//     carouselInner.innerHTML = "";
//     addFilmsToCarousel(allMovies);

//     const imgFilmElements = document.querySelectorAll(".img-film");

//     imgFilmElements.forEach((imgFilm) => {
//       imgFilm.addEventListener("mouseover", () => {
//         const description = imgFilm.querySelector(".description");
//         description.style.bottom = "0";
//       });

//       imgFilm.addEventListener("mouseout", () => {
//         const description = imgFilm.querySelector(".description");
//         description.style.bottom = "-100%";
//       });
//     });
//     // Отримання кількості фільмів і слайдів після завантаження даних
//     const totalFilms = allMovies.length;
//     const filmsPerSlide = 8;
//     const totalSlides = Math.ceil(totalFilms / filmsPerSlide);

//     // Отримання елементу для індикаторів
//     // const indicatorsList = document.getElementById("indicatorsList");

//     // // Створення індикаторів для кожного слайду
//     // for (let i = 0; i < totalSlides; i++) {
//     //   const indicator = document.createElement("li");
//     //   indicator.setAttribute("data-target", "#allFilmCarousel");
//     //   indicator.setAttribute("data-slide-to", i);

//     //   if (i === 0) {
//     //     indicator.classList.add("active");
//     //   }

//     //   indicatorsList.appendChild(indicator);
//     // }
//   };

//   fetchMovies().catch(function (error) {
//     console.error("Произошла ошибка:", error);
//   });

//   function addFilmsToCarousel(films) {
//     let startIndex = 0;
//     const filmsPerSlide = 6;

//     while (startIndex < films.length) {
//       const slide = document.createElement("div");
//       slide.classList.add("carousel-item");

//       const filmContainer = document.createElement("div");
//       filmContainer.classList.add("view-films");

//       for (let i = startIndex; i < startIndex + filmsPerSlide; i++) {
//         if (i >= films.length) {
//           break;
//         }

//         const film = films[i];
//         const filmDiv = createFilmElement(film);
//         filmContainer.appendChild(filmDiv);
//       }

//       slide.appendChild(filmContainer);

//       if (startIndex === 0) {
//         slide.classList.add("active");
//       }

//       startIndex += filmsPerSlide;

//       carouselInner.appendChild(slide);
//     }
//   }

//   function createFilmElement(film) {
//     const imgFilmDiv = document.createElement("div");
//     imgFilmDiv.classList.add("img-film");

//     const filmImg = document.createElement("img");
//     filmImg.classList.add("film-image");
//     filmImg.src = `https://image.tmdb.org/t/p/w500${film.poster_path}`;
//     imgFilmDiv.appendChild(filmImg);

//     // Создайте блок description внутри img-film
//     const descriptionContainer = document.createElement("div");
//     descriptionContainer.classList.add("description");

//     const filmName = document.createElement("h1");
//     filmName.textContent = film.title;
//     descriptionContainer.appendChild(filmName);

//     const releaseDate = document.createElement("h5");
//     const releaseDateFormatted = new Date(film.release_date);
//     releaseDate.textContent = `${releaseDateFormatted.getFullYear()}`;
//     descriptionContainer.appendChild(releaseDate);

//     imgFilmDiv.appendChild(descriptionContainer);

//     const allFilmContainer = document.createElement("div");
//     allFilmContainer.classList.add("all-film-container");
//     allFilmContainer.appendChild(imgFilmDiv);

//     return allFilmContainer;
//   }
// });

document.addEventListener("DOMContentLoaded", function () {
  const slider = document.querySelector(".all-films-slider");

  const options = {
    method: "GET",
    headers: {
      accept: "application/json",
      Authorization:
        "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkNmUwODg2NWMxMDZhMmQxNjczMjExNTU3YzAwZjJhOCIsInN1YiI6IjY1MjUwNzc4Y2Y0YjhiMDExYzU5ZDU2YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.HqnsyhV5Kgvy8nw5NbKDb_HIHQvqFnO8qtL_zU5qY4g",
    },
  };

  const baseUrl =
    "https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US";
  const totalPages = 10;

  const fetchMovies = async () => {
    let allMovies = [];

    for (let page = 1; page <= totalPages; page++) {
      const response = await fetch(`${baseUrl}&page=${page}`, options);
      const data = await response.json();
      allMovies = [...allMovies, ...data.results];
    }

    addFilmsToCarousel(allMovies);
  };

  fetchMovies().catch(function (error) {
    console.error("Произошла ошибка:", error);
  });

  function addFilmsToCarousel(films) {
    // Перемішування масиву фільмів у випадковому порядку
    films = shuffleArray(films);
  
    films.forEach((film) => {
      const slide = document.createElement("div");
      slide.classList.add("img-film");
  
      const filmImg = document.createElement("img");
      filmImg.classList.add("film-image");
      filmImg.src = `https://image.tmdb.org/t/p/w500${film.poster_path}`;
      slide.appendChild(filmImg);
  
      const descriptionContainer = document.createElement("div");
      descriptionContainer.classList.add("description");
  
      const filmName = document.createElement("h1");
      filmName.textContent = film.title;
      descriptionContainer.appendChild(filmName);
  
      const releaseDate = document.createElement("h5");
      const releaseDateFormatted = new Date(film.release_date);
      releaseDate.textContent = `${releaseDateFormatted.getFullYear()}`;
      descriptionContainer.appendChild(releaseDate);
  
      slide.appendChild(descriptionContainer);
  
      slider.appendChild(slide);
    });
  
    // Ініціалізація Slick Carousel
    $(".all-films-slider").slick({
      slidesToShow: 6,
      slidesToScroll: 5,
      prevArrow: $(".prev"),
      nextArrow: $(".next"),
      autoplay: true,
      autoplaySpeed: 5000,
    });
  }
  
  // Функція для перемішування масиву випадковим чином
  function shuffleArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
  }
  
});

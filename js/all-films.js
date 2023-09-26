// fetch(
//   "https://api.themoviedb.org/3/trending/movie/day?id=640146&api_key=19cc2d55ec287216302aaf07144d9835"
// )
//   .then(function (resp) {
//     return resp.json();
//   })
//   .then(function (data) {
//     console.log(data);

//     // контейнер, в котором будем отображать фильмы
//     const filmContainer = document.querySelector(".film-container");
//     filmContainer.addEventListener("mouseenter", function () {
//       filmContainer.style.animationPlayState = "paused";
//     });

//     filmContainer.addEventListener("mouseleave", function () {
//       filmContainer.style.animationPlayState = "running";
//     });

//     // Проходимся по результатам и создаем элементы для каждого фильма
//     data.results.forEach(function (film) {
//       // элемент для фильма
//       const filmDiv = document.createElement("div");
//       filmDiv.classList.add("tv-block");

//       // дополнительный div для изображения и описания
//       const filmContentDiv = document.createElement("div");
//       filmContentDiv.classList.add("film-content");

//       const filmImg = document.createElement("img");
//       filmImg.classList.add("film-image");
//       filmImg.src = `https://image.tmdb.org/t/p/w500${film.poster_path}`;

//       //  для описания фильма
//       const filmOverview = document.createElement("p");
//       filmOverview.textContent = film.overview;
//       //  иконка инфо
//       const infoIcon = document.createElement("i");
//       infoIcon.classList.add("fas", "fa-info-circle");
//       let isInfoVisible = false;
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

//       // Добавляем изображение, іконку та описание в дополнительный div
//       filmContentDiv.appendChild(filmImg);
//       filmContentDiv.appendChild(infoIcon); // Додаємо іконку
//       filmContentDiv.appendChild(filmOverview);

//       // Добавляем дополнительный div к элементу фильма
//       filmDiv.appendChild(filmContentDiv);

//       // заголовок для фильма
//       const filmName = document.createElement("h1");
//       filmName.textContent = film.title;

//       // Добавляем заголовок к элементу фильма
//       filmDiv.appendChild(filmName);

//       // элемент фильма к контейнеру
//       filmContainer.appendChild(filmDiv);
//     });

//     // Додайте кілька копій фільмів, щоб забезпечити безкінечний рух
//     const filmCopies = filmContainer.cloneNode(true);
//     filmContainer.appendChild(filmCopies);
//   })
//   .catch(function (error) {
//     console.error("Произошла ошибка:", error);
//   });

//   const mobileMenuButton = document.getElementById('mobile-menu-button');
// const mainNavigation = document.getElementById('site-navigation');

// mobileMenuButton.addEventListener('click', function () {
//     mainNavigation.classList.toggle('active');
// });

// const API_KEY = "d416e56a-1401-449e-850d-d3e686c437a8";
// const BASE_URL = "https://kinopoiskapiunofficial.tech/api/v2.2/films/top?type=TOP_250_BEST_FILMS&page=";

// async function getAllMovies() {
//   const allMovies = [];

//   for (let page = 1; page <= 13; page++) { // 13 страниц по 20 фильмов на странице = 260 фильмов (чтобы учесть все 250)
//     const url = BASE_URL + page;

//     const resp = await fetch(url, {
//       headers: {
//         "Content_Type": "application/json",
//         "X-API-KEY": API_KEY,
//       },
//     });

//     const respData = await resp.json();
//     allMovies.push(...respData.films);
//   }

//   console.log(allMovies); // Все 250 фильмов
// }

// getAllMovies();

// document.addEventListener("DOMContentLoaded", function () {
//   // Отримання елемента каруселі за його id
//   const allFilmCarousel = document.getElementById("allFilmCarousel");

//   // Отримання контейнера для слайдів
//   const carouselInner = allFilmCarousel.querySelector(".carousel-inner");

//   // Отримання фільмів з APIs
//   fetch(
//     "https://api.themoviedb.org/3/trending/movie/day?id=640146&api_key=19cc2d55ec287216302aaf07144d9835"
//   )
//     .then(function (resp) {
//       return resp.json();
//     })
//     .then(function (data) {
//       // Очищаємо вміст слайдера перед додаванням нових фільмів
//       carouselInner.innerHTML = "";

//       // Додавання всіх фільмів до слайдера
//       addFilmsToCarousel(data.results);

//       console.log(data.results);

//       // Отримання кількості фільмів і слайдів після завантаження даних
//       const totalFilms = data.results.length;
//       const filmsPerSlide = 8;
//       const totalSlides = Math.ceil(totalFilms / filmsPerSlide);

//       // Отримання елементу для індикаторів
//       const indicatorsList = document.getElementById("indicatorsList");

//       // Створення індикаторів для кожного слайду
//       for (let i = 0; i < totalSlides; i++) {
//         const indicator = document.createElement("li");
//         indicator.setAttribute("data-target", "#allFilmCarousel");
//         indicator.setAttribute("data-slide-to", i);

//         if (i === 0) {
//           indicator.classList.add("active");
//         }

//         indicatorsList.appendChild(indicator);
//       }

//     })
//     .catch(function (error) {
//       console.error("Произошла ошибка:", error);
//     });

//   // Функція для додавання фільмів до каруселі
//   function addFilmsToCarousel(films) {
//     // Задайте початковий індекс та кількість фільмів на слайд
//     let startIndex = 0;
//     const filmsPerSlide = 8;

//     // Створення слайдів з фільмами
//     while (startIndex < films.length) {
//       const slide = document.createElement("div");
//       slide.classList.add("carousel-item");

//       // Створення контейнера для фільмів у слайді
//       const filmContainer = document.createElement("div");
//       filmContainer.classList.add("view-films");

//       // Додавання фільмів до контейнера
//       for (let i = startIndex; i < startIndex + filmsPerSlide; i++) {
//         if (i >= films.length) {
//           break; // Перервати цикл, якщо фільми закінчилися
//         }

//         const film = films[i];
//         const filmDiv = createFilmElement(film);
//         filmContainer.appendChild(filmDiv);
//       }

//       // Додавання контейнера фільмів до слайду
//       slide.appendChild(filmContainer);

//       // Додавання слайду до контейнера слайдів
//       carouselInner.appendChild(slide);

//       // Перший слайд буде активним
//       if (startIndex === 0) {
//         slide.classList.add("active");
//       }

//       // Збільшення індексу для наступного слайду
//       startIndex += filmsPerSlide;
//     }
//   }

//   function createFilmElement(film) {
//     // Створення контейнера для фільму
//     const filmDiv = document.createElement("div");
//     filmDiv.classList.add("all-film-container");

//     const imgContainer = document.createElement("div");
//     imgContainer.classList.add("img-film");
//     // Зображення фільму
//     const filmImg = document.createElement("img");
//     filmImg.classList.add("film-image");
//     filmImg.src = `https://image.tmdb.org/t/p/w500${film.poster_path}`;
//     imgContainer.appendChild(filmImg);

//     // Створення контейнера для опису фільму
//     const descriptionContainer = document.createElement("div");
//     descriptionContainer.classList.add("description");

//     // Назва фільму
//     const filmName = document.createElement("h3");
//     filmName.textContent = film.title;
//     descriptionContainer.appendChild(filmName);

//     // Дата виходу фільму
//     const releaseDate = document.createElement("p");
//     const releaseDateFormatted = new Date(film.release_date);
//     releaseDate.textContent = `${releaseDateFormatted.getFullYear()}`;
//     descriptionContainer.appendChild(releaseDate);

//     // Опис фільму
//     // const filmOverview = document.createElement("span");
//     // filmOverview.textContent = film.overview;
//     // descriptionContainer.appendChild(filmOverview);

//     // Додавання контейнера опису в контейнер фільму
//     filmDiv.appendChild(descriptionContainer);
//     filmDiv.appendChild(imgContainer);

//     return filmDiv;
//   }
// });
document.addEventListener("DOMContentLoaded", function () {
  const allFilmCarousel = document.getElementById("allFilmCarousel");
  const carouselInner = allFilmCarousel.querySelector(".carousel-inner");

  fetch(
    "https://api.themoviedb.org/3/trending/movie/day?id=640146&api_key=19cc2d55ec287216302aaf07144d9835"
  )
    .then(function (resp) {
      return resp.json();
    })
    .then(function (data) {
      carouselInner.innerHTML = "";
      addFilmsToCarousel(data.results);

      const imgFilmElements = document.querySelectorAll(".img-film");

      imgFilmElements.forEach((imgFilm) => {
        imgFilm.addEventListener("mouseover", () => {
          const description = imgFilm.querySelector(".description");
          description.style.bottom = "0";
        });

        imgFilm.addEventListener("mouseout", () => {
          const description = imgFilm.querySelector(".description");
          description.style.bottom = "-100%";
        });
      });
      // Отримання кількості фільмів і слайдів після завантаження даних
      const totalFilms = data.results.length;
      const filmsPerSlide = 8;
      const totalSlides = Math.ceil(totalFilms / filmsPerSlide);

      // Отримання елементу для індикаторів
      const indicatorsList = document.getElementById("indicatorsList");

      // Створення індикаторів для кожного слайду
      for (let i = 0; i < totalSlides; i++) {
        const indicator = document.createElement("li");
        indicator.setAttribute("data-target", "#allFilmCarousel");
        indicator.setAttribute("data-slide-to", i);

        if (i === 0) {
          indicator.classList.add("active");
        }

        indicatorsList.appendChild(indicator);
      }
    })
    .catch(function (error) {
      console.error("Произошла ошибка:", error);
    });

  function addFilmsToCarousel(films) {
    let startIndex = 0;
    const filmsPerSlide = 6;

    while (startIndex < films.length) {
      const slide = document.createElement("div");
      slide.classList.add("carousel-item");

      const filmContainer = document.createElement("div");
      filmContainer.classList.add("view-films");

      for (let i = startIndex; i < startIndex + filmsPerSlide; i++) {
        if (i >= films.length) {
          break;
        }

        const film = films[i];
        const filmDiv = createFilmElement(film);
        filmContainer.appendChild(filmDiv);
      }

      slide.appendChild(filmContainer);

      if (startIndex === 0) {
        slide.classList.add("active");
      }

      startIndex += filmsPerSlide;

      carouselInner.appendChild(slide);
    }
  }

  function createFilmElement(film) {
    const imgFilmDiv = document.createElement("div");
    imgFilmDiv.classList.add("img-film");

    const filmImg = document.createElement("img");
    filmImg.classList.add("film-image");
    filmImg.src = `https://image.tmdb.org/t/p/w500${film.poster_path}`;
    imgFilmDiv.appendChild(filmImg);

    // Создайте блок description внутри img-film
    const descriptionContainer = document.createElement("div");
    descriptionContainer.classList.add("description");

    const filmName = document.createElement("h1");
    filmName.textContent = film.title;
    descriptionContainer.appendChild(filmName);

    const releaseDate = document.createElement("h5");
    const releaseDateFormatted = new Date(film.release_date);
    releaseDate.textContent = `${releaseDateFormatted.getFullYear()}`;
    descriptionContainer.appendChild(releaseDate);

    imgFilmDiv.appendChild(descriptionContainer); // Поместите description в img-film

    // Затем создайте блок all-film-container и добавьте в него imgFilmDiv
    const allFilmContainer = document.createElement("div");
    allFilmContainer.classList.add("all-film-container");
    allFilmContainer.appendChild(imgFilmDiv);

    return allFilmContainer;
  }
});

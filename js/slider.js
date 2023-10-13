document.addEventListener("DOMContentLoaded", function () {
  // Отримання елемента каруселі за його id
  const filmCarousel = document.getElementById("filmCarousel");

  // Отримання контейнера для слайдів
  const carouselInner = filmCarousel.querySelector(".carousel-inner");

  // Отримання фільмів з API
  fetch(
    "https://api.themoviedb.org/3/trending/movie/day?id=640146&api_key=19cc2d55ec287216302aaf07144d9835"
  )
    .then(function (resp) {
      return resp.json();
    })
    .then(function (data) {
      // Очищаємо вміст слайдера перед додаванням нових фільмів
      carouselInner.innerHTML = "";

      // Сортування фільмів за датою у спадаючому порядку (найновіші фільми першими)
      const sortedFilms = data.results.sort((a, b) => {
        return new Date(b.release_date) - new Date(a.release_date);
      });

      // Вибір перших 6 фільмів
      const latestFilms = sortedFilms.slice(0, 6);

      // Додавання фільмів до слайдера
      addFilmsToCarousel(latestFilms);

      console.log(latestFilms);
    })
    .catch(function (error) {
      console.error("Произошла ошибка:", error);
    });

  // Функція для додавання фільмів до каруселі
  function addFilmsToCarousel(films) {
    // Створення слайдів з фільмами
    for (let i = 0; i < films.length; i += 2) {
      const film1 = films[i];
      const film2 = films[i + 1];

      // Створення елементів слайду
      const slide = document.createElement("div");
      slide.classList.add("carousel-item");

      // Створення контейнера для фільмів у слайді
      const filmContainer = document.createElement("div");
      filmContainer.classList.add("view-films");

      // Створення першого фільму у слайді
      const filmDiv1 = createFilmElement(film1);

      // Додавання першого фільму до контейнера
      filmContainer.appendChild(filmDiv1);

      // Створення другого фільму (якщо є)
      if (film2) {
        const filmDiv2 = createFilmElement(film2);

        // Додавання другого фільму до контейнера
        filmContainer.appendChild(filmDiv2);
      }

      // Додавання контейнера фільмів до слайду
      slide.appendChild(filmContainer);

      // Додавання слайду до контейнера слайдів
      carouselInner.appendChild(slide);

      // Перший слайд буде активним
      if (i === 0) {
        slide.classList.add("active");
      }
    }
  }

  function createFilmElement(film) {
    // Створення контейнера для фільму
    const filmDiv = document.createElement("div");
    filmDiv.classList.add("film-container-slide");

    const imgContainer = document.createElement("div");
    imgContainer.classList.add("img-film");
    // Зображення фільму
    const filmImg = document.createElement("img");
    filmImg.classList.add("film-image");
    filmImg.src = `https://image.tmdb.org/t/p/w500${film.poster_path}`;
    imgContainer.appendChild(filmImg);

    // Створення контейнера для опису фільму
    const descriptionContainer = document.createElement("div");
    descriptionContainer.classList.add("description");

    // Назва фільму
    const filmName = document.createElement("h1");
    filmName.textContent = film.title;
    descriptionContainer.appendChild(filmName);

    // Дата виходу фільму
    const releaseDate = document.createElement("p");
    const releaseDateFormatted = new Date(film.release_date);
    releaseDate.textContent = `Date Release: ${releaseDateFormatted.getDate()} ${getMonthName(
      releaseDateFormatted.getMonth()
    )} ${releaseDateFormatted.getFullYear()}`;
    descriptionContainer.appendChild(releaseDate);

    // Опис фільму
    const filmOverview = document.createElement("span");
    filmOverview.textContent = film.overview;
    descriptionContainer.appendChild(filmOverview);
    
    const maxWords = 65;
    const words = film.overview.split(" ");
    if (words.length > maxWords) {
      const trimmedText = words.slice(0, maxWords).join(" ") + " ...";
      filmOverview.textContent = trimmedText;
    }

    // Додавання контейнера опису в контейнер фільму
    filmDiv.appendChild(descriptionContainer);
    filmDiv.appendChild(imgContainer);

    return filmDiv;
  }
});
function getMonthName(monthNumber) {
  const months = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
  ];
  return months[monthNumber];
}

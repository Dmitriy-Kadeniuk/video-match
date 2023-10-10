

// добре  працює. старе апі ALL FILM
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

    imgFilmDiv.appendChild(descriptionContainer); 

    const allFilmContainer = document.createElement("div");
    allFilmContainer.classList.add("all-film-container");
    allFilmContainer.appendChild(imgFilmDiv);

    return allFilmContainer;
  }
});






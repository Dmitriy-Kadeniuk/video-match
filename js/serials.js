document.addEventListener("DOMContentLoaded", function () {
    const serialsFilmCarousel = document.getElementById("serialsFilmCarousel");
    const serialsCarouselInner = serialsFilmCarousel.querySelector(".carousel-inner");
  
    fetch(
      "https://api.themoviedb.org/3/discover/movie?sort_by=vote_count.desc&api_key=19cc2d55ec287216302aaf07144d9835"
    )
    .then(function (resp) {
        return resp.json();
      })
      .then(function (data) {
        serialsCarouselInner.innerHTML = "";
        const Serials = data.results;
  
        // Сортування фільмів за популярністю (від найпопулярніших до найменш популярних)
        Serials.sort((a, b) => b.vote_count - a.vote_count);
  
        // Повторення фільмів для додавання до наступних слайдів
        const totalSlides = 3; // Загальна кількість слайдів
        const duplicatedFilms = Serials.slice(0, 5 * totalSlides);
  
        // Додавання фільмів до слайдів
        addFilmsToCarousel(duplicatedFilms, serialsCarouselInner);
        console.log(duplicatedFilms);
        // Залишаю решту коду для індикаторів та подій миші такими ж, як у попередньому прикладі
      })
      .catch(function (error) {
        console.error("Произошла ошибка:", error);
      });
  
    // Функція для додавання фільмів до слайдів
  function addFilmsToCarousel(films, carouselInner) {
    let startIndex = 0;
    const filmsPerSlide = 5;

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
    allFilmContainer.classList.add("popular-film-container");
    allFilmContainer.appendChild(imgFilmDiv);

    return allFilmContainer;
  }
  });
  
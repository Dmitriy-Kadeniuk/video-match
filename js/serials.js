document.addEventListener("DOMContentLoaded", function () {
  const serialsFilmCarousel = document.getElementById("serialsFilmCarousel");
  const serialsCarouselInner = serialsFilmCarousel.querySelector(".carousel-inner");

  const options = {
    method: 'GET',
    headers: {
      accept: 'application/json',
      Authorization: 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkNmUwODg2NWMxMDZhMmQxNjczMjExNTU3YzAwZjJhOCIsInN1YiI6IjY1MjUwNzc4Y2Y0YjhiMDExYzU5ZDU2YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.HqnsyhV5Kgvy8nw5NbKDb_HIHQvqFnO8qtL_zU5qY4g'
    }
  };

  const baseUrl = 'https://api.themoviedb.org/3/discover/movie?sort_by=vote_count.desc&language=en-US';
  const totalPages = 3; // Замените на общее количество страниц, которое вам нужно получить

  const fetchMovies = async () => {
    let allMovies = [];

    for (let page = 1; page <= totalPages; page++) {
      const response = await fetch(`${baseUrl}&page=${page}`, options);
      const data = await response.json();
      allMovies = [...allMovies, ...data.results];
    }

    serialsCarouselInner.innerHTML = "";
    const Serials = allMovies;

    // Сортировка фильмов по количеству голосов (от наибольшего к наименьшему)
    Serials.sort((a, b) => b.vote_count - a.vote_count);

    // Повторение фильмов для добавления в следующие слайды
    const filmsPerSlide = 5;
    const duplicatedFilms = Serials.slice(0, filmsPerSlide * totalPages);
console.log(Serials)
    // Добавление фильмов в слайды
    addFilmsToCarousel(duplicatedFilms, serialsCarouselInner);
  };

  fetchMovies().catch(function (error) {
    console.error("Произошла ошибка:", error);
  });

  // Функция для добавления фильмов в слайды
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

    // Создание блока description внутри img-film
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

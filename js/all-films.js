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
      responsive: [
        {
          breakpoint: 1450,
          settings: {
            slidesToShow: 5,
            slidesToScroll: 4,
          },
        },
        {
          breakpoint: 1150,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 3,
          },
        },
        {
          breakpoint: 850,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 2,
          },
        },
        {
          breakpoint: 650,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 420,
          settings: {
            slidesToShow: 1.5,
            slidesToScroll: 1,
          },
        },
      ],
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

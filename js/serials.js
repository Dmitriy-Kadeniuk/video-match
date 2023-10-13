document.addEventListener("DOMContentLoaded", function () {
  const slider = document.querySelector(".serial-slider");

  const options = {
    method: "GET",
    headers: {
      accept: "application/json",
      Authorization:
        "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkNmUwODg2NWMxMDZhMmQxNjczMjExNTU3YzAwZjJhOCIsInN1YiI6IjY1MjUwNzc4Y2Y0YjhiMDExYzU5ZDU2YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.HqnsyhV5Kgvy8nw5NbKDb_HIHQvqFnO8qtL_zU5qY4g",
    },
  };

  const baseUrl =
    "https://api.themoviedb.org/3/discover/movie?sort_by=vote_count.desc&language=en-US";
  const totalPages = 1;

  const fetchMovies = async () => {
    let allMovies = [];

    for (let page = 1; page <= totalPages; page++) {
      const response = await fetch(`${baseUrl}&page=${page}`, options);
      const data = await response.json();
      allMovies = [...allMovies, ...data.results];
    }
    // Відсортувати фільми за полем "vote_count"
    allMovies.sort((a, b) => b.vote_count - a.vote_count);
    addFilmsToCarousel(allMovies);
    console.log(allMovies)
   
  };

  fetchMovies().catch(function (error) {
    console.error("Произошла ошибка:", error);
  });

  function addFilmsToCarousel(films) {
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
    $(".serial-slider").slick({
      slidesToShow: 6,
      slidesToScroll: 5,
      prevArrow: $(".prev2"),
      nextArrow: $(".next2"),
      autoplay: true,
      autoplaySpeed: 5000,
    });
  }
});
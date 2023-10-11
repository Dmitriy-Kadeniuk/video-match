const tabs = document.querySelectorAll(".tab");

tabs.forEach((tab) => {
  tab.querySelector(".tab-title").addEventListener("click", () => {
    tabs.forEach((t) => t.classList.remove("active"));
    tab.classList.add("active");

    const sliderContent = tab.querySelector(".slider-content");
    const loader = sliderContent.querySelector(".loader");
    const slider = sliderContent.querySelector(".action-slider");

    // Показуємо прелоадер
    loader.style.display = "block";
    slider.style.display = "none";

    setTimeout(() => {
      // Після 2 секунд приховуємо прелоадер і відображаємо слайдер
      loader.style.display = "none";
      slider.style.display = "block";
    }, 500);
  });
});
document.addEventListener("DOMContentLoaded", function () {
  // Функція для отримання даних з API та додавання їх до слайдера
  const populateSlider = (sliderClass, genreId) => {
    const slider = document.querySelector(`.${sliderClass}`);
    const options = {
      method: "GET",
      headers: {
        accept: "application/json",
        Authorization:
          "Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkNmUwODg2NWMxMDZhMmQxNjczMjExNTU3YzAwZjJhOCIsInN1YiI6IjY1MjUwNzc4Y2Y0YjhiMDExYzU5ZDU2YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.HqnsyhV5Kgvy8nw5NbKDb_HIHQvqFnO8qtL_zU5qY4g",
      },
    };
    const baseUrl = `https://api.themoviedb.org/3/discover/movie?sort_by=popularity.desc&language=en-US&with_genres=${genreId}`;
    const totalPages = 1;

    const fetchMovies = async () => {
      let allMovies = [];

      for (let page = 1; page <= totalPages; page++) {
        const response = await fetch(`${baseUrl}&page=${page}`, options);
        const data = await response.json();
        allMovies = [...allMovies, ...data.results];
      }
      // Відсортувати фільми за полем "popularity"
      allMovies.sort((a, b) => b.popularity - a.popularity);
      addFilmsToCarousel(allMovies, slider);
    };

    fetchMovies().catch(function (error) {
      console.error("Произошла ошибка:", error);
    });
  };

  // Функція для додавання фільмів до каруселі
  const addFilmsToCarousel = (films, slider) => {
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

    // Отримання класів prev та next для каруселі на основі класу слайдера
    const prevArrowClass = `prev-${slider.classList[1]}`;
    const nextArrowClass = `next-${slider.classList[1]}`;

    // Ініціалізація Slick Carousel для відповідного слайдера
    $(slider).slick({
      slidesToShow: 6,
      slidesToScroll: 5,
      prevArrow: `.${prevArrowClass}`,
      nextArrow: `.${nextArrowClass}`,
      autoplay: true,
      autoplaySpeed: 5000,
    });
    
  };

  // Виклик функції для кожного слайдера з відповідним genreId
  populateSlider("slider1", 28); // Action
  populateSlider("slider2", 35); // Comedy
  populateSlider("slider3", 18); // Drama
  populateSlider("slider4", 14); // Fantasy
  populateSlider("slider5", 27); // Horror
});

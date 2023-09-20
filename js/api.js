fetch(
  "https://api.themoviedb.org/3/trending/movie/day?id=640146&api_key=19cc2d55ec287216302aaf07144d9835"
)
  .then(function (resp) {
    return resp.json();
  })
  .then(function (data) {
    console.log(data);

    // контейнер, в котором будем отображать фильмы
    const filmContainer = document.querySelector(".film-container");

    // Проходимся по результатам и создаем элементы для каждого фильма
    data.results.forEach(function (film) {
      // элемент для фильма
      const filmDiv = document.createElement("div");
      filmDiv.classList.add("tv-block");

      // дополнительный div для изображения и описания
      const filmContentDiv = document.createElement("div");
      filmContentDiv.classList.add("film-content");

      const filmImg = document.createElement("img");
      filmImg.classList.add("film-image");
      filmImg.src = `https://image.tmdb.org/t/p/w500${film.poster_path}`;

      //  для описания фильма
      const filmOverview = document.createElement("p");
      filmOverview.textContent = film.overview;
      //  иконка инфо
      const infoIcon = document.createElement("i");
      infoIcon.classList.add("fas", "fa-info-circle");
      let isInfoVisible = false;
      //  появление инфо
      filmOverview.style.transition = "opacity 0.5s ease";
      filmOverview.style.opacity = 0;
      filmOverview.style.display = "none";

      infoIcon.addEventListener("click", function () {
        if (filmOverview.style.opacity === "0") {
          setTimeout(() => {
            filmOverview.style.opacity = 1;
          }, 10);

          filmOverview.style.display = "block";
          infoIcon.classList.remove("fa-info-circle"); // Видаляємо клас "fa-info-circle"
          infoIcon.classList.add("fa-times"); // Додаємо клас "fa-times" (знак "закрити")
          isInfoVisible = true;
        } else {
          // Якщо <p> відображається, ховаємо його
          filmOverview.style.opacity = 0;

          setTimeout(() => {
            filmOverview.style.display = "none";
          }, 500);
          infoIcon.classList.remove("fa-times"); // Видаляємо клас "fa-times"
          infoIcon.classList.add("fa-info-circle"); // Додаємо клас "fa-info-circle" (знак інформації)
          isInfoVisible = false;
        }
      });

      // Добавляем изображение, іконку та описание в дополнительный div
      filmContentDiv.appendChild(filmImg);
      filmContentDiv.appendChild(infoIcon); // Додаємо іконку
      filmContentDiv.appendChild(filmOverview);

      // Добавляем дополнительный div к элементу фильма
      filmDiv.appendChild(filmContentDiv);

      // заголовок для фильма
      const filmName = document.createElement("h1");
      filmName.textContent = film.title;

      // Добавляем заголовок к элементу фильма
      filmDiv.appendChild(filmName);

      // элемент фильма к контейнеру
      filmContainer.appendChild(filmDiv);
    });
  })
  .catch(function (error) {
    console.error("Произошла ошибка:", error);
  });


//   const mobileMenuButton = document.getElementById('mobile-menu-button');
// const mainNavigation = document.getElementById('site-navigation');

// mobileMenuButton.addEventListener('click', function () {
//     mainNavigation.classList.toggle('active');
// });

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

      // изображение для фильма
      const filmImg = document.createElement("img");
      filmImg.classList.add("film-image");
      filmImg.src = `https://image.tmdb.org/t/p/w500${film.poster_path}`;

      // обработчик события click к изображению
      filmImg.addEventListener("click", function () {
        filmImg.classList.toggle("rotated");
      });

      // элемент для описания фильма
      const filmOverview = document.createElement("p");
      filmOverview.textContent = film.overview;

      // Добавляем изображение и описание в дополнительный div
      filmContentDiv.appendChild(filmImg);
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

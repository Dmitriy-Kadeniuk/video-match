<?php session_start(); ?>
<?php get_header(); 
?>
<main class="register">
    <section>
    <h1>Welcome Back !</h1>
    </section>
    <section >
<ul class="tabs" style="display:none;">
        <li class="tab-link active" data-tab="login">Login</li>
        <li class="tab-link" data-tab="register">Register</li>
    </ul>
    <?php get_template_part('function/login'); ?>
    <?php get_template_part('function/register'); ?>
</div>
</main>

<script>
// const options = {
//   method: 'GET',
//   headers: {
//     accept: 'application/json',
//     Authorization:  'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJkNmUwODg2NWMxMDZhMmQxNjczMjExNTU3YzAwZjJhOCIsInN1YiI6IjY1MjUwNzc4Y2Y0YjhiMDExYzU5ZDU2YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.HqnsyhV5Kgvy8nw5NbKDb_HIHQvqFnO8qtL_zU5qY4g'
//   }
// };

// const baseUrl = 'https://api.themoviedb.org/3/discover/movie?include_adult=false&include_video=false&language=en-US&sort_by=popularity.desc';
// const totalPages = 10; // Замените на общее количество страниц, которое вам нужно получить

// const fetchMovies = async () => {
//   let allMovies = [];

//   for (let page = 1; page <= totalPages; page++) {
//     const response = await fetch(`${baseUrl}&page=${page}`, options);
//     const data = await response.json();
//     allMovies = [...allMovies, ...data.results];
//   }

//   console.log(allMovies);
// };

// fetchMovies().catch(err => console.error(err));

</script>
<?php
get_sidebar();
get_footer();
?>





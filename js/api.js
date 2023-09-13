fetch('https://api.themoviedb.org/3/trending/movie/day?id=640146&api_key=19cc2d55ec287216302aaf07144d9835')
.then(function (resp) {return resp.json()})
.then(function(data){
  console.log(data);
  document.querySelector('.name-film1').textContent = data.results[0]['title'];
  document.querySelector('.name-film2').textContent = data.results[1]['title'];
  document.querySelector('.name-film3').innerHTML = data.results[2]['title'];
  document.querySelector('.name-film4').textContent = data.results[3]['title'];
  document.querySelector('.name-film5').textContent = data.results[4]['title'];
  document.querySelector('.name-film6').textContent = data.results[5]['title'];
  document.querySelector('.name-film7').textContent = data.results[6]['title'];
  document.querySelector('.name-film8').textContent = data.results[7]['title'];
  document.querySelector('.name-film9').textContent = data.results[8]['title'];
  document.querySelector('.name-film10').textContent = data.results[9]['title'];
  document.querySelector('.name-film11').textContent = data.results[10]['title'];
  document.querySelector('.name-film12').textContent = data.results[11]['title'];
  document.querySelector('.name-film13').textContent = data.results[12]['title'];
  document.querySelector('.name-film14').textContent = data.results[13]['title'];
  document.querySelector('.name-film15').textContent = data.results[14]['title'];
  document.querySelector('.name-film16').textContent = data.results[15]['title'];
  document.querySelector('.name-film17').textContent = data.results[16]['title'];
  document.querySelector('.name-film18').textContent = data.results[17]['title'];

})
.catch(function(){

})
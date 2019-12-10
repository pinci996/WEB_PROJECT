 $(document).ready(() => {
  $("#searchForm").on('keyup', (e) => {
      e.preventDefault();
      let searchText = $("#searchText").val();
      getMovies(searchText);
     });
    });
   

  
  function getMovies(searchText){
    axios.get("https://api.themoviedb.org/3/search/movie?api_key=df657271e7d5e24f465ac7b76c109a91&language=en-US&page=1&query=" + searchText)
      .then(function (response) {
        let movies = response.data.results;
        let output = '';
        $.each(movies, (index, movie) => {
          output+=`
            <div class="col-md-3">
              <div class="well text-center">
                <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
                <h5>${movie.title}</h5>
                <h5>Rating: ${movie.vote_average}</h5>
                <a onclick="movieSelected('${movie.id}')" display:"inline-block" margin:"5px" class="btn btn-primary" href="#" >Movie Details</a>

                
              </div>
            </div>
            
          `;
        });
        $('#movies').html(output);
      })
      .catch(function (error) {
        console.log(error);
      });
  }
  
  function movieSelected(id){
    sessionStorage.setItem('movieId', id);
    window.location = 'movie.php';
    return false;
  }

  function addToWatchlist(poster){
    sessionStorage.setItem('moviePoster', poster);
    window.location = 'watchlist.php';
    return false;
  }
  
  function getMovie(){
    let movieId = sessionStorage.getItem('movieId');
    axios.get("https://api.themoviedb.org/3/movie/" + movieId + "?api_key=df657271e7d5e24f465ac7b76c109a91")
      .then(function (response) {
      let movie = response.data;
      
      let output = `
          <div class="row">
            <div class="col-md-4">
              <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" class="thumbnail">
            </div>
            <div class="col-md-8">
              <h2>${movie.title}</h2>
              <ul class="list-group">
                <li class="list-group-item"><strong>Genre:</strong> ${movie.genres[0].name}, ${movie.genres[1].name}</li>
                <li class="list-group-item"><strong>Released:</strong> ${movie.release_date}</li>
                <li class="list-group-item"><strong>Rated:</strong> ${movie.vote_average}</li>
                <li class="list-group-item"><strong>Runtime:</strong> ${movie.runtime} min.</li>
                <li class="list-group-item"><strong>Production Companies:</strong> ${movie.production_companies[0].name}</li>
                <li class="list-group-item"><strong>Popularity:</strong> ${movie.popularity} </li>
                <li class="list-group-item">
                <div class="star-rating">
                <input id="star-5" type="radio" name="rating" value="star-5">
                <label for="star-5" title="5 stars">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                </label>
                <input id="star-4" type="radio" name="rating" value="star-4">
                <label for="star-4" title="4 stars">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                </label>
                <input id="star-3" type="radio" name="rating" value="star-3">
                <label for="star-3" title="3 stars">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                </label>
                <input id="star-2" type="radio" name="rating" value="star-2">
                <label for="star-2" title="2 stars">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                </label>
                <input id="star-1" type="radio" name="rating" value="star-1">
                <label for="star-1" title="1 star">
                    <i class="active fa fa-star" aria-hidden="true"></i>
                </label>
                </div>
                </li>
              </ul>
              </div>
          </div>
          <div class="row">
            <div class="well">
              <h3>Plot</h3>
              ${movie.overview}
              <hr>
              <a href="http://imdb.com/title/${movie.imdb_id}" target="_blank" class="btn btn-primary">View IMDB</a>
              <a onclick="addToWatchlist('${movie.id}')" display:"inline-block" margin:"5px" class="btn btn-primary" href="#" >Add to Watchlist</a>
              <a href="index.php" class="btn btn-default">Go Back To Search</a>
              
            </div>
          </div>
          
      `;
      $('#movie').html(output);
      })
      .catch(function (error) {
        console.log(error);
      });
    }
   function getWatchlist(){
    let moviePoster = sessionStorage.getItem('moviePoster');
    axios.get("https://api.themoviedb.org/3/movie/" + moviePoster + "?api_key=df657271e7d5e24f465ac7b76c109a91")
      .then(function (response) {
      let movie = response.data;
      let output = '';
      output += `
          <div class="row">
          <div class="col-md-2">
            <div class="well text-center">
            <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}">
          </div>
          </div>
          </div>
            `;
          
      $('#movie').html(output);
      })
      .catch(function (error) {
        console.log(error);
      });
    }
  
  
  
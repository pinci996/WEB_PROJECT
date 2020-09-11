<!DOCTYPE html>
<html lang="en">
<head>
<style>
    body {
        background-image: url('https://ereimers-sound.com/wp-content/uploads/2014/05/Movie-theater-Dark1.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;
          }
</style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>About</title>
</head>
<body>
        <div id="main">
                <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#8625; Sign In</span> 
          <nav class="navbar navbar-default">
            <div class="container">
             <div class="navbar-header">
              <a class="navbar-brand" href="index.php">MovieSearch</a>
                <a class="navbar-brand" href="about.php">About</a>
                <a class="navbar-brand" href="watchlist.php">Watchlist</a>
                
              </div>
            </nav>
            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                                <form action="spoj.php" method="post">
                                  Username:<br>
                                  <input type="text" name="username" id="username" required>
                                  <br>
                                  Password:<br>
                                  <input type="password" name="lozinka" id="lozinka" required>
                                  <br><br>
                                  <input type="submit" value="Login">
                                </form> 
                                <button onclick="window.location.href='register.php'">Register</button>
                              </div>   
  <div class="container">
  <p>This is a little webpage that can help you find your favourite movies. It is not much but it is my first project in Web Programming so I am still getting used to.</p>
  <p>You can find source code of this project on <a href="https://github.com">Github.</a> </p>
  <p>Some of the pages I looked up to while I was making this project were: </p>
  <ul id="about">
      <li><a href="https://www.imdb.com" target="_blank">IMDB</a></li>
      <li><a href="https://www.metacritic.com" target="_blank">MetaCritic</a></li>
      <li><a href="https://www.rottentomatoes.com" target="_blank">Rotten Tomatoes</a></li>
      <li><a href="https://www.themoviedb.org" target="_blank">TMDb</a></li>
  </ul>

  </div>
  <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/side.js"></script>
  
</body>
</html>


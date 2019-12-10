<!DOCTYPE html>
<html>
  <head>
      <style>
          body {
              background-image: url('https://ereimers-sound.com/wp-content/uploads/2014/05/Movie-theater-Dark1.jpg');
              background-repeat: no-repeat;
              background-attachment: fixed;  
              background-size: cover;
                }
      </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/rate.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>MovieSearch</title>
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">MovieSearch</a>
          <a class="navbar-brand" href="about.php">About</a>
          <a class="navbar-brand" href="watchlist.php">Watchlist</a>
        </div>
      </div>
    </nav>
    <div id="main">
      <span style="font-size:20px;cursor:pointer" onclick="openNav()">&#8625; Sign In</span> 
    <div class="container">
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
                              
          <div id="sidebar-btn">
                <span></span>
                <span></span>
                <span></span>
              </div>
              
      </div>
      <div id="movie" class="well"></div>
      </div>
      
    <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/side.js"></script>
  <script>
    getMovie();
  </script>
  </body>
</html>
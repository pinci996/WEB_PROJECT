<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: about.php');
	exit();
}
?>
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
    <title>MovieSearch</title>
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
            <a class="navbar-brand" href="logout.php">Logout</a><a class="navbar-brand">Welcome back, <?=$_SESSION['name']?>!</a>
            
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
      <div class="jumbotron">
	    	<h3 class="text-center">Search For Any Movie</h3>
	    	<form id="searchForm">
	    		<input type="text" class="form-control" id="searchText" placeholder="Search Movies...">
	    	</form>
	    </div>
    </div>

    <div class="container">
      <div id="movies" class="row"></div>
    </div>
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

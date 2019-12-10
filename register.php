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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Movie Search</title>
    
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
                <div class="jumbotron">
                        <div class ="register">
                        <form action="" method="post" >
                                <label>Email :</label>
                                <input type="text" name="email" id="email" required width="48" height="48" /><br/><br />
                                <label>Username : </label>
                                <input type="text" name="username" id="username" required width="48" height="48"/><br/><br />
                                <label>Lozinka : </label>
                                <input type="password" name="lozinka" id="lozinka" required width="48" height="48"/><br/><br />
                                <input type="submit" value=" Register " /><br />
                                </form>
                </div>
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

<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'project';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if (!isset($_POST['email'], $_POST['username'], $_POST['lozinka'])) {
	// Could not get the data that should have been sent.
	die ('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['email']) || empty($_POST['username']) || empty($_POST['lozinka'])) {
	// One or more values are empty.
	die ('Please complete the registration form');
}
if ($stmt = $con->prepare('SELECT id, lozinka FROM korisnici WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
		if ($stmt = $con->prepare('INSERT INTO korisnici (email, username, lozinka) VALUES (?, ?, ?)')) {
                        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
                        
                        $stmt->bind_param('sss', $_POST['email'],$_POST['username'],$_POST['lozinka']);
                        $stmt->execute();
                        echo 'You have successfully registered, you can now login!';
                } else {
                        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
                        echo 'Could not prepare statement!';
                }
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
<?php
// Startar upp sessionen
session_start();

// Kontrollerar Adminbehörighet
if(!isset($_SESSION['status'])){
	header("Location: login/index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
 <title>LAB-2</title>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">LAB-2</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="#">Film</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="customer_create.php"><span class="glyphicon glyphicon-user"></span>Signup</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
	<div class="container" style="text-align:center;">
	 <div class="row">
		 <div class="col-sm-12">
			 <h1>Välkommen till skådespelare sida</h1>
			 <a href="skadespelare_read.php">Lägga till skådespelare</a></li>
   	 </div>
    </div>
   </div>
</body>
</html>

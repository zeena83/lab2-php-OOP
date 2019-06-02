<?php
/*
 * Lägger till ny kund
*/

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Lägga till ny kund?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
	$saveCustomer = saveCustomer($connection);

	header("Location: customer_read.php");
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
				<h1>Registera dig här</h1>
				<form action="customer_create.php" method="post">
				 <input type="hidden" name="isnew" id="isnew" value="1">

				    <label>Namn:</label>
				    <p><input type="text" name="txtName" placeholder="Ditt namn:"></p>

				    <label>E-post:</label>
				    <p><input type="email" name="txtEmail" placeholder="Din e-post:"></p>

				    <label>Lösenord:</label>
				    <p><input type="password" name="txtPassword" placeholder="Välj lösenord:"></p>

				    <p><input type="submit" value="Lägg till"></p>
				</form>
				<?php
				// Stänger databaskopplingen
				dbDisconnect($connection);
				?>
			</div>
		</div>
	</div>
</body>
</html>

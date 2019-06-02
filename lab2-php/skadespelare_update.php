<?php
/*
 * Visar alla skadespelare
*
*/

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/skadespelare_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();


// Skall skadespelare redigeras?
if(isset($_GET['editid']) && $_GET['editid'] > 0 ){
	$skadespelareData = getSkadespelareData($connection,$_GET['editid']);
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
					<h1>Uppdatera <?php echo $skadespelareData['skadespelareNamn']; ?></h1>
					<p><a href="skadespelare_read.php">Tillbaka</a></p>

					<form action="skadespelare_update.php" method="post">
				   	<input type="hidden" name="updateid" value="<?php echo $skadespelareData['skadespelareId']; ?>">

				    <label>Namn:</label>
				    <p><input type="text" name="skadespelareNamn" value="<?php echo $skadespelareData['skadespelareNamn']; ?>"></p>

				    <label>Din Ålder:</label>
				    <p><input type="text" name="skadespelareAlder" value="<?php echo $skadespelareData['skadespelareAlder']; ?>"></p>

						<label>Din Adress:</label>
				    <p><input type="text" name="skadespelareAdress" value="<?php echo $skadespelareData['skadespelareAdress']; ?>"></p>

				    <p><input type="submit" value="Uppdatera"></p>
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
	<?php
}

// Skall skadespelare uppdateras?
if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
	updateSkadespelare($connection);

	header("Location: skadespelare_update.php?editid=".$_POST['updateid']);
}
?>

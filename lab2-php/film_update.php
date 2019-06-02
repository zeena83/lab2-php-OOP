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
	$filmData = getFilm($connection,$_GET['editid']);
	?>
	<!DOCTYPE HTML>
	<html lang="sv">
	<head>
	<meta charset="utf-8" />
	<title>film - Uppdatera skadespelare</title>
	</head>

	<body>
	<h1>Uppdatera <?php echo $filmData['filmNamn']; ?></h1>
	<p><a href="film_read.php">Tillbaka</a></p>

	<form action="film_update.php" method="post">
	   	<input type="hidden" name="updateid" value="<?php echo $filmData['filmId']; ?>">

	    <label>Namn:</label>
	    <p><input type="text" name="filmNamn" value="<?php echo $filmData['filmNamn']; ?>"></p>

	    <p><input type="submit" value="Uppdatera"></p>
	</form>
	<?php
	// Stänger databaskopplingen
	dbDisconnect($connection);
	?>
	</body>
	</html>
	<?php
}

// Skall skadespelare uppdateras?
if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
	updateFilm($connection);

	header("Location: film_update.php?editid=".$_POST['updateid']);
}
?>

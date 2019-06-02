<?php
/*
 * Lägger till ny film
*/

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/skadespelare_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Lägga till ny skadespelare?
if(isset($_POST['isnew']) && $_POST['isnew'] == 1){
	$saveFilm = saveFilm($connection);

	header("Location: film_read.php");
}
?>
<!DOCTYPE HTML>
<html lang="sv">
<head>
<meta charset="utf-8" />
<title>skadespelare - Lägg till ny film</title>
</head>

<body>
<h1>Lägg till ny film</h1>

<form action="film_create.php" method="post">
 <input type="hidden" name="isnew" id="isnew" value="1">

    <label>Namn:</label>
    <p><input type="text" name="filmNamn" placeholder="Ditt namn:"></p>

    <p><input type="submit" value="Lägg till"></p>
</form>
<?php
// Stänger databaskopplingen
dbDisconnect($connection);
?>
</body>
</html>

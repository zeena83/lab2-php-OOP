<?php
/*
  * Visar alla film
*/

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/skadespelare_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Visar alla film
$allFilm = getAllFilm($connection);
?>
<!DOCTYPE HTML>
<html lang="sv">
<head>
<meta charset="utf-8" />
<title>film - Visa alla</title>
</head>

<body>
<h1>film</h1>
<p><a href="skadespelare_create.php">Lägg till ny film</a></p>

<ul>
<?php
	// Loopar genom arrayen som innehåller alla skadespelare i tabellen
    while($row = mysqli_fetch_array($allFilm)){
?>
 <li>
   <?php echo $row['filmId'];?>
   <?php echo $row['filmlNamn'];?>

   <a href="film_view.php?viewid=<?php echo $row['filmId'];?>">View</a>
   <a href="film_update.php?editid=<?php echo $row['filmId'];?>">Uppdatera</a>
   <a href="film_delete.php?deleteid=<?php echo $row['filmId'];?>">Delete</a>

 </li>
<?php
	}
?>
</ul>
<?php
// Stänger databaskopplingen
dbDisconnect($connection);
?>
</body>
</html>

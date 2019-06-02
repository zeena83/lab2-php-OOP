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
if(isset($_GET['viewFilmid']) && $_GET['viewfilmid'] > 0 ){
	$filmData = getFilmData($connection,$_GET['viewFilmid']);
	$filmSkadespelare = getSkadespelareByActorID($connection,$_GET['viewFilmid']);
}

// Skall skadespelare uppdateras?
// if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
// 	updateSkadespelare($connection);
//
// 	header("Location: skadespelare_update.php?editid=".$_POST['updateid']);
// }
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
<p><?php echo $filmData['filmId']; ?></p>
<p><?php echo $filmData['filmNamn']; ?></p>

<p>Alla skadespelare som har samma filmmer</p>
<?php foreach ($filmSkadespelare as $key => $value): ?>

	<p><?php echo $value['skadespelareNamn']; ?></p>
<?php endforeach; ?>

<?php
// Stänger databaskopplingen
dbDisconnect($connection);
?>
</body>
</html>

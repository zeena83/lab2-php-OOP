<?php
/*
 * Radera film
 */

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/skadespelare_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Kontrollera om skadespelare ska raderas
if(isset($_GET['deleteid']) && $_GET['deleteid'] > 0 ){
    $isDeleteid = $_GET['deleteid'];
}

// Skall skadespelare raderas?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
    deleteFilm($connection,$_POST['isdeleteid']);

    // Skickar tillbaka till sidan som visar alla film
    header("Location: film_read.php");
}
?>
<!DOCTYPE HTML>
<html lang="sv">
<head>
    <meta charset="utf-8" />
    <title>film - Ta bort</title>
</head>

<body>
<h1>Ta bort film</h1>

<form action="film_delete.php" method="post">
    <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteid; ?>">

    <label>Vill du verkligen radera film?</label>
    <p><input type="submit" value="JA"></p>
</form>
<?php
// Stänger databaskopplingen
dbDisconnect($connection);
?>
</body>
</html>

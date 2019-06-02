<?php
/*
 * Radera kund
 */

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Kontrollera om kunden ska raderas
if(isset($_GET['deleteid']) && $_GET['deleteid'] > 0 ){
    $isDeleteid = $_GET['deleteid'];
}

// Skall kunden raderas?
if(isset($_POST['isdeleteid']) && $_POST['isdeleteid'] > 0){
    deleteCustomer($connection,$_POST['isdeleteid']);

    // Skickar tillbaka till sidan som visar alla kunder
    header("Location: customer_read.php");
}
?>
<!DOCTYPE HTML>
<html lang="sv">
<head>
    <meta charset="utf-8" />
    <title>Kunder - Ta bort</title>
</head>

<body>
<h1>Ta bort kund</h1>

<form action="customer_delete.php" method="post">
    <input type="hidden" name="isdeleteid" value="<?php echo $isDeleteid; ?>">

    <label>Vill du verkligen radera kunden?</label>
    <p><input type="submit" value="JA"></p>
</form>
<?php
// Stänger databaskopplingen
dbDisconnect($connection);
?>
</body>
</html>

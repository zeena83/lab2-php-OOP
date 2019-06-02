<?php 
/*
  * Visar alla kunder
*/

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Visar alla kunder
$allCustomers = getAllCustomers($connection);
?>
<!DOCTYPE HTML>
<html lang="sv">
<head>
<meta charset="utf-8" />
<title>Kunder - Visa alla</title>
</head>

<body>
<h1>Kunder</h1>
<p><a href="customer_create.php">Lägg till ny kund</a></p>
<ul>
<?php 
	// Loopar genom arrayen som innehåller alla kunder i tabellen
    while($row = mysqli_fetch_array($allCustomers)){
?>
 <li><?php echo $row['customerName'];?> <a href="customer_update.php?editid=<?php echo $row['customerId'];?>">Uppdatera</a> <a href="customer_delete.php?deleteid=<?php echo $row['customerId'];?>">Ta bort</a></li>
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


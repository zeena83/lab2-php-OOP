<?php
/*
 * Visar alla kunder
*
*/

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/customer_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Skall kunden redigeras?
if(isset($_GET['editid']) && $_GET['editid'] > 0 ){
	$customerData = getCustomerData($connection,$_GET['editid']);
}

// Skall kunden uppdateras?
if(isset($_POST['updateid']) && $_POST['updateid'] > 0){
	updateCustomer($connection);

	header("Location: customer_update.php?editid=".$_POST['updateid']);
}
?>
<!DOCTYPE HTML>
<html lang="sv">
<head>
<meta charset="utf-8" />
<title>Kunder - Uppdatera kund</title>
</head>

<body>
<h1>Uppdatera <?php echo $customerData['customerName']; ?></h1>
<p><a href="customer_read.php">Tillbaka</a></p>

<form action="customer_update.php" method="post">
   	<input type="hidden" name="updateid" value="<?php echo $customerData['customerId']; ?>">

    <label>Namn:</label>
    <p><input type="text" name="txtName" value="<?php echo $customerData['customerName']; ?>"></p>
	
    <label>E-post:</label>
    <p><input type="email" name="txtEmail" value="<?php echo $customerData['customerEmail']; ?>"></p>
     
    <p><input type="submit" value="Uppdatera"></p>
</form>
<?php
// Stänger databaskopplingen
dbDisconnect($connection);
?>
</body>
</html>

<?php
// Startar upp sessionen
session_start();

// Kontrollerar Adminbehörighet
if(!isset($_SESSION['status'])){
	header("Location: index.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
 <title>Sessioner Hem</title>
 <meta charset="utf-8" />
</head>
<body>
<ul>
	<li><a href="skadespelare_read.php">Lägga till skådespelare</a></li>
	<li><a href="application.php">Class</a></li>

</ul>
<p><a href="login/logout.php">Logga ut</a></p>
</body>
</html>

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
<h1>Här har bara Admin behörighet</h1>
</body>
</html>

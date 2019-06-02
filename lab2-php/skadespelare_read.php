<?php
/*
  * Visar alla skadespelare
*/

// Inkluderar filerna för databaskopplingen och funktioner
require("includes/conn_mysql.php");
require("includes/skadespelare_functions.php");

// Skapar databaskopplingen
$connection = dbConnect();

// Visar alla skadespelare
$allSkadespelare = getAllSkadespelare($connection);
?>

<!DOCTYPE html>
<html lang="sv">
<head>
 <title>LAB-2</title>
 <meta charset="utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">LAB-2</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li><a href="#">Film</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="customer_create.php"><span class="glyphicon glyphicon-user"></span>Signup</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				<li><a href="login/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
	 <div class="row">
		 <div class="col-sm-12">
        <h1  style="text-align:center;">skådespelare</h1>
        <p  style="text-align:center;"><a href="skadespelare_create.php">Lägg till ny skadespelare</a></p>
        <ol>
        <?php
        	// Loopar genom arrayen som innehåller alla skadespelare i tabellen
            while($row = mysqli_fetch_array($allSkadespelare)){
        ?>
         <li>
           <?php echo $row['skadespelareNamn'];?>
           <?php echo $row['skadespelareAlder'];?>
           <?php echo $row['skadespelareAdress'];?>
           <a href="skadespelare_view.php?viewid=<?php echo $row['skadespelareId'];?>">View</a>
           <a href="skadespelare_update.php?editid=<?php echo $row['skadespelareId'];?>">Uppdatera</a>
           <a href="skadespelare_delete.php?deleteid=<?php echo $row['skadespelareId'];?>">Ta bort</a>
         </li>
        <?php
        	}
        ?>
      </ol>
        <?php
        // Stänger databaskopplingen
        dbDisconnect($connection);
        ?>
     </div>
    </div>
  </div>
</body>
</html>

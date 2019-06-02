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
<body  style="background-color: rgb(242, 242, 242); font-family: arail;">
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">LAB-2</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">film</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <div align="center">
      <form action="checklogin_mysqli.php" method="post" ><br><br><br><br><br>
        <h1 style="text-align:center;">Login</h1><br>
        <label>Enter your E-mail:</label>
        <p><input type="email" name="txtUser" placeholder="Enter your E-mail" size="60"></p>
        <label>Enter your password:</label>
        <p><input type="password" name="txtPassword" placeholder="Enter your password" size="60"></p>
        <p><button type="submit" name="submit" class="btn btn-primary" class="btn btn-primary btn-md">Login</button></p>
      </form>
    </div>
  </div>
</body>
</html>

<?php include('databaseRegister.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>Gebruikersnaam</label>
  	  <input type="text" name="Gebruikersnaam" value="<?php echo $Gebruikersnaam; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Wachtwoord</label>
  	  <input type="Wachtwoord" name="Wachtwoord_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm Wachtwoord</label>
  	  <input type="Wachtwoord" name="Wachtwoord_2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		bent u al een member? <a href="Inlogklanten.php">Sign in</a>
  	</p>
  </form>
</body>
</html>
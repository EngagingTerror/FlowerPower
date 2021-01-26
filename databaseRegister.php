<?php
session_start();

// initializing variables
$Gebruikersnaam = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'flowerpower');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $Gebruikersnaam = mysqli_real_escape_string($db, $_POST['Gebruikersnaam']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $Wachtwoord_1 = mysqli_real_escape_string($db, $_POST['Wachtwoord_1']);
  $Wachtwoord_2 = mysqli_real_escape_string($db, $_POST['Wachtwoord_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Gebruikersnaam is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($Wachtwoord_1)) { array_push($errors, "Wachtwoord is required"); }
  if ($Wachtwoord_1 != $Wachtwoord_2) {
	array_push($errors, "The two Wachtwoorden do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE Gebruikersnaam='$Gebruikersnaam' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['Gebruikersnaam'] === $Gebruikersnaam) {
      array_push($errors, "Gebruikersnaam already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (Gebruikersnaam, email, Wachtwoord) 
  			  VALUES('$Gebruikersnaam', '$email', '$Wachtwoord')";
  	mysqli_query($db, $query);
  	$_SESSION['Gebruikersnaam'] = $Gebruikersnaam;
  	$_SESSION['success'] = "You are now logged in";

  }
}
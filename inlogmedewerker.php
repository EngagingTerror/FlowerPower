<?php  
// // voer 1x uit aan het begin van de applicatie om 1 user toe te voegen aan de db
include 'database.php';
$db = new database();
$db->addFirstUser();


if(isset($_POST['submit'])){

    $fieldnames = ['Gebruikersnaam', 'Wachtwoord'];

    $error = false; // ons voorkeur gaat ernaar uit dat deze ten alle tijden false blijft.

    foreach($fieldnames as $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $error = true; // voorkeur gaat niet naar error=false! want dan heeft gebruiker geen input geleverd in ons input field
        }
    }

    if(!$error){// not false = true!
        // voer de login functie uit
        $Gebruikersnaam = $_POST['Gebruikersnaam'];
        $Wachtwoord = $_POST['Wachtwoord'];

         $db = new database();
         $db->login($Gebruikersnaam, $Wachtwoord);      
    }

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>

        <form action="index.php" method="post">
            <label for="Gebruikersnaam">Gebruikersnaam</label>
            <input type="text" name="Gebruikersnaam" required><br>
            <label for="Wachtwoord">Wachtwoord</label>
            <input type="Wachtwoord" name="Wachtwoord" required><br>
            <input type="submit" value="Login">
        </form>
    </body>
</html>
<?php
//Starting Session so it uses info from our session info  
session_start(); 
//Making a variable to use from session
// In The Variable Username it is stored the username from the session,
//which was stored in the session when logged in from POST to _SESSION
$username = $_SESSION['username'];

include "../functions.php";

//We put the returned array from the func. into $result
$result= getname($username);


/*
Using the returned array example:
echo $result[0];
echo $result[1];
echo $result[3];
echo $result[4];
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uplatnica</title>
</head>
<body>

<form action="Uplatnica" method="POST">
    <!-- NALOGODAVAC -->
    <label for="name">Ime Prezime</label>
  <input type="text" id="name" value="<?php echo $result[1]; ?>"  name="name"><br><br>

  <label for="Adresa">Adresa</label>
  <input type="text" id="Adresa" value="<?php echo $result[2]; ?>" name="Adresa"><br><br>

  <label for="BankaNalog">Banka na nalogodavacot </label>
  <input type="text" id="BankaNalog" value="<?php echo "MoneyTree" ?>" name="BankaNalog"><br><br>

  <label for="EMBG">EMBG</label>
  <input type="text" min="000000000000" max="999999999999" value="<?php echo $result[0]; ?>"  id="EMBG" name="EMBG"><br><br>

  <label for="doznaka">Celna doznaka</label>
  <input type="text" id="doznaka" name="doznaka"><br><br>


<!-- PRIMAC -->
<label for="Primac">Ime i Prezime</label>
<input type="text" id="primac" name="primac"><br><br>

<label for="bankaprimac">Banka na primacot</label>
<select name="bankaprimac" id="bankaprimac">
    <option value="Sparkasse">MoneyTree</option>
    <option value="Halkbank">Halkbank</option>
    <option value="Stopanska">Stopanska</option>
    <option value="Komercijalna">Komercijalna</option>
    
</select> <br> <br>

    <label for="iznos">Iznos</label>
    <input type="number"  id="Iznos" name="Iznos"><br><br>

    <label for="smetkaprimac">Smetka</label>
    <input type="number"  id="smetkap" name="smetkap"><br><br>

    <button type="submit" name="submit">Send</button>
</form>

</body>
</html>
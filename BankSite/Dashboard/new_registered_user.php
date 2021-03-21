<?php
//Starting Session so it uses info from our session info  
session_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  <?php 
  //Making a variable to use from session
  $username = $_SESSION['username'];

  //printing a h1
  echo "<h1>Lets Get To Know Each Other Better $username </h1>";
  ?>
    
<form action="../BasicUserInfo.php" method="POST">
  <label for="name">Name and Surname</label>
  <input type="text" id="name" name="name"><br><br>

  <label for="Adresa">Living Adress</label>
  <input type="text" id="Adresa" name="Adresa"><br><br>

  <label for="EMBG">EMBG</label>
  <input type="number" min="000000000000" max="999999999999" id="EMBG" name="EMBG"><br><br>
  
  <button type="submit" name="submit">Submit</button>
</form>

</div>
<br />
<br />
<br />

</body>
</html>
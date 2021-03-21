<?php
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
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <title> Basic User Infromation </title>
<head>
<style>
    * {
       
        font-family: 'Kumbh Sans', sans-serif;
    }
   

body {
  margin: 0;
  background-color:#FFFFFF;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 20px 20px;
  width: 15%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #7D3CF8;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
i{
    padding:0px 10px;
}
h1{
  font-size:25px;
  margin:10px;
  text-align: center;
}
p{
  font-size:15px;
  margin:10px;
  text-align: center;
}
.content{
  text-align: center;
}


input {
  color:gray;
      border: none;
      padding: 10px;
      font-size: 20px;
      outline: 0;
      width: auto;
      z-index: 1;
      background-color: transparent;
    }


input:focus {
  color:black;
    }
    input:hover {
  color:black;
    }
    .inp {
      z-index: 2;
      width: 80vh;
      padding-left: 10px;
 border-top:0px;
 border-left:0px;
 border-right:0px;
      border-radius: 5px;
      margin-top: 15px;
      transition: 0.5s;
    }

    .inp:hover {
      width: 85vh;
      border: 2px solid #7D3CF8;
      border-top:0px;
 border-left:0px;
 border-right:0px;
      transition: 0.2s;
    }

    .inp:hover>i {
      color: #7D3CF8;
      transition: 0.2s;
    }

    hr {
      width: 100px;

    }

    .center {
      text-align: center;
    }

    .inp {
      text-align:center;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: auto;
      margin-right: auto;
      background-color: white;
      border: 2px solid #7D3CF8;
      border-top:0px;
 border-left:0px;
 border-right:0px;
    }

    button {
      border: 2px solid rgb(168, 168, 168);
      background-color: white;
      border-radius: 25px;
      font-size: 15px;
      padding-bottom: 5px;
      padding-top: 5px;
      padding-left: 15px;
      padding-right: 15px;
      transition: 0.5s;
      color: black;
      box-shadow: 1px 3px  #7D3CF8;
    }

    button:hover {
      background-color: #7D3CF8;
      color: white;
      font-size: 17px;
      transition: 0.2s;
    }
/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
.block{
  align-items:center;
  display: flex;
  text-align:center;
  margin-left:35%;
  margin-right:35%;
}

@media only screen and (max-width: 1000px) {
    .block{
      margin-left:auto;
      margin-right:auto;
    }
   .hide{
     display:none;
     height: 0px; 
     overflow: visible;
     width:0px;
   }

    }
    .cardpic{
      width:500px;
    }
    .show{
     display:flex;
     text-align:center;
   }
   .showbtn{
    text-align:center;
     height:70px;
    margin-left:10px;
    position:relative;
    top:100px;
    
   }
   .inp {
      z-index: 2;
      width: 60vh;
      padding-left: 0px;
 border-top:0px;
 border-left:0px;
 border-right:0px;
      border-radius: 5px;
      margin-top: 15px;
      transition: 0.5s;
    }
    button {
      margin-left:auto;
      margin-right:auto;
      text-align:center;
      border: 2px solid rgb(168, 168, 168);
      background-color: white;
      border-radius: 10px;
      font-size: 15px;
      padding-bottom: 5px;
      padding-top: 5px;
      padding-left: 15px;
      padding-right: 15px;
      transition: 0.5s;
      color: black;
      box-shadow: 1px 3px  #7D3CF8;
    }
   }
   iframe{
        text-align: center;
    overflow-y: hidden; /* Hide vertical scrollbar */
    overflow-x: hidden; /* Hide horizontal scrollbar */    
border:none;
width: 400px;
height: 250px;
  }
</style>
</head>
<body>

<ul class="hide">
    <li><h1> <i class="fas fa-user-shield"></i>Privacy Settings </h1></li>
    <li > <?php 
        //printing a h1
        echo "<p>Lets Get To Know Each Other Better $username </p>";
        ?></li>
        </br>
        </br>
  <li><a  href="frame_BI.php"><i class="fas fa-question-circle"></i>Basic Information</a></li>
  <li><a  class="active" href="frame_CI.php"><i class="fas fa-credit-card"></i>Card Information</a></li>
  <li><a href="frame_PP.php"><i class="fas fa-user-secret"></i>Privacy Policy</a></li>
</ul>

<div class="content" style="margin-left:15%;padding:1px 16px;height:1000px;">
  <h2>Credit Card Information (Encrypted):</h2>

  <?php
//Error Handling For Registering
if (isset($_GET["error"])) {
if ($_GET["error"] == "success") {
  echo"<p> Your Card Has Been Updated Succesfully ! </p>";
} else {
  echo"<p>There Was A Problem Updating Your Card.</p>";
}
}
echo"<p>Link Your Credit Card Data</p>";
?>
</br>
  <form action="../CardInfo.php" method="POST">
  
  <div class="inp">
 <i> <label for="Credit">Credit Card:</label> </i>
    <input type="text" class="input-element" id="Credit" value="" name="Credit" required><br><br>
 <p id="card-type"></p>
  </div>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
var cleave = new Cleave('.input-element', {
    creditCard: true,
    onCreditCardTypeChanged: function (type) {
        // update UI ...
    }
}); </script>
<div class="block">
<div class="inp" style="width:3vh;   padding-left:160px;">
 <i style=""> <label for="pin">CVV:</label> </i>
    <input type="text" class="CVV" maxlength="3" id="CVV" value="" name="CVV" required>

  </div>   
  <div class="inp" style="width:3vh;  padding-left:160px;">
 <i style=""> <label for="pin">Expiry Date:</label> </i>
    <input type="text" class="CVV" maxlength="5" id="Expiry" value="" name="Expiry" required>
 
  </div>   
</div>
    <br/>
    <button type="submit"  name="submit">Submit</button>
  </form>
  <br><br>

  <div class="hide">

  <img class="cardpic" src="../img/CreditCard.png">
</div>
<div class="show">
        </br>
        </br>
  <button class="showbtn"><a class="active" href="frame_BI.php"><i class="fas fa-question-circle"></i>Basic</a></button>
  <button  class="showbtn"><a href="frame_CI.php"><i class="fas fa-credit-card"></i>Card </a></button>
</div>
</div>

</body>
</html>
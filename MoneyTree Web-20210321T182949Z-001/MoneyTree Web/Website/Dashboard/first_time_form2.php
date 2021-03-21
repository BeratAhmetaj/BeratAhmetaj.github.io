<?php
session_start(); 
//Making a variable to use from session
// In The Variable Username it is stored the username from the session,
//which was stored in the session when logged in from POST to _SESSION
$username = $_SESSION['username'];


include "../functions.php";
//We put the returned array from the func. into $result
$coinres= getcoins($username);
$result= getname($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="./img/moneytreelogo_00000.png">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registering Form</title>
</head>
<style>
    html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 16px;
      color: white;
      }
      body {
      background: url("/uploads/media/default/0001/01/b5edc1bad4dc8c20291c8394527cb2c5b43ee13c.jpeg") no-repeat center;
      background-size: cover;
      }
      h1, h2 {
      text-transform: uppercase;
      font-weight: 400;
      }
      h2 {
      margin: 0 0 0 8px;
      }
      .main-block {
        border-top: solid black 3px;
        border-left: solid black 3px;
        border-radius:20px;
   margin-top:55px;
   margin-left:8%;
   margin-right:8%;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100%;
      padding: 25px;
      background: #FF5031; 
      box-shadow: 15px 15px #FFCE53;
      }
      .left-part, form {
      padding: 25px;
      }
      .left-part {
      text-align: center;
      }
      .fa-graduation-cap {
      font-size: 72px;
      }
      form {
      background: #FF5031; 
      }
      .title {
      display: flex;
      align-items: center;
      margin-bottom: 20px;
      }
      .info {
      display: flex;
      flex-direction: column;
      }
      input, select {
      padding: 5px;
      margin-bottom: 30px;
      background: transparent;
      border: none;
      border-bottom: 1px solid white;
      }
      input::placeholder {
      color: #eee;
      }
      option:focus {
      border: none;
      }
      option {
      background: black; 
      border: none;
      }
      .checkbox input {
      margin: 0 10px 0 0;
      vertical-align: middle;
      }
      .checkbox a {
      color: #26a9e0;
      }
      .checkbox a:hover {
      color: #85d6de;
      }
      .btn-item, button {
      padding: 10px 5px;
      margin-top: 20px;
      border-radius: 5px; 
      border: none;
      background: #26a9e0; 
      text-decoration: none;
      font-size: 15px;
      font-weight: 400;
      color: #fff;
      }
      .btn-item {
      display: inline-block;
      margin: 20px 5px 0;
      }
      button {
      width: 100%;
      }
      button:hover, .btn-item:hover {
      background: #85d6de;
      }
      @media (min-width: 568px) {
      html, body {
      height: 100%;
      }
      .main-block {
      flex-direction: row;
      height: calc(100% - 50px);
      }
      .left-part, form {
      flex: 1;
      height: auto;
      }
      }
* {
  text-align:center;
        font-family: 'Kumbh Sans', sans-serif;
    }

    body {
     
        overflow-x: hidden;
        margin: 0;
        background-color: #56D3C3;
        background-repeat: no-repeat;
  height: 1000px;
    }

    ul {

        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #7D3CF8;
        border-bottom:  solid #7D3CF8 5px;
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1;
    }

    li {
        margin: 10px;
        float: left;
        color:white:
        
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 20px 10px;
        text-decoration: none;
        
    }

    .logo {
        width: 52px;
        animation: rotation 5s infinite linear;
    }
    .rotate {
  animation: rotation 2s infinite linear;
}
@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}
    .signup {
        float: right;
    }

    .first-nav-element {
        padding-left: 30px;
    }

    h1 {
        color:white:
        font-weight: 400;
    }
    .signup {
        transition: 1s;
        border: 0px solid #7D3CF8;
        border-radius: 50px;
        background-color: #7D3CF8;
        color: white;
    }

    .signup:hover {
        transition: 0.3s;
        background-color: #FCBF4C;
        color: black;
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

</style>

<body>

<div class="navbar">
        <ul>
            <li> <img class="logo" src="../img/moneytreelogo_white_00000.png"> </li>
            <li > <a href="../logout_action.php">Log Out</a> </li>
           </ul>
</div>
  <div class="Hub"> 
    
<div class="main-block">
      <div class="left-part">
        <img src="../img/88b0c9100680567.Y3JvcCwxNDAwLDEwOTUsMCwxNTI.jpg">
        <h1>Money Can Wait</h1>
        <p>but my database cant, lets fill it up with some info</p>
      </div>
      <form action="../BasicUserFirst.php" method="POST"><?php
//Error Handling For Registering
if (isset($_GET["error"])) {
if ($_GET["error"] == "success") {
echo"<p> Your Card Has Been Updated Succesfully ! </p>";
} else {
echo"<p>There Was A Problem Updating Your Card.</p>";
}
}

?></br></br></br>
        <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Basic User Information</h2>
        </div>
        <div class="info">
        <input type="text" id="name"  name="name" placeholder="Full Name" required >
        <input type="text" id="Adresa" placeholder="Living Adress" name="Adresa" required >
        <input type="number" id="EMBG" placeholder="EMBG Code" name="EMBG" required >
          <div class="title">
          <i class="fas fa-pencil-alt"></i> 
          <h2>Credit Card Information</h2>
        </div>
        <p>Mr.Paypal man didnt give me their API, so your free to fake these (for now) </p></br></br>
        <input type="text" class="input-element" id="Credit" value="" name="Credit" placeholder="Credit Card Number" required >
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>
<script>
var cleave = new Cleave('.input-element', {
  creditCard: true,
  onCreditCardTypeChanged: function (type) {
      // update UI ...
  }
}); </script>
         <input type="text" class="CVV" maxlength="3" id="CVV" value="" name="CVV" placeholder="CVV" required> 
         <input type="text" class="CVV" maxlength="5" id="Expiry" value="" name="Expiry"  placeholder="Expiry Date" required>
        </div>
        <button type="submit"  name="submit">Get the bag</button>
      </form>
    </div>
       
</div>
</div>

</body>
</html>

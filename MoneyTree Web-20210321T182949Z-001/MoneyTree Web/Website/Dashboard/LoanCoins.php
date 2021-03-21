<?php
session_start(); 
//Making a variable to use from session
// In The Variable Username it is stored the username from the session,
//which was stored in the session when logged in from POST to _SESSION
$username = $_SESSION['username'];


include "../functions.php";
//We put the returned array from the func. into $result
$coinres= getcoins($username);

$count=CountLoans($username);
$count2= CountLoanedAmount($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="../img/moneytreelogo_00000.png">
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Coins</title>
</head>

<style>
  /* Paste this css to your style sheet file or under head tag */
/* This only works with JavaScript, 
if it's not present, don't show loader */
.no-js #loader {   background-color:#7D3CF8; display: none;  }
.js #loader {   background-color:#7D3CF8; display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
  background-color:#7D3CF8;
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(https://i.imgur.com/33q9S4D.gif) center no-repeat #fff;
}


* {
        font-family: 'Kumbh Sans', sans-serif;
        
    }

    body {
        height: 100%;
        overflow-x: hidden;
        margin: 0;
        background-image: linear-gradient(to right top, #a2beeb, #8ecfee, #8edde5, #a4e7d5, #c7eec7);
        background-repeat: no-repeat;
        height: 100%;
  height: 3000px;
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
    h3{
      margin-top:10px;
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




    * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  display: flex;
        justify-content: center;
  width: 25%;
  padding: 0 10px;

  
}

/* Remove extra left and right margins, due to padding */
.row {
  
  text-align: center;
  margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 10000px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
  .card{
margin-left: 0px;
margin-right: 25px;
  }
}

/* Style the counter cards */
.card{
margin-left: 30px;
  text-align: center;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  height: 100%;
  border-radius:5px;
  text-align: center;
  background-color: #f1f1f1;
  background-color: white;
  box-shadow: 0 16px 32px 0 rgba(0,0,0,0.2);
}
@keyframes text {
  from {font-size:  0px; border-radius: 5px;}
  to {font-size: 15px; border-radius: 20px; }
}

.card h3{
  display: none;
  animation-duration: 1.5s;
}
.card h3{
  display: block;
  animation-name: text;
  animation-duration: 1.5s;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color:white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #4CAF50;
  color:white:
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color:white;
  padding: 18px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

.Hub{
    margin:50px;
    background-color: #FFFFFF;
    padding:50px 20px 50px 20px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    border-radius:20px;
}

.card_btn{
    border: 1px solid;
        color: #FCBF4C;
        background-color: #7D3CF8;
        padding: 5px 15px 5px 15px;
        border-radius: 20px;
        text-decoration: none;
        color: #FCBF4C;
        font-size: 15px;
        transition: 1.0s;
}
.card_btn:hover {
        font-size: 20px;
        transition: 0.3s;
    }
    a{
        text-decoration: none;
        color:black;
        font-size: 15px;
    }
    .order{
      text-decoration: none;
      border:none;
      background-color: transparent;
  }
h5{
  text-align:center;
  font-size:20px;
  color:red;
}
h4{
  text-align:center;
  font-size:20px;
  color:green;
}
</style>

<body>
<div class="se-pre-con"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
<script>
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
  });</script>



<div class="navbar">
        <ul>
            <li> <img class="logo" src="../img/moneytreelogo_white_00000.png"> </li>
            <li > <a href="main_hub.php">Main Hub</a> </li>
           
            <li> <div class="dropdown">
    <button class="dropbtn">Transactions 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Transaction_List.php">View Transactions</a>
      <a href="Deposit.php">Deposit </a>
      <a href="LoanCoins.php">Loan Coins</a>
    </div> 
  </div> </li>

  <li> <div class="dropdown">
    <button class="dropbtn">Statistics 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Transaction_List.php">View Transactions</a>
      <a href="Calculator.php">Calculate Currency</a>

    </div> 
  </div> </li>

  <li> <div class="dropdown">
    <button class="dropbtn">
    <?php 
  echo "$username";
  ?>
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="Privacy_settings.php">Privacy Settings</a>
      <a href="../logout_action.php">Log Out</a>
    </div> 
  </div> </li>
            <li class="signup"> <a class="signup" href="LoanCoins.php">My Wallet: <?php echo $coinres[0]; ?> Coins </a> </li>
        </ul>
    </div>
  <div class="Hub"> 
  <h1 style="text-align:center">Loan Coins</h1>
  <h2 style="font-size:15px; text-align:center">Your Total Loans: <?php echo $count; ?> </h2>
  <h2 style="font-size:15px; text-align:center">Loaned Amount left to pay: <?php echo $count2; ?> </h2>
 <?php 
 if (isset($_GET["error"])) 
 {
 if($_GET["error"] == "Success") 
 {
 echo"<h4> Loan Successful </h4>";
 } 
 else if($_GET["error"] == "payed") 
 {
 echo"<h4> Payed Loan Successfully ! </h4>";
 } 
 else if($_GET["error"] == "Error") 
 {
 echo"<h5> Error: Technical Problem, Refresh And Try Again </h5>";
 } 
 else if($_GET["error"] == "nomoney") 
 {
 echo"<h5> Error: You Dont Have The Sufficient Amount To Pay The Loan </h5>";
 } 
}
 ?>
     <hr/>
</br></br>
  <div class="card">
    <h1 style="color: black; font-size: 20px;"> 100 coins </h1>
    <hr/>
    <h1 style="color: black; font-size: 35px;">Interest Fee: 0%</h1>
    <h3 style="color: black; font-size: 15px; ">Payment Deadline: 1 year</h3>
    <h3 style="color: black; font-size: 15px; "></h3> 
    <h3 style="color: black; font-size: 15px; "></h3> 
    <!-- I Hide the button behind a form so i can use it without using ajax or xml to request function -->
    <form action="./LoanAction.php" method="post">
    <button style="float:right; font-size:15px;" type="submit" value="100" name="Amount"> Loan </button> 
  </form>
   <p style="color: black; font-size: 10px; float: left;">You will be notified before your deadline exceeds</p>  
  <br/>
  </div>

  </br></br>
  <div class="card">
    <h1 style="color: black; font-size: 20px;"> 500 coins </h1>
    <hr/>
    <h1 style="color: black; font-size: 35px;">Interest Fee: 0%</h1>
    <h3 style="color: black; font-size: 15px; ">Payment Deadline: 2 year</h3>
    <h3 style="color: black; font-size: 15px; "></h3> 
    <h3 style="color: black; font-size: 15px; "></h3> 
    <form action="./LoanAction.php" method="post">
    <button style="float:right; font-size:15px;" type="submit" value="500" name="Amount"> Loan </button> 
  </form>
   <p style="color: black; font-size: 10px; float: left;">You will be notified before your deadline exceeds</p>  
  <br/>
  </div>

  </br></br>
  <div class="card">
    <h1 style="color: black; font-size: 20px;"> 1000 coins </h1>
    <hr/>
    <h1 style="color: black; font-size: 35px;">Interest Fee: 10%</h1>    
    <h3 style="color: black; font-size: 15px; ">Your Interest Fee Will Be 100 coins</h3> 
    <h3 style="color: black; font-size: 15px; ">Payment Deadline: 4 year</h3>

    <h3 style="color: black; font-size: 15px; "></h3> 
    <form action="./LoanAction.php" method="post">
    <button style="float:right; font-size:15px;" type="submit" value="1000" name="Amount"> Loan </button> 
  </form>
   <p style="color: black; font-size: 10px; float: left;">You will be notified before your deadline exceeds</p>  
  <br/>
  </div>

  </br></br>  </br></br>
  <div class="card" style="background-color:black; color:white;">
    <h1 style="color: white; font-size: 20px;"> Pay Your Loan </h1>
    <h1 style="color: white; font-size: 10px;"> you can only pay your loaned coins if you have the total sufficient amount. </h1>
    <hr/>
    <h1 style="color: white; font-size: 35px;">Amount To Pay: <?php echo $count2; ?></h1>
    <form action="./PayLoanAction.php" method="post">
    <button style="text-align:center; font-size:15px; color:black; background-color:white;" type="submit" name="Amount"> Pay Loan </button> 
  </form>
   
  <br/>
  </div>



<!-- SEARCH FOR DEPOSITS -->
<style>
  input {
      border: none;
      padding: 10px;
      font-size: 20px;
      outline: 0;
      width: auto;
      z-index: 1;
      background-color: transparent;
    }

    i {
      font-size: 20px;
    }

    .inp {
      z-index: 2;
      width: 35vh;
      padding-left: 30px;
      border: 2px solid rgb(168, 168, 168);
      border-top:0px;
      border-right:0px;
      border-left:0px;
      border-radius: 5px;
      margin-top: 15px;
      transition: 0.3s;
    }

    .inp:hover {
      width: 37vh;
      border: 5px solid #7D3CF8;
      border-top:0px;
      border-right:0px;
      border-left:0px;
      transition: 0.3s;
    }

    .inp:hover>i {
      color: #7D3CF8;
      transition: 0.3s;
    }

    hr {
      width: 100px;

    }

    .center {
      text-align: center;
    }

    .inp {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-left: auto;
      margin-right: auto;
      background-color: white;

    }

    button {
      border: 2px solid rgb(168, 168, 168);
      background-color: #7D3CF8;
      border-radius: 5px;
      font-size: 10px;
      margin-right:15px;
      padding-bottom: 5px;
      padding-top: 5px;
      padding-left: 15px;
      padding-right: 15px;
      transition: 0.2s;
      color: white;

    }

    button:hover {
      background-color: white;
      color: white;
      transition: 0.5s;
      color:black;
    }
    button:hover a {
      color: white;
      transition: 0.5s;
    }
    /* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  box-shadow: inset 0 0 5px white; 
  border-radius: 0px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #7D3CF8; 
  border-radius: 0px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: transparent; 
}
  </style>
  
</div>
</div>
</div>
</div>
</div>
</body>
</html>
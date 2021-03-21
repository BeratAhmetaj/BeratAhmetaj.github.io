<?php
session_start(); 
//Making a variable to use from session
// In The Variable Username it is stored the username from the session,
//which was stored in the session when logged in from POST to _SESSION
$username = $_SESSION['username'];


include "../functions.php";
//We put the returned array from the func. into $result
$coinres= getcoins($username);

$count=CountTransactions($username);
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
    <title>Transactions</title>
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
  background-color: #7D3CF8;
  box-shadow: 0 16px 32px 0 rgba(0,0,0,0.2);
}
@keyframes text {
  from {font-size:  0px; border-radius: 5px;}
  to {font-size: 15px; border-radius: 20px; }
}

.card h3{
  display: none;
  animation-duration: 0.3s;
}
.card:active h3{
  display: block;
  animation-name: text;
  animation-duration: 0.3s;
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
      <a href="#">View Transactions</a>
      <a href="Deposit.php">Deposit </a>
      <a href="LoanCoins.php">Loan Coins</a>
    </div> 
  </div> </li>

  <li> <div class="dropdown">
    <button class="dropbtn">Statistics 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">View Transactions</a>
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
  <h1>My Deposit History </h1>
  <h2 style="font-size:15px">Total Transactions: <?php echo $count; ?> </h2>
  
  <p>Order by:<button class="order"><a href="Transaction_List.php">Newest</a></button> <button class="order"><a href="Transaction_List_OrderOldest.php">Oldest</a></button></p> 
<br/>
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
      background-color: white;
      border-radius: 5px;
      font-size: 10px;
      margin-right:15px;
      padding-bottom: 5px;
      padding-top: 5px;
      padding-left: 15px;
      padding-right: 15px;
      transition: 0.5s;
      color: black;

    }

    button:hover {
      background-color: #7D3CF8;
      color: white;
      transition: 0.5s;
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
  <form action="./Search_Transaction.php" method="post">
  <div class="center">
  <?php 
      // Error Handling For Login
      if (isset($_GET["error"])) 
        {
        if($_GET["error"] == "UserNotExist") 
        {
        echo"<h2> Deposit Data About User Doesent Exist. </h2>";
        } 
        else
        {
          echo"<h2> Statement Failed </h2>";
        }
      }
      ?>
      </div>
<div class="inp">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Search Deposits" name="ToUser" required>
          <button type="submit" name="submit">Search</button>
          <br />
        
        </div>
        </form> <br/>
          <h2 style="font-size:15px; text-align:center">Click and hold on a card to view details. </h2>
  <div class="row">
  <div class="column">

<div class="Newest">
<?php 
//$count is number of transactions
for ($integer=1; $integer<=$count;$integer++)
{
  $trans=GetTransaction($username,$integer);
  echo ' <br/>
  <div class="card">
    <h1 style="color: white; font-size: 20px;">Deposited To '.$trans[1].' </h1>
    <hr/>
    <h1 style="color: white; font-size: 35px;">Amount '.$trans[2].' coins </h1>
    <h3 style="color: white; font-size: 15px; ">Bill:'.$trans[3].'</h3>
    <h3 style="color: white; font-size: 15px; ">Reason:'.$trans[4].'</h3> 
    <h3 style="color: white; font-size: 15px; ">Date:'.$trans[5].'</h3> 
   <p style="color: white; font-size: 10px; float: left;">Transaction ID:'.$trans[0].'</p>  
  <br/>
  </div>
  ';
}
?>

</div>


</div>
<!-- TEMPLATE CODE THAT GETS ECHOED AS TRANSACTION 
  <br/>
<div class="card">
  <h1 style="color: white; font-size: 20px;">Deposited To berat</h1>
  <hr/>
  <h1 style="color: white; font-size: 35px;">Amount 50</h1>
  <h3 style="color: white; font-size: 15px; ">Bill:</h3>
  <h3 style="color: white; font-size: 15px; ">Reason:</h3> 
  <h3 style="color: white; font-size: 15px; ">Date:</h3> 
 <p style="color: white; font-size: 10px; float: left;">Transaction ID:</p>  
<br/>
</div>
-->
</div>
</div>
</div>
</div>
</div>
</body>
</html>
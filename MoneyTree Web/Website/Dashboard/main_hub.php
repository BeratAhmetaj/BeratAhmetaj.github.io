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
$loans=CountLoans($username);
$loanamount=CountLoanedAmount($username);
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
    <title>MoneyTree Hub</title>
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
  text-align:center;
        font-family: 'Kumbh Sans', sans-serif;
    }

    body {
        height: 100%;
        overflow-x: hidden;
        margin: 0;
        background-image: linear-gradient(to right top, #a2beeb, #8ecfee, #8edde5, #a4e7d5, #c7eec7);
        background-repeat: no-repeat;
        height: 100%;
       background-color:#F7F7F7;
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




    * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 25%;
  padding: 0 10px;
  
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  border-radius:20px;
  text-align: center;
  background-color: #f1f1f1;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
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

@media screen and (max-width: 1000px) {
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
  .Hub_2{
display:none;
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
        padding: 10px 50px 10px 50px;
        border-radius: 20px;
        text-decoration: none;
        color: #FCBF4C;
        font-size: 15px;
        transition: 1.0s;
}
.card_btn2{
    border: 1px solid;
        background-color:#FFCE53;
        padding: 10px 50px 10px 50px;
        border-radius: 20px;
        text-decoration: none;
        color: black;
        font-size: 15px;
        transition: 1.0s;
}
.card_btn:hover {
        font-size: 20px;
        transition: 0.3s;
    }
    .card_btn2:hover {
        font-size: 20px;
        transition: 0.3s;
    }
    a{
        text-decoration: none;
        color:white;
    }
    .Hub_2{
    margin:50px;
    background-color: #FFFFFF;
    padding:50px 20px 50px 20px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    border-radius:20px;
}
.card2{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  border-radius:20px;
  text-align: center;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  background-color:#7D3CF8;
}
.translist{
  color:white;
}
.card3{
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  border-radius:20px;
  text-align: center;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  background-color:#7D3CF8;
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
.worldimage{
  width:330px;
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
    <button class="dropbtn"><?php 
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
  
  <h1> Quick Board </h1>
<?php 
  echo "<p> Welcome To Your Main E-Banking Hub $username </p>";
  ?>
<div class="row">
  <div class="column">
    <div class="card">
      <h3>Deposit</h3>
      <p>Deposit Coins To Another User and make them rich</p>
      <button class="card_btn"><a href="Deposit.php"> Deposit Now </a></button>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>View Transactions</h3>
      <p>View All Your Transactions History</p>
      <button class="card_btn"><a href="Transaction_List.php"> View Transactions </a></button>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3> Loan Coins</h3>
      <p>Pay It Afterwards With An Interest Rate, or dont and have your account terminated</p>
      <button class="card_btn"> <a href="LoanCoins.php"> Loan Now </a></button>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Calculate Currency</h3>
      <p>Use super smart calculator made by somebody that has no idea how math works</p>
      <button class="card_btn"> <a href="Calculator.php"> Use Now  </a></button>
    </div>
  </div>
</div>

</div>
</div>

<!-- NEW SECTION -->

<div class="Hub"> 
  
  <h1>Transaction Totals</h1>
<?php 
  
  if($count<=0){
    echo "<p> You have 0 Transactions, lets fix that </p>";
    echo '<div class="row">
    <div class="column2">
      <div class="card2">
        <h3 class="translist">Make Your First Transaction</h3>
        <p class="translist">Stop Being Selfish And Deposit Your Hard Earned Money To Someone</p>
        <button class="card_btn"><a href="Deposit.php"> Deposit Now </a></button>
      </div>
    </div>';
  } else { 
    echo "<p> Total Transactions: $count </p>";
    //$count is number of transactions
  $trans=GetTransaction($username,$count);
  echo ' <br/>
  
  <div class="card2">
    <h1 style="color: white; font-size: 20px;">Latest Deposit To '.$trans[1].' </h1>
    <hr/>
    <h1 style="color: white; font-size: 35px;">Amount:  '.$trans[2].' coins </h1>
    <h3 style="color: white; font-size: 15px; ">Bill Number:'.$trans[3].'</h3>
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
<!-- NEW SECTION -->

<div class="Hub" > 
<h1>Web Statistics</h1>
<p>You can deposit to any of these users if you want to make them even more rich and make yourself go in debt :)</p>

<div class="card" >
    <div class="container">
        <h3 style="color: #7D3CF8;">  User With Most Deposits: </h3>
        <hr/>
     <?php
     //return array($username,$num_transaction,$coins)
     $user=getusersdeposit();
     ?>
     <h4> Username: <?php echo $user[0]; ?></h4>
     <h4> Deposits: <?php echo $user[1]; ?></h4>
     <h4> Coins: <?php echo $user[2]; ?></h4>

</br>

     <h3 style="color: #7D3CF8;">  User With Most Coins: </h3>
        <hr/>
     <?php
     //return array($username,$num_transaction,$coins)
     $user2=getusersmostcoins();
     ?>
     <h4> Username: <?php echo $user2[0]; ?></h4>
     <h4> Deposits: <?php echo $user2[1]; ?></h4>
     <h4> Coins: <?php echo $user2[2]; ?></h4>
    </div>
  </div>
</br></br></br>
<h1> Your Personal Statistics: </h1>
<?php 
  echo "<p>These Are Your Personal Statistics $username </p>";
  ?>

  <div class="row">
  <div class="column">
    <div class="card">
      <h3 style="font-size:40px;"><?php echo $count; ?> Deposits</h3>
      <p>Number Of Your Deposits</p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3 style="font-size:40px;"> <?php echo $loans; ?> Loans</h3>
      <p>Number Of Loans</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3 style="font-size:40px;"><?php echo $loanamount; ?> Coins</h3>
      <p>Amount Of Coins You Loan</p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3 style="font-size:40px;"><?php echo $coinres[0]; ?> Coins</h3>
      <p>Coins You Have In Your Wallet</p>
    </div>
  </div>
</div>
  </div>
 
  <div class="Hub" > 
<h1>Your Details:</h1>
<div class="card" style="background-color:#FF5031;" >
    <div class="container">
    <img class="worldimage" src="../img/88b0c9100680567.Y3JvcCwxNDAwLDEwOTUsMCwxNTI.jpg">
    <hr/>
    <?php $result= getname($username); ?>
    <h4 style="color:white"> Full Name: <?php echo $result[1]; ?> </h4>
    <h4 style="color:white"> Adress: <?php echo $result[2]; ?> </h4>
    <h4 style="color:white"> EMBG Code: <?php echo $result[0]; ?> </h4>
    <button type="submit" class="card_btn2" ><a href="Privacy_settings.php">Change Details</a></button>
</div>
</div>
</div>
<style>
    @media only screen and (max-width: 1000px) {
        .inp{
          width:260px;
        }
        .inp:hover{
          width:300px;
        }
    
        }
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
          width: 30vh;
          padding-left: 25px;
          border: 2px solid rgb(168, 168, 168);
          border-top:0px;
          border-right:0px;
          border-left:0px;
          border-radius: 5px;
          margin-top: 15px;
          transition: 0.3s;
        }
    
        .inp:hover {
          width: 34vh;
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
          border-radius: 25px;
          font-size: 15px;
          border-top:0px;
          border-right:0px;
          border-left:0px;
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
          font-size: 20px;
          transition: 0.5s;
        }
        iframe{
            text-align: center;
        overflow-y: hidden; /* Hide vertical scrollbar */
        overflow-x: hidden; /* Hide horizontal scrollbar */    
    border:none;
    width: 400px;
    height: 250px;
      }
      select{
          border:none;
          text-align: left;
          text-decoration: none;
          display: block;
          font-size: 15px;
      }
      @media screen and (max-width: 1000px) {
    .calc{
        width: 300px;
    }
    }
    
    img{
      width:30px;
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
    
    img{
      width:30px;
    }

    .AfterCalc{
        background-color: white;
        padding: 10px;
        border-radius: 15px;
        padding-bottom: 50px;
        display: none;
    }
    .calc{
        width: 30vw;
    }
  </style>
<div class="Hub"> 
    <div class="card" style="background-color: #016874;">
      <div class="container">
          <h1 style="color: white">  Loan Calculator </h1>
  <img class="calc" src="../img/Calculator_gif.gif">
  
      <p style="color:white;">Loan amount</p>
  
  
        <div class="inp">
          <img class="amountlogo" src="../img/moneytreelogo_00000.png"></br>
          <input type="number" id="Amount" placeholder="Amount" required >
        </div>
        <p style="color:white;">Loan term in months</p>
       <div class="inp">
          <i class="far fa-calendar"></i> 
          <input type="number" id="Months" placeholder="Months" required>
          <br> <br> 
  </div>
        <p style="color:white;">Add Interest fee</p>
        <div class="inp">
          <i class="fas fa-percentage"></i>
          <input type="number" id="fee" placeholder="Fee percentage" required>
          <br />
        </div>
  <br/>
  <button onclick="amortozing_loans()" >Calculate</button>
  <br/>
  <br/>
  <br/>
  
  <br/>
  <div class="AfterCalc" id="AfterCalc">
  <h1 style="color:black;"> Monthly Payments:</h1>
  <h2 id="Loan" style="color:black" style="color:black;"></h2> 
  <hr/>
  <h1 style="color:black;"> Yearly Payments:</h1>
  <h2 id="Loan2" style="color:black"></h2>
  <hr/>
  <h3> Discount Factor</h3>
  <h3 id="Loan3" style="color:black"></h3>
  </div>
  <script>
      function amortozing_loans(){
  
      var amount = document.getElementById("Amount").value;
      var months = document.getElementById("Months").value;
      var fee = document.getElementById("fee").value;
  
   var fee_decimal = fee/100;
   var periodic_interest_fee = fee_decimal/12;
   var Discount_Factor = (Math.pow(1+periodic_interest_fee, months)-1) / (periodic_interest_fee * (Math.pow(1+periodic_interest_fee,months)));
   var Monthly_Loan = amount/Discount_Factor;
   Monthly_Loan = Monthly_Loan.toFixed(2);
  
   document.getElementById("AfterCalc").style.display = "block";
  
   document.getElementById("Loan").innerHTML = Monthly_Loan + " coins";
  
   document.getElementById("Loan2").innerHTML = Monthly_Loan*12 + " coins";
  
   document.getElementById("Loan3").innerHTML = Discount_Factor.toFixed(2) +"%";
  }
  
  
  </script>

    </body>
</html>
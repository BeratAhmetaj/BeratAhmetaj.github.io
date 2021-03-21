<?php
session_start(); 
//стартаме сесија во страната
//Го зимаме корисничкото име и го ставаме во сесија
//Во овој случак корисничкото име е земено од момент кога
//корисниот е логиран се до крај на одлогирање
$username = $_SESSION['username'];


include "../functions.php";
//We put the returned array from the func. into $result
$coinres= getcoins($username);

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
    <title>Deposit</title>
</head>
<style>
* {
    
        text-align: center;
        font-family: 'Kumbh Sans', sans-serif;
    }

    body {
        height: 100%;
        overflow-x: hidden;
        margin: 0;
        background-image: linear-gradient(to right top, #a2beeb, #8ecfee, #8edde5, #a4e7d5, #c7eec7);
        background-repeat: no-repeat;
        height: 100%;
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
    .calc{
    width: 30vw;
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
        color: #7D3CF8:
        font-weight: 400;
    }
    .signup {
        transition: 1s;
        border: 0px solid #7D3CF8;
        border-radius: 50px;
        background-color: #FCBF4C;
        color: black;
        
    }

    .signup:hover {
        transition: 0.3s;
        background-color: #FCBF4C;
        color: white;
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
  background-color: #016874;
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
   
    padding:50px 20px 50px 20px;
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
.card_btn:hover {
        font-size: 20px;
        transition: 0.3s;
    }
    a{
        text-decoration: none;
        color:white;
    }
    .card {
        margin-left:25%;
    text-align: center;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 50%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
.cardlogo{
    width: 100%;
  height: auto;
}
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
.card{
  padding-left: 0px;
  margin-left: 0;
  width: 400px;
}
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

p{
    color:white;
}
h4{
    color:white;
}
h1{
    color:black
}
h2{
    color:black
}
.AfterCalc{
    background-color: white;
    padding: 10px;
    border-radius: 15px;
    padding-bottom: 50px;
    display: none;
}
</style>

<body>


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
      <a href="#">Calculate Currency</a>
      <a href="#">Charts</a>
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
  <div class="card">
    <div class="container">
        <h1 style="color: white">  Loan Calculator </h1>
<img class="calc" src="../img/Calculator_gif.gif">

    <p>Loan amount</p>


      <div class="inp">
        <img class="amountlogo" src="../img/moneytreelogo_00000.png"></br>
        <input type="number" id="Amount" placeholder="Amount" required >
      </div>
      <p>Loan term in months</p>
     <div class="inp">
        <i class="far fa-calendar"></i> 
        <input type="number" id="Months" placeholder="Months" required>
        <br> <br> 
</div>
      <p>Add Interest fee</p>
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
<h1> Monthly Payments:</h1>
<h2 id="Loan" style="color:black"></h2> 
<hr/>
<h1> Yearly Payments:</h1>
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

</div>
</div>
</div>

<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
</body>
</html>
<?php
session_start(); 
//Making a variable to use from session
// In The Variable Username it is stored the username from the session,
//which was stored in the session when logged in from POST to _SESSION
$username = $_SESSION['username'];


include "../functions.php";
//We put the returned array from the func. into $result
$coinres= getcoins($username);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
* {
        font-family: 'Kumbh Sans', sans-serif;
    }

    body {
        height: 100%;
        overflow-x: hidden;
        margin: 0;
        background-color: #F5F7FA;
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
      <a href="#">View Transactions</a>
      <a href="Deposit.php">Deposit </a>
      <a href="#">Loan Coins</a>
    </div> 
  </div> </li>

  <li> <div class="dropdown">
    <button class="dropbtn">Statistics 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="#">View Transactions</a>
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
      <a href="../login.php">Log Out</a>
    </div> 
  </div> </li>
          
            <li class="signup"> <a class="signup" href="./login.php">My Wallet: <?php echo $coinres[0]; ?> Coins </a> </li>
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
      <p>Deposit Coins To Another User</p>
      <button class="card_btn"><a href="Deposit.php"> Deposit Now </a></button>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3>View Transactions</h3>
      <p>View All Your Transactions History</p>
      <button class="card_btn"> View Transactions </button>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3> Loan Coins</h3>
      <p>Pay It Afterwards With Or Without An Interest Rate</p>
      <button class="card_btn"> Loan Now </button>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3>Calculate Currency</h3>
      <p>Convert Your Coins To Other Currencies</p>
      <button class="card_btn"> Use Now </button>
    </div>
  </div>
</div>
</div>
</div>

</body>
</html>
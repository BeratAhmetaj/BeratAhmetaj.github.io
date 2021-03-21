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
      border: 2px solid red;
      border-top:0px;
 border-left:0px;
 border-right:0px;
      transition: 0.2s;
    }

    .inp:hover>i {
      color: red;
      transition: 0.2s;
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
      border: 2px solid red;
      border-top:0px;
 border-left:0px;
 border-right:0px;
    }
    button {
      border: 2px solid red;
      background-color: white;
      border-radius: 25px;
      font-size: 15px;
      padding-bottom: 5px;
      padding-top: 5px;
      padding-left: 15px;
      padding-right: 15px;
      transition: 0.5s;
      color: black;

    }

    button:hover {
      background-color: red;
      color: white;
      font-size: 16px;
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
.show{
  display:none;
     height: 0px; 
     overflow: visible;
     width:0px;
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
   p{
       margin-left:100px;
       margin-top:5px;
   }
</style>
</head>
<body>

<ul class="hide">
    <li><h1> <i class="fas fa-user-shield"></i>Privacy Settings </h1></li>
        </br>
        </br>
  <li><a  href="frame_BI.php"><i class="fas fa-question-circle"></i>Basic Information</a></li>
  <li><a href="frame_CI.php"><i class="fas fa-credit-card"></i>Card Information</a></li>
  <li><a class="active" href="frame_PP.php"><i class="fas fa-user-secret"></i>Privacy Policy</a></li>
</ul>

<div class="content" style="margin-left:15%;padding:1px 16px;height:1000px;">
  <h2>Privacy Policy for MoneyTree</h2>
  <h3>After Reading, Go To Main Hub To Get Started!</h3>
  <p>The MoneyTree project, accessible from moneytree-berat.000webhostapp.com, made by Berat Ahmetaj, our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by MoneyTree and how we use it.</p>

<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>

<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in MoneyTree. This policy is not applicable to any information collected offline or via channels other than this website.</p>

<h2>Consent</h2>

<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>

<h2>Information we collect</h2>

<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>
<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>
<p>When you register for an Account, your password is automatically encrypted on the database, we encrypt the most valuable information including Credit Card numbers and coin tokens.</p>


<script>
function AskAgain(){
    var r = confirm("Are You Sure You Want To Terminate All Your Data From This Website (Excluding Transaction Data) ?");
if (r == true) {
  txt = "Account Has Been Terminated.";
  window.location.href = 'DeleteAccount.php';

} else {

}
}
</script>
    <div class="show">
        </br>
        </br>
  <button class="showbtn"><a  href="frame_BI.php"><i class="fas fa-question-circle"></i>Basic</a></button>
  <button  class="showbtn"><a href="frame_CI.php"><i class="fas fa-credit-card"></i>Card </a></button>
  <button  class="showbtn"><a class="active" href="frame_PP.php"><i class="fas fa-user-secret"></i>Policy</a></button>
</div>
  </form>
</div>

</body>
</html>
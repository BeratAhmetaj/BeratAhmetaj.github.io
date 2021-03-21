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
      border: 2px solid black;
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
   a{
     text-decoration:none;
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
<h2>Privacy Policy</h2>
<p><strong>MoneyTree</strong> is committed to protecting the privacy of its users. This Privacy Policy (“Privacy Policy”) is designed to help you understand what information we gather, how we use it, what we do to protect it, and to assist you in making informed decisions when using our website.  Unless otherwise indicated below, this Privacy Policy applies to any website that references this Privacy Policy, any Company website, as well as any data the Company may collect across partnered and unaffiliated sites.</p>
<p>For purposes of this Agreement, the terms “we,” “us,” and “our” refer to the Company. “You” refers to you, as a user of the website. </p>
<h2>I. INFORMATION WE COLLECT</h2>
<p>We may collect both “Non-Personal Information” and “Personal Information” about you. “Non-Personal Information” includes information that cannot be used to personally identify you, such as anonymous usage data, general demographic information we may collect, referring/exit pages and URLs, platform types, preferences you submit and preferences that are generated based on the data you submit and number of clicks. “Personal Information” includes information that can be used to personally identify you, such as your name, address and email address.</p>
<h2>II. HOW WE USE AND SHARE INFORMATION</h2>
<p>We may collect both “Non-Personal Information” and “Personal Information” about you. “Non-Personal Information” includes information that cannot be used to personally identify you, such as anonymous usage data, general demographic information we may collect, referring/exit pages and URLs, platform types, preferences you submit and preferences that are generated based on the data you submit and number of clicks. “Personal Information” includes information that can be used to personally identify you, such as your name, address and email address.</p>
<h2>III. HOSTING</h2>
<p>Our website is hosted by 000webhost Hosting, Inc.  000webhost Hosting provides us with the online platform that allows us to provide the website to you.  Your information, including Personal Information, may be stored through InMotion Hosting servers.  By using the website, you consent to 000webhost’s collection, disclosure, storage, and use of your Personal Information in accordance with 000webhost’s privacy policy.   </p>
<button ><a href="../About_withoutnavbar.html"> Read Documentation [English] </a></button>
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
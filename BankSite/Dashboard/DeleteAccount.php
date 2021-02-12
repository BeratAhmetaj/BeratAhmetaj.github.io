<?php 
session_start(); 
//Making a variable to use from session
// In The Variable Username it is stored the username from the session,
//which was stored in the session when logged in from POST to _SESSION
$username = $_SESSION['username'];


include "../functions.php";

//We put the returned array from the func. into $result
$result= getname($username);

//Calling the function that deleted the Account situated at functions.php
DeleteAccount($username); 

?>
<!Doctype html>
<html>
    <head>
    <style>
    * {
       
        font-family: 'Kumbh Sans', sans-serif;
    }
   

body {
  margin: 0;
  background-color:#FCBF4C;
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
    padding-top:35px;
  font-size:25px;
  margin:10px;
  text-align: center;
  color:#7D3CF8;
}
p{
  font-size:15px;
  margin:10px;
  text-align: center;
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
      font-size: 20px;
      transition: 0.5s;
    }
    a{
      text-decoration:none;
    }
</style>
</head>
<body style="text-align:center;">
    <h1>Account Deleted Succesfully, You Can Now Log Out From This Website</h1>

<img src="../img/terminated.jpg">
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@300;400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
    integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <style>
    * {
      font-family: 'Kumbh Sans', sans-serif;
    }

    body {
      margin: 0;
      background-color: white;
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
      width: 32vh;
      padding-left: 25px;
      border: 2px solid rgb(168, 168, 168);
      border-radius: 30px;
      margin-top: 15px;
      transition: 0.5s;
    }

    .inp:hover {
      width: 34vh;
      border: 2px solid #7D3CF8;
      transition: 0.5s;
    }

    .inp:hover>i {
      color: #7D3CF8;
      transition: 0.5s;
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
      box-shadow: 1px 3px #7D3CF8;
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

    @keyframes logo {
      0% {
        transform: rotate(0deg);
      }

      50% {
        transform: rotate(180deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    .logo {
      width: 100px;
      animation-name: logo;
      animation-iteration-count: infinite;
      animation-duration: 5s;
    }

    h1 {
      color: #7D3CF8;
      font-size: 20px;

    }

    #particles-js {
      position: absolute;
      width: 100%;
      height: 100%;
      z-index: -1;
      opacity: 90%;
    
    }
  </style>
</head>

<body>

  <div id="particles-js"></div>

  <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"> </script>

  <script>
    particlesJS.load('particles-js', 'particles.json', function () {
      console.log('particles.js loaded.');
    });
  </script>
  <div class="center">
    <img class="logo" src="./img/moneytreelogo_00000.png">
    <h1>Grow Money Now.</h1>
    <form class="login" action="login_action.php" method="post">
      <br />

      <p> Login</p>
      <br />

      <?php 
      if (isset($_GET["error"])) 
        {
        if($_GET["error"] == "wronglogin") 
        {
        echo"<h2> Wrong Login Data </h2>";
        } 
        else if ($_GET["error"] == "smtmfailed") 
        {
          echo"<h2> Statement Failed </h2>";
        }
      }
      ?>

      <hr />
      <div class="container">
        <div class="inp">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Username" name="username" required>
          <br />
        </div>
        <div class="inp">
          <i class="fas fa-key"></i>
          <input type="password" placeholder="Password" name="pass" required>
        </div>
        <br /><br />
        <button type="submit" name="submit">Login</button>
      </div>
    </form>
  </div>
  <br />
  <br />
  <br />
  <div class="center">
    <form class="register" action="register_action.php" method="post">
      <br />
      <p> Register</p>
<?php
if (isset($_GET["error"])) {
if ($_GET["error"] == "passmatch") {
  echo"<h2> Passwords Dont Match </h2>";
} else if ($_GET["error"] == "usernametaken"){
  echo"<h2>Username Taken, Try Another One</h2>";
} else if ($_GET["error"] == "nicetry"){
  echo"<h2>Thats Now How The Internet Works Buddy.</h2>";
}
}
?>
      <hr />
      <div class="container">
        <br />
        <div class="inp">
          <i class="fas fa-envelope"></i>
          <label for="email"><b></b></label>
          <input type="email" placeholder="Enter Email" name="email" required>
        </div>
        <br />
        <div class="inp">
          <i class="fas fa-user"></i>
          <label for="Username"><b></b></label>
          <input type="text" placeholder="Enter Username" name="username" required>
        </div>
        <br />
        <div class="inp">
          <i class="fas fa-key"></i>
          <label for="pass"><b></b></label>
          <input type="password" placeholder="Enter Password" name="pass" required>
        </div>
        <br />
        <div class="inp">
          <i class="fas fa-key"></i>
          <label for="passRepeat"><b></b></label>
          <input type="password" placeholder="Repeat Password" name="passRepeat" required>
        </div>
        <br /><br />
        <button type="submit" name="submit">Register</button>
</body>

</html>
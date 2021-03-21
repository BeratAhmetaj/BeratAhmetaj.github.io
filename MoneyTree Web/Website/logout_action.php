<?php 
//Ги добиваме сите податоци од сесијата
$_SESSION = array();

// Ги бришиме сите податоци од сесијата
if( ini_get( "session.use_cookies" ) ) {
    $params = session_get_cookie_params();

    setcookie(
      session_name()
      , ''
      , time() - 42000
      , $params[ "path"     ]
      , $params[ "domain"   ]
      , $params[ "secure"   ]
      , $params[ "httponly" ]
    );
}

// и на крај го бришаме и самата сесија, со цел да нема траг од податоците
if( session_status() === PHP_SESSION_ACTIVE ) { session_destroy();}
header("Location: ./login.php?error=Logout");
?>
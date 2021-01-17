<?php

function IsEmpty($username, $pass, $email, $passRepeat) {
$result;
if (empty($username) || empty($pass) || empty($email) || empty($passRepeat) ) {
$result = true;
}
else
{
$result=false;
}
return $result;
}

function passwordCheck($pass, $passRepeat){
    if ($pass !== $passRepeat) {
        $result=true;  
    }
    else {
        $result=false;
    }
    return $result;
}

function usernameTaken($username, $connect, $email){
    // sql we want to inject
    $sql = "SELECT * FROM users WHERE Username = ? OR Email = ?;";

    //we make statement and we initialize it with connect
    $stmt = mysqli_stmt_init($connect);

    //if statemant is not prepared to take the statement and sql than we go to header location
    if( !mysqli_stmt_prepare($smtm, $sql)){
        header('location : login.html?error=SQL_Failed');
        exit();
    }

    //mysqli statemnt bind parameteres (we bind the statement, we type an s for every string we would like to attach, in this case 2 )
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    //we execute the statement with statement in parameter
    mysqli_stmt_execute($stmt);

    //we make the result into a variable
    $resultData = mysqli_stmt_get_result($stmt);


    //we make a varialble "row" to store the results we fetch
    if($row = mysqli_fetch_assoc($resultData)){
    //if row is true, than we return row, meaning we return true
     return $row;
      } else {
    //else false
        $result=false;
        return $result;
    }
    //we than close statement for security reasons ig
    mysqli_stmt_close($stmt);

}

function createUser ($connect, $username, $pass, $email) {
    $sql = "INSERT INTO users (Email,Password,Username) VALUES (?, ?, ?);";
    
    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        header('location : login.html?error=SQL_Failed');
     exit();
    }

$hashedpassword = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $email, $hashedpassword, $username);
    mysqli_stmt_execute($smtm);
    mysqli_stmt_close($stmt);

  header('location : login.html?error=none');
     exit();
}






?>
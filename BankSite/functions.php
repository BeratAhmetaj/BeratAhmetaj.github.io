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
    $sql = "SELECT * FROM users WHERE Username = ? OR Email = ?;";

    $stmt = mysqli_stmt_init($connect);

    if( !mysqli_stmt_prepare($smtm, $sqp)){
        header('location : login.html?error=SQL_Failed');
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
return $row;
    } else {
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}





?>
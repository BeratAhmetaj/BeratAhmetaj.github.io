<?php
//Login Check
function checkLogin($username, $pass){
include "dbinfo.php";

$hash_sql = "SELECT Pass FROM usersdata WHERE Username = '$username' ";
$result = mysqli_query($connect, $hash_sql);

//fetching the sql above and putting it in $row
$row = mysqli_fetch_assoc($result);

//verifying hashed password with php
$verify = password_verify($pass,$row["Pass"]);
 if($verify) {
    header("Location: ./Dashboard/main_hub.php ");
  } else { header("Location: ./login.php?error=wrongpass");}
}


//Password Match Check
function passwordCheck($pass, $passRepeat){
    if ($pass !== $passRepeat) {
        $result=true;  
    }
    else {
        $result=false;
    }
    return $result;
}

//Username Taken 
function usernameTaken($username, $connect){
    $sql = "SELECT * FROM usersdata WHERE Username = '$username';";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)) {
        return true;}
    else { 
        return false;}
}

//Creating user
function createUser($username,$pass,$email){
    include "dbinfo.php";
$hashedpass = password_hash($pass,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `usersdata` (`Id`, `Email`, `Pass`, `Username`) VALUES (NULL, '$email', '$hashedpass', '$username')";
    $result = mysqli_query($connect, $sql);
} 

//Adding the user on the moneydata Table with null coins and null transactions
function createmoney($username){
    include "dbinfo.php";
    $sql = "INSERT INTO `moneydata` (`Username`, `coins`, `num_transaction`) VALUES ('$username', NULL, NULL);";
    $result = mysqli_query($connect, $sql);
} 

//Getting Basic Infro From New Registered User
function BasicUserInfo($fullname,$adress,$embg){
    include "dbinfo.php";
    
    //strtolower so that it can be used in future searches for usersdata
    $fullname=strtolower($fullname);

    //Using Session username and making it into "ssusername"
    $ssusername = $_SESSION['username'];
    $sql = "UPDATE `usersdata` SET `EMBG` = '$embg', `NameSurname` = '$fullname', `LivingAdress` = '$adress' WHERE `usersdata`.`Username` = '$ssusername';";
    $result = mysqli_query($connect, $sql);

}

//Passes Credit Card Info Into The DB
function CreditInfo($CreditCard,$CVV,$Expiry){
    include "dbinfo.php";
    //Using Session username and making it into "ssusername"
    $ssusername = $_SESSION['username'];
    $hashedCredit = /*password_hash($CreditCard,PASSWORD_DEFAULT);*/ $CreditCard;
    $sql="UPDATE `usersdata` SET `CreditCard` = '$hashedCredit', `CVV` = '$CVV', `Expiry` = '$Expiry' WHERE `usersdata`.`Username` = '$ssusername';";
    $result = mysqli_query($connect, $sql);

}

//Gets Data from the usersdata Table (excluding Credit Card Info)
function getname($username){
    include "dbinfo.php";
    $sql = "SELECT * FROM usersdata WHERE Username = '$username';";
    $result = mysqli_query($connect, $sql);
    
    //fetching the sql above and putting it in $row
    $row = mysqli_fetch_assoc($result);
  
    $embg=$row["EMBG"];
    $namesurname=$row["NameSurname"];
    $livingadress=$row["LivingAdress"];
    $email=$row["Email"];
    $id=$row["Id"];
  
    
    /*  CODE NOT WORK, ako za sekoj slucaj ima komisija
    shto go gleda ova, ova e delot kaj shto kodot ne raboti :(
    $_SESSION['embg']=$embg;
    $_SESSION['namesurname']= $namesurname;
    $_SESSION['livingadress']=$livingadress;
    $_SESSION['email']=$email;
    $_SESSION['Id']=$id;
    */
   
    return array($embg, $namesurname, $livingadress, $email, $id);
}

//Gets Data From The Coins Table
function getcoins($username){
    include "dbinfo.php";
    $sql= "SELECT * FROM `moneydata` WHERE Username = '$username';";
    $rescoins = mysqli_query($connect, $sql);
    $row =mysqli_fetch_assoc($rescoins);

    $coins=$row["coins"];
    $num_transaction=$row["num_transaction"];
    
    return array($coins, $num_transaction);
}


//Terminates usersdata Account (Excluding Transaction Data)
function DeleteAccount($username){
include "dbinfo.php";
$sql = "DELETE FROM moneydata WHERE username='$username';";
$result = mysqli_query($connect, $sql);

$sql2 = "DELETE FROM usersdata WHERE username='$username';";
$result2 = mysqli_query($connect, $sql2);
}

//Checks if There is Enough moneydata on the usersdata account before depositing
function  Checkmoney($username,$Amount){
    include "dbinfo.php";
    $sql = "SELECT * FROM `moneydata` WHERE Username =  '$username'; ";
    $result = mysqli_query($connect,$sql);
    $row =mysqli_fetch_assoc($result);
    $coins=$row["coins"];

    if($coins<$Amount){
        header("Location: ./Deposit.php?error=nomoneydata");
    } else { 
        return true; 
    }
}

//Deposits usersdata moneydata into another account
//removes amount from his own account
//Adds a transaction on the transaction list
function Deposit($username,$ToUser,$Smetka,$Amount,$Reason){
include "dbinfo.php";

//Checks If ToUser Exists At All
$sqlx = "SELECT * FROM usersdata WHERE Username = '$ToUser';";
$resultx = mysqli_query($connect,$sqlx);
if(mysqli_num_rows($resultx)) {
   
}else { header("Location: ./Deposit.php?error=AccountNotExist");
    return 0; }



//Deposits usersdata moneydata into another account
$sql1="SELECT * FROM `moneydata` WHERE Username = '$ToUser';";
$result1=mysqli_query($connect,$sql1);
$row =mysqli_fetch_assoc($result1);
$Tocoins=$row["coins"];

$ToDeposit=$Tocoins+$Amount;

$sql2="UPDATE `moneydata` SET `coins` = '$ToDeposit' WHERE `Username` = '$ToUser' ;";
$result2=mysqli_query($connect,$sql2);


//Removes Amount From Senders Account
$sql3="SELECT * FROM `moneydata` WHERE Username = '$username' ;";
$result3=mysqli_query($connect,$sql3);
$row2 =mysqli_fetch_assoc($result3);
$Mycoins=$row2["coins"];

$TotalUsermoneydata=$Mycoins-$Amount;

$sql4="UPDATE `moneydata` SET `coins` = '$TotalUsermoneydata' WHERE `Username` = '$username' ;";
$result4=mysqli_query($connect,$sql4);

header("Location: ./Deposit.php?error=success");
}

//Get Credit Card Details To Use As Front-End For Depositing
function GetCard($username){
include "dbinfo.php";

$sql = "SELECT * FROM usersdata WHERE Username = '$username'; ";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

$NameSurname=$row["NameSurname"];
$CreditCard=$row["CreditCard"];
$CVV=$row["CVV"];
$Expiry=$row["Expiry"];

return array($NameSurname,$CreditCard,$CVV,$Expiry);
}

function StarterPack($username){
    include "dbinfo.php";
    $sql = "UPDATE `moneydata` SET `coins` = '100' WHERE `Username` = '$username'; ";
    $result = mysqli_query($connect,$sql);

    $sql2 = "UPDATE `moneydata` SET `num_transaction` = '0' WHERE `Username` = '$username'; ";
    $result2 = mysqli_query($connect,$sql2);
}

?>


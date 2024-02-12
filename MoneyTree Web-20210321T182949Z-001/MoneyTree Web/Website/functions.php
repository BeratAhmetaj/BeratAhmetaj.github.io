<?php
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Username Taken 
function usernameTaken($username, $connect){
    $sql = "SELECT * FROM usersdata WHERE Username = '$username';";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)) {
        return true;}
    else { 
        return false;}
}

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Creating user
function createUser($username,$pass,$email){
    include "dbinfo.php";
$hashedpass = password_hash($pass,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `usersdata` (`Id`, `Email`, `Pass`, `Username`, `EMBG`, `NameSurname`, `LivingAdress`, `CreditCard`,`CVV` ,`Expiry`) VALUES (NULL, '$email', '$hashedpass', '$username',NULL,NULL,NULL,NULL,NULL,NULL)";
    $result = mysqli_query($connect, $sql);
} 

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Adding the user on the moneydata Table with null coins and null transactions
function createmoney($username){
    include "dbinfo.php";
    $sql = "INSERT INTO `moneydata` (`Username`, `coins`, `num_transaction`,`Loan_Count`,`LoanAmount`) VALUES ('$username', NULL, NULL, NULL,NULL);";
    $result = mysqli_query($connect, $sql);
} 

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Passes Credit Card Info Into The DB
function CreditInfo($CreditCard,$CVV,$Expiry){
    include "dbinfo.php";
    //Using Session username and making it into "ssusername"
    $ssusername = $_SESSION['username'];
    $hashedCredit = $CreditCard;
    $sql="UPDATE `usersdata` SET `CreditCard` = '$hashedCredit', `CVV` = '$CVV', `Expiry` = '$Expiry' WHERE `usersdata`.`Username` = '$ssusername';";
    $result = mysqli_query($connect, $sql);

}

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Terminates usersdata Account (Excluding Transaction Data)
function DeleteAccount($username){
include "dbinfo.php";
$sql = "DELETE FROM moneydata WHERE username='$username';";
$result = mysqli_query($connect, $sql);

$sql2 = "DELETE FROM usersdata WHERE username='$username';";
$result2 = mysqli_query($connect, $sql2);
}

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Deposits usersdata moneydata into another account
//Steps:
//Checks If ToUser Exists At All
//Deposits usersdata moneydata into another account
//Get Transaction Number on user
//Add Transaction On User Who Sent It
//Removes Amount From Senders Account
//Adds All Transaction Data To Transaction History List
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

//Get Transaction Number on user
$sql6="SELECT * FROM `moneydata` WHERE Username = '$username' ;";
$result6=mysqli_query($connect,$sql6);
$row6=mysqli_fetch_assoc($result6);
$MyTransaction=$row6["num_transaction"];

//Add Transaction On User Who Sent It
$MyTransactionF=$MyTransaction+1;
$sql5="UPDATE `moneydata` SET `num_transaction` = '$MyTransactionF' WHERE `Username` = '$username' ;";
$result5=mysqli_query($connect,$sql5);


//Removes Amount From Senders Account
$sql3="SELECT * FROM `moneydata` WHERE Username = '$username' ;";
$result3=mysqli_query($connect,$sql3);
$row2 =mysqli_fetch_assoc($result3);
$Mycoins=$row2["coins"];

$TotalUsermoneydata=$Mycoins-$Amount;

$sql4="UPDATE `moneydata` SET `coins` = '$TotalUsermoneydata' WHERE `Username` = '$username' ;";
$result4=mysqli_query($connect,$sql4);

header("Location: ./Deposit.php?error=success");

//Adds All Transaction Data To Transaction History List

$sqltransaction="INSERT INTO `transactionsdata` (`UsersTransaction`,`transaction_id`, `FromUser`, `ToUser`, `Amount`, `Smetka`, `Reason`, `Date` ) VALUES ('$MyTransactionF',NULL, '$username', '$ToUser', '$Amount', '$Smetka', '$Reason', NULL ); ";
$resulttransaction=mysqli_query($connect,$sqltransaction);
}

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
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

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Giving a new user 100 coins and 0 transactions
function StarterPack($username){
    include "dbinfo.php";
    $sql = "UPDATE `moneydata` SET `coins` = '100' WHERE `Username` = '$username'; ";
    $result = mysqli_query($connect,$sql);

    $sql2 = "UPDATE `moneydata` SET `num_transaction` = '0' WHERE `Username` = '$username'; ";
    $result2 = mysqli_query($connect,$sql2);

    $sql3 = "UPDATE `moneydata` SET `Loan_Count` = '0' WHERE `Username` = '$username'; ";
    $result3 = mysqli_query($connect,$sql3);

    $sql4 = "UPDATE `moneydata` SET `LoanAmount` = '0' WHERE `Username` = '$username'; ";
    $result4 = mysqli_query($connect,$sql4);

}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Getting Number Of Transactions from user
function CountTransactions($username){
    include "dbinfo.php";
$sql="SELECT `num_transaction` FROM `moneydata` WHERE `Username` ='$username';";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);

$NumTrans=$row["num_transaction"];

return $NumTrans;
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Works with the PHP code on Transaction List Site to
//Procedurally generate transaction lists based on the total count ($integer)
//Which is incremented every time, it uses that incrementation to generate data
function GetTransaction($username,$integer){
    include "dbinfo.php";
    $sql="SELECT * FROM `transactionsdata` WHERE `FromUser` = '$username' AND `UsersTransaction` = '$integer';";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_assoc($result);

    $transactionid=$row["transaction_id"];
    $ToUser=$row["ToUser"];
    $Amount=$row["Amount"];
    $Smetka=$row["Smetka"];
    $Reason=$row["Reason"];
    $Date=$row["Date"];
    
    return array($transactionid,$ToUser,$Amount,$Smetka,$Reason,$Date);
}

////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Returns only one custom deposit from search
function GetCustomDeposit($ToUser,$username){
include "dbinfo.php";
$sql="SELECT * FROM `transactionsdata` WHERE `FromUser` = '$username' AND `ToUser` = '$ToUser' ;";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

    $transactionid=$row["transaction_id"];
    $ToUser=$row["ToUser"];
    $Amount=$row["Amount"];
    $Smetka=$row["Smetka"];
    $Reason=$row["Reason"];
    $Date=$row["Date"];
    
    return array($transactionid,$ToUser,$Amount,$Smetka,$Reason,$Date);
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//First Time User Information Storing into DB
function BasicUserFirst($fullname,$adress,$embg,$CreditCard,$CVV,$Expiry) {
    include "dbinfo.php";
    
    //strtolower so that it can be used in future searches for usersdata
    $fullname=strtolower($fullname);

    //Using Session username and making it into "ssusername"
    $ssusername = $_SESSION['username'];
    $sql = "UPDATE `usersdata` SET `EMBG` = '$embg', `NameSurname` = '$fullname', `LivingAdress` = '$adress' WHERE `usersdata`.`Username` = '$ssusername';";
    $result = mysqli_query($connect, $sql);

     $hashedCredit = $CreditCard;
     $sql2="UPDATE `usersdata` SET `CreditCard` = '$hashedCredit', `CVV` = '$CVV', `Expiry` = '$Expiry' WHERE `usersdata`.`Username` = '$ssusername';";
     $result2 = mysqli_query($connect, $sql2);
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Gets A List With Most Deposits
function getusersdeposit(){
include "dbinfo.php";

$sql="SELECT * FROM `moneydata` ORDER BY `num_transaction` DESC;";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

$username=$row["Username"];
$num_transaction=$row["num_transaction"];
$coins=$row["coins"];

return array($username,$num_transaction,$coins);
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Gets A List With Most Coins
function getusersmostcoins(){
    include "dbinfo.php";

$sql="SELECT * FROM `moneydata` ORDER BY `coins` DESC;";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_assoc($result);

$username=$row["Username"];
$num_transaction=$row["num_transaction"];
$coins=$row["coins"];

return array($username,$num_transaction,$coins);
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Counting Loaned Coins
function CountLoans($username){
    include "dbinfo.php";
$sql="SELECT `Loan_Count` FROM `moneydata` WHERE `Username` ='$username';";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);

$NumTrans=$row["Loan_Count"];

return $NumTrans;
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Counting Loaned Coins
function CountLoanedAmount($username){
    include "dbinfo.php";
    $sql3 = "SELECT `LoanAmount` FROM `moneydata` WHERE `Username` = '$username'; ";
    $result3 = mysqli_query($connect,$sql3);
    $row=mysqli_fetch_array($result3);
$NumAmount=$row["LoanAmount"];

return $NumAmount;
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Loaning Coins And Putting it on Count
function LoanAction($username,$Amount){

    //getting count
    include "dbinfo.php";
    $sql="SELECT `Loan_Count` FROM `moneydata` WHERE `Username` ='$username';";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_array($result);
$NumTrans=$row["Loan_Count"];

    //Updates Count (increment)
$Total=$NumTrans+1;
$sql2="UPDATE `moneydata` SET `Loan_Count` = '$Total' WHERE `Username` = '$username' ;";
$result2=mysqli_query($connect,$sql2);

//Getting Loaned Amount
$sql3 = "SELECT `LoanAmount` FROM `moneydata` WHERE `Username` = '$username'; ";
    $result3 = mysqli_query($connect,$sql3);
    $row=mysqli_fetch_array($result3);
$NumAmount=$row["LoanAmount"];

//Updating Amount
$TotalAmount=$NumAmount+$Amount;
$sql4="UPDATE `moneydata` SET `LoanAmount` = '$TotalAmount' WHERE `Username` = '$username' ;";
$result4=mysqli_query($connect,$sql4);

//Adding Amount to users wallet
$sql5= "SELECT `coins` FROM `moneydata` WHERE Username = '$username';";
$rescoins = mysqli_query($connect, $sql5);
$row =mysqli_fetch_assoc($rescoins);
$coins=$row["coins"];

$NewAmount=$coins+$Amount;
$sql6 = "UPDATE `moneydata` SET `coins` = '$NewAmount' WHERE `Username` = '$username'; ";
    $result = mysqli_query($connect,$sql6);
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
//Paying Loaned Money
function PayLoanAction($username){
    include "dbinfo.php";

//Check Loan Amount
$sql3 = "SELECT `LoanAmount` FROM `moneydata` WHERE `Username` = '$username'; ";
    $result3 = mysqli_query($connect,$sql3);
    $row=mysqli_fetch_array($result3);
$LoanAmount=$row["LoanAmount"];

//Checking Users Money
$sql = "SELECT * FROM `moneydata` WHERE Username =  '$username'; ";
$result = mysqli_query($connect,$sql);
$row =mysqli_fetch_assoc($result);
$coins=$row["coins"];

//Check if user can pay
if ($coins<$LoanAmount){
    header("Location: ./LoanCoins.php?error=nomoney");
} else{
 //Remove from user amount of money
 $usercoinsnow=$coins-$LoanAmount;
 $sql2 = "UPDATE `moneydata` SET `coins` = '$usercoinsnow' WHERE `Username` = '$username'; ";
    $result2 = mysqli_query($connect,$sql2);

 //Remove Loan from user
 $sql4 = "UPDATE `moneydata` SET `LoanAmount` = '0' WHERE `Username` = '$username'; ";
    $result4 = mysqli_query($connect,$sql4);
    header("Location: ./LoanCoins.php?error=payed");
}
}
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
?>
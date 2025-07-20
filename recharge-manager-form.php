<?php
session_start();
$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connection Faild");
}

$user = $_POST["user"] ?? '';
$number = $_POST["number"] ?? '';
$amount = $_POST["amount"] ?? '';

$nameErr = $numberErr = $amountErr = " ";
$isValid = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $isValid = true;

    if(empty($_POST["user"])){
        $nameErr = "User name is required.";
        $isValid = false;
    }else{
        $user = $_POST["user"];
        if(!preg_match("/^[a-zA-Z .'-]+$/", $user)){
            $nameErr = "Only type letters and space allowed in name";
            $isValid = false;
        }
    }

    if(empty($_POST["number"])){
        $number = "Number is required.";
        $isValid = false;
    }else{
        $number = $_POST["number"];
        if(!preg_match("/^[0-9]{11}$/", $number)){
            $numberErr = "Mobile number must be exactly 11 digits.";
            $isValid = false;
        }
    }

    if(empty($_POST["amount"])){
        $amountErr = "Amount is required.";
        $isValid = false;
    }else{
        $amount = $_POST["amount"];
        if(!is_numeric($amount)){
            $amountErr = "Amount must be a number.";
            $isValid = false;
        }
    }

    if($isValid){
        $result = $mysqli->prepare("INSERT INTO recharge(`user`,`number`,`amount`) VALUES(?, ?, ?)");
        $result->bind_param("ssi", $user, $number, $amount);

        if($result->execute()){
            header("location:recharge-form.php?message=saved");
            exit;
        }else{
            echo "Data wasn't saved.";
        }
    }
    else{
    $_SESSION["old_user"] = $user;
    $_SESSION["old_number"] = $number;
    $_SESSION["old_amount"] = $amount;
    $_SESSION["nameErr"] = $nameErr;
    $_SESSION["numberErr"] = $numberErr;
    $_SESSION["amountErr"] = $amountErr;
    header("location:recharge-form.php");
    exit;
}

}

?>

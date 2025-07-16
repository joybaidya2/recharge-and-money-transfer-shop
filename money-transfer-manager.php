<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "shop_db");
if ($mysqli->connect_error) {
    die("Connect faild") . $mysqli->connect_error;
}

$user = $_POST["user"] ?? ' ';
$services = $_POST["services"] ?? ' ';
$number = $_POST["number"] ?? '';
$amount = $_POST["amount"] ?? '';

$nameErr = $servicesErr = $numberErr = $amountErr = "";
$isValid = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isValid = true;

    if (empty($_POST["user"])) {
        $nameErr = "Name is required";
        $isValid = false;
    } else {
        $user = $_POST["user"];
        if (!preg_match("/^[a-z A-Z .'-]+$/", $user)) {
            $nameErr = "Only letters and spaces allowed in name";
            $isValid = false;
        }
    }

    if (empty($_POST["services"])) {
        $servicesErr = "Services is required";
        $isValid = false;
    } else {
        $services = $_POST["services"];
        if (!in_array($services, ['bkash', 'nagad', 'rocket'])) {
            $servicesErr = "Invalid service selected";
            $isValid = false;
        }
    }

    if (empty($_POST["number"])) {
        $numberErr = "Number is required";
        $isValid = false;
    } else {
        $number = $_POST["number"];
        if (!preg_match("/^[0-9]{11}$/", $number)) {
            $numberErr = "Phone number must be exactly 11 digits";
            $isValid = false;
        }
    }

    if (empty($_POST["amount"])) {
        $amountErr = "Amount is required";
        $isValid = false;
    } else {
        $amount = $_POST["amount"];
        if (!is_numeric($amount)) {
            $amountErr = "Amount must be a number";
            $isValid = false;
        }
    }

    if ($isValid) {
        $result = $mysqli->prepare("INSERT INTO money_transfer (`user`,`services`,`number`,`amount`) VALUES(?, ?, ?, ?) ");
        $result->bind_param("sssi", $user, $services, $number, $amount);

        if ($result->execute()) {
            header("location:money-transfer-form.php?message=saved");
            exit;
        } else {
            echo "Data Wasn't saved";
        }
    }else{
        $_SESSION["old_user"] = $user;
        $_SESSION["old_services"] = $services;
        $_SESSION["old_number"] = $number;
        $_SESSION["old_amount"] = $amount;
        $_SESSION["nameErr"] = $nameErr;
        $_SESSION["servicesErr"] = $servicesErr;
        $_SESSION["numberErr"] = $numberErr;
        $_SESSION["amountErr"] = $amountErr;
        header("location:money-transfer-form.php");
        exit;
    }
}

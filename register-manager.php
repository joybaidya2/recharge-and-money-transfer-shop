<?php
session_start();
$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connect Failed").$mysqli->connect_error;
}

$full_name = $_POST["fullname"] ?? '';
$email = $_POST["email"] ?? '';
$password = $_POST["password"] ?? '';
$cpassword = $_POST["cpassword"] ?? '';


$full_nameErr = $emailErr = $passwordErr = $cpasswordErr = "";
$isValid = true;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $isValid = true;

    if(empty($_POST["fullname"])){
        $full_nameErr = "Name is required!";
        $isValid = false;
    }else{
        $full_name = $_POST["fullname"];
        if(!preg_match("/^[a-zA-Z .'-]+$/",$full_name)){
           $full_nameErr = "Only letters and space allowed  in name";
           $isValid = false;
        }
    }

    if(empty($_POST["email"])){
        $emailErr = "Email is required!";
        $isValid = false;
    }else{
        $email = $_POST["email"];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = "Invaild Format";
            $isValid = false;
        }
    }

    if(empty($_POST["password"])){
        $passwordErr = "Password is required.!";
        $isValid = false;
    }elseif(empty($_POST["cpassword"])){
        $passwordErr = "Confirm password is required.!";
        $isValid = false;
    }elseif($password !== $cpassword){
        $cpasswordErr = "Passwords don't match.!";
        $isValid = false;
    }else{
        $password = $_POST["password"];
        if(strlen($password) < 8){
            $passwordErr = "Password must be at least 8 characters!";
            $isValid = false;
        }elseif(!preg_match("/[0-9]/",$password)){
            $passwordErr = "Password must be at least 1 number";
            $isValid = false;
        }elseif(!preg_match("/[a-z]/",$password)){
            $passwordErr = "Password must be at least 1 lowercase";
            $isValid = false;
        }elseif(!preg_match("/[A-Z]/",$password)){
            $passwordErr = "Password must be at least 1 uppercase";
            $isValid = false;
        }elseif(!preg_match("/[\W_]/",$password)){
            $passwordErr = "Password must be at least 1 special charter.!";
            $isValid = false;
        }
    }

    if($isValid){
        $check = $mysqli->prepare("SELECT id FROM users WHERE email = ?");
        $check->bind_param("s",$email);
        $check->execute();
        $check->store_result();
        if($check->num_rows > 0){
            $emailErr = "This mail already exists!";
            $isValid = false;
        }
        $check->close();
    }

    if($isValid){
        $has_pass = password_hash($password, PASSWORD_DEFAULT);
        $result = $mysqli->prepare("INSERT INTO users (`full_name`,`email`,`password`) VALUES (?, ?, ?)");
        $result->bind_param("sss",$full_name,$email,$has_pass);

        if($result->execute()){
            header("location:register-form.php?message=saved");
        }else{
            echo "Faild to save".$result->error;
        }
    }else{
        $_SESSION["old_full_name"] = $full_name;
        $_SESSION["old_email"]= $email;
        $_SESSION["old_password"] = $password;
        $_SESSION["old_cpassword"] = $cpassword;
        $_SESSION["full_nameErr"] = $full_nameErr;
        $_SESSION["emailErr"] = $emailErr;
        $_SESSION["passwordErr"] = $passwordErr;
        $_SESSION["cpasswordErr"] = $cpasswordErr;
        header("location:register-form.php");
        exit;
    }
    
}

?>
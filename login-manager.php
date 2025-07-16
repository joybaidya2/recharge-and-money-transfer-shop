<?php 
$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connect Faild").$mysqli->connect_error;
}

$email = $_POST["email"] ;
$password = $_POST["password"] ;

$result = $mysqli->query("SELECT * FROM users WHERE email = '".$email."'");
if($result && $result->num_rows > 0){
    $user = $result->fetch_assoc();
    if(password_verify($password, $user["password"])){
        session_start();
        $_SESSION["id"] = $user["id"];
        $_SESSION["email"] = $user["email"];
        header("location:home.php");
    }else{
        header("location:login-form.php?faild=true");
    }
}else{
    header("location:login-form.php?faild=true");
}

?>
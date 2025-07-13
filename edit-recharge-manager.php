<?php 
$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connect Faild").$mysqli->connect_error;
}

$user = $_POST["user"];
$number = $_POST["number"];
$amount = $_POST["amount"];
$recharge_id = $_POST["id"];


$result_saved = $mysqli->prepare("UPDATE recharge SET user=?, number=?, amount=? WHERE id = ?");
$result_saved->bind_param("sssi",$user, $number, $amount, $recharge_id);
if($result_saved->execute()){
    header("location:recharge-information-table.php?message=updated");
}else{
    echo "Faild to updated!";
}

?>
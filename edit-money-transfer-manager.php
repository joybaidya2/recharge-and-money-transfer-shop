<?php 
$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connect Faild".$mysqli->connect_error);
}

$user = $_POST["user"];
$services = $_POST["services"];
$number = $_POST["number"];
$amount = $_POST ["amount"];
$transfer_id = $_POST["id"];

$result_saved = $mysqli->prepare("UPDATE money_transfer SET user=?, services=?, number=?, amount=? WHERE id=? ");
$result_saved->bind_param("ssssi",$user,$services,$number,$amount,$transfer_id);
if($result_saved->execute()){
    header("location:money-transfer-information.php?message=updated");
}else{
    echo "Faild to updated!";
}
?>
<?php 
$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connect Faild").$mysqli->connect_error;
}

$transfer_id = $_GET["id"];
$deleted = $mysqli->prepare("DELETE FROM money_transfer WHERE id= ?");
$deleted->bind_param("i",$transfer_id);
if($deleted->execute()){
    header("location:money-transfer-information.php?message=deleted");
}else{
    echo "Faild to deleted!";
}
?>
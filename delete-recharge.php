<?php 
$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connect Faild").$mysqli->connect_error;
}

$recharge_id = $_GET["id"];
$deleted = $mysqli->prepare("DELETE FROM recharge WHERE id= ?");
$deleted->bind_param("i",$recharge_id);
if($deleted->execute()){
    header("location:recharge-information-table.php?message=deleted");
}else{
    echo "Faild to deleted!.";
}
?>
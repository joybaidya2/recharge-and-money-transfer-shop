<?php 
session_start();
if(!isset($_SESSION["id"])){
  header("location:error-404.php");
  exit;
}
$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connect successfully.!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Services Table</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-50 to-purple-100 min-h-screen py-10 px-4">

 <nav class="bg-gradient-to-r from-green-500 to-blue-600 text-white shadow-md fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
      <img src="https://cdn-icons-png.flaticon.com/512/2203/2203124.png" alt="Shop Logo" class="h-10 w-10">
      <span class="text-xl font-bold">Smart Shop</span>
    </div>
    <div id="nav-links" class="hidden md:flex space-x-6 text-lg">
      <a href="home.php" class="hover:underline block py-2">Home</a>
      <a href="recharge-information-table.php" class="hover:underline block py-2">Recharge list</a>
      <a href="money-transfer-information.php" class="hover:underline block py-2">Transfer list</a>
      <a href="recharge-form.php" class="hover:underline block py-2">Recharge</a>
      <a href="money-transfer-form.php" class="hover:underline block py-2">Send Money</a>
      <a href="Logout.php" class="hover:underline block py-2">Sign out</a>
    </div>
    <div class="md:hidden">
      <button id="menu-toggle" class="focus:outline-none">
        <svg class="w-8 h-8" fill="none" stroke="white" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"></path>
        </svg>
      </button>
    </div>
  </div>
  <div id="mobile-menu" class="md:hidden hidden px-6 pb-4"></div>
</nav>

<div class="max-w-7xl mx-auto mt-20">
  <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">
    <div class="bg-gradient-to-r from-teal-500 via-blue-500 to-purple-600 text-white text-center py-6">
      <h1 class="text-3xl font-bold tracking-wide">💼 Money Transfer History</h1>
    </div>

     <?php 
    if(isset($_GET["message"]) && $_GET["message"] == "deleted"){
       ?>
       <p style="text-align: center; color:red; font-size:x-large; font-weight:700; padding-top:6px; ">Money Transfer deleted successfully!</p>
       <?php
    }
    ?>
     <?php 
    if(isset($_GET["message"]) && $_GET["message"] == "updated"){
       ?>
       <p style="text-align: center; color:green; font-size:x-large; font-weight:700; padding-top:6px; ">Money Transfer updated successfully!</p>
       <?php
    }
    ?>

    <div class="overflow-x-auto p-6">
      <table class="min-w-full text-sm text-left">
        <thead class="bg-blue-100 text-blue-900 uppercase text-xs">
          <tr>
            <th class="px-6 py-3 rounded-tl-xl">Users</th>
            <th class="px-6 py-3">Services</th>
            <th class="px-6 py-3">Phone Number</th>
            <th class="px-6 py-3 text-center">Amount-BDT</th>
            <th class="px-6 py-3 text-center">Created At</th>
            <th class="px-6 py-3 rounded-tr-xl text-center">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-blue-200 bg-white">
          <?php 
          $result = $mysqli->query("SELECT * FROM money_transfer");
          while($row = $result->fetch_assoc()){
              echo "
              <tr class='hover:bg-blue-50 transition duration-200'>
                <td class='px-6 py-4 font-medium text-gray-900'>".$row['user']."</td>
                <td class='px-6 py-4 text-gray-700'>".$row['services']."</td>
                <td class='px-6 py-4 text-gray-700'>".$row['number']."</td>
                <td class='px-6 py-4 text-center text-green-600 font-bold'>".$row['amount']."</td>
                <td class='px-6 py-4 text-center text-gray-500'>".$row['created_at']."</td>
                <td class='px-6 py-4 text-center space-x-2'>
                  <a href='edit-money-transfer-form.php?id={$row['id']}' class='inline-block bg-green-500 text-white font-semibold py-1.5 px-4 rounded-xl hover:bg-green-600 transition duration-200 shadow-sm'>Edit</a>
                  <a href='delete-money-transfer.php?id={$row['id']}' class='inline-block bg-red-500 text-white font-semibold py-1.5 px-4 rounded-xl hover:bg-red-600 transition duration-200 shadow-sm'>Delete</a>
                </td>
              </tr>
              ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="javaScript.js"></script>
</body>
</html>

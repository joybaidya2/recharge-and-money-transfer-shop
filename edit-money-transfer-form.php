<?php 
session_start();
if(!isset($_SESSION["id"])){
    header("location:error-404.php");
    exit;
}

$mysqli = new mysqli("localhost","root","","shop_db");
if($mysqli->connect_error){
    die("Connect Faild".$mysqli->connect_error);
}

$id = $_GET["id"];
$result = $mysqli->prepare("SELECT * FROM money_transfer WHERE id = ?");
$result->bind_param("i",$id);
$result->execute();
$results = $result->get_result();
$row = $results->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Money Transfer Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
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
  <div id="mobile-menu" class="md:hidden hidden px-6 pb-4">
  </div>
</nav>

<section class="py-12 px-4 pt-32">
  <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg space-y-6">
    
    <h2 class="text-2xl font-bold text-center text-blue-600">Money Transfer Form</h2>

    <form action="edit-money-transfer-manager.php" method="POST" class="space-y-4 text-sm">
      <div>
        <label for="custName" class="block font-medium text-gray-700 mb-1">Customer Name</label>
        <input type="text" id="user" name="user" value="<?php echo $row["user"]; ?>" placeholder="Full Name"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 outline-none" required>
        <span class="text-red-500 text-sm"></span>
      </div>

      <div>
        <label for="method" class="block font-medium text-gray-700 mb-1">Transfer Method</label>
        <select id="services" name="services" value="<?php echo $row["services"]; ?>" 
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 outline-none" required>
          <option value="">-- Choose Method --</option>
          <option value="bkash">bKash</option>
          <option value="nagad">Nagad</option>
          <option value="rocket">Rocket</option>
        </select>
      </div>

      <div>
        <label for="receiverPhone" class="block font-medium text-gray-700 mb-1">Receiver Number</label>
        <input type="tel" id="number" name="number" value="<?php echo $row["number"]; ?>"  placeholder="01XXXXXXXXX"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 outline-none" required>
        <span class="text-red-500 text-sm"></span>
      </div>

      <div>
        <label for="amount" class="block font-medium text-gray-700 mb-1">Amount</label>
        <input type="number" id="amount" name="amount" value="<?php echo $row["amount"]; ?>"  placeholder="e.g. 500"
          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-500 outline-none" required>
        <span class="text-red-500 text-sm"></span>
      </div>

      <div>
        <button type="submit"
          class="w-full bg-gradient-to-r from-blue-500 to-green-500 text-white py-2 font-semibold rounded-md hover:from-blue-600 hover:to-green-600 transition duration-200 shadow">
          Send Money
        </button>
         <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" >
      </div>
    </form>
  </div>
</section>
</body>
</html>

<?php 
session_start();
if(!isset($_SESSION["id"])){
  header("location:error-404.php");
  exit;
}

$user = $_SESSION['old_user'] ?? '';
$number = $_SESSION['old_number'] ?? '';
$amount = $_SESSION['old_amount'] ?? '';

$nameErr = $_SESSION['nameErr'] ?? '';
$numberErr = $_SESSION['numberErr'] ?? '';
$amountErr = $_SESSION['amountErr'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Recharge Form</title>
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
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-lg">
      <h2 class="text-2xl font-bold mb-3 text-center text-blue-600">Recharge Form</h2>

      <?php
      if(isset($_GET["message"]) && $_GET["message"] == "saved"){
        ?>
        <p style="text-align: center; color:green; font-weight:700; font-size:larger; margin-bottom:8px;">Data Saved Successfully!</p>
        <?php
      }
      ?>

      <form action="recharge-manager-form.php" method="POST" class="space-y-4 text-sm">
        <div>
          <label for="name" class="block mb-1 text-gray-700 font-medium">Customer Name</label>
          <input type="text" id="user" name="user" value="<?php echo htmlspecialchars($user) ?>" placeholder="Enter full name"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
            <span class="text-red-500 text-sm"><?php echo $nameErr; ?></span>
        </div>

        <div>
          <label for="phone" class="block mb-1 text-gray-700 font-medium">Customer Number</label>
          <input type="tel" id="number" name="number" value="<?php echo htmlspecialchars($number) ?>" placeholder="01XXXXXXXXX"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <span class="text-red-500 text-sm"><?php echo $numberErr; ?></span>
        </div>

        <div>
          <label for="amount" class="block mb-1 text-gray-700 font-medium">Recharge Amount</label>
          <input type="number" id="amount" name="amount" value="<?php echo htmlentities($amount)?>" placeholder="e.g. 500"
            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
            <span class="text-red-500 text-sm"><?php echo $amountErr; ?></span>
        </div>

        <div>
          <button type="submit"
            class="w-full bg-gradient-to-r from-green-500 to-blue-600 text-white font-semibold py-2 rounded-md shadow-md hover:from-green-600 hover:to-blue-700 transition duration-200">
            Saved Information
          </button>
        </div>
      </form>
    </div>
  </section>

</body>
</html>

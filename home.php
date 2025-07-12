<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Smart Recharge Point</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

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

  <section class="text-center py-20 bg-gradient-to-r from-blue-500 to-indigo-700 text-white mt-16">
    <h1 class="text-4xl md:text-5xl font-bold mb-4"> Mobile Recharge & Money Transfer Shop</h1>
    <p class="text-lg md:text-xl mb-6">Recharge, bKash, Rocket, Nagad – Everything in One Place</p>
    <a href="#" class="inline-block px-8 py-3 bg-white text-blue-600 font-semibold rounded-full shadow-md hover:bg-gray-100 transition">Start Now</a>
  </section>

  <section class="py-16 px-6 md:px-20 bg-white text-center">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">Our Services</h2>
    <p class="mb-12 text-gray-600">We offer secure and instant mobile services through trusted platforms.</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="p-6 bg-blue-100 rounded-xl shadow hover:shadow-lg transition">
        <img src="https://cdn-icons-png.flaticon.com/512/10483/10483879.png" alt="Recharge" class="h-16 mx-auto mb-4">
        <h3 class="text-xl font-semibold mb-2">Mobile Recharge</h3>
        <p>Top-up any operator instantly. Robi, Airtel, Grameenphone, Teletalk & more.</p>
      </div>
      <div class="p-6 bg-green-100 rounded-xl shadow hover:shadow-lg transition">
        <img src="https://cdn-icons-png.flaticon.com/512/10882/10882139.png" alt="bKash" class="h-16 mx-auto mb-4">
        <h3 class="text-xl font-semibold mb-2">bKash & Nagad</h3>
        <p>Send or receive money via bKash, Nagad with full security & speed.</p>
      </div>
      <div class="p-6 bg-purple-100 rounded-xl shadow hover:shadow-lg transition">
        <img src="https://cdn-icons-png.flaticon.com/512/10882/10882225.png" alt="Rocket" class="h-16 mx-auto mb-4">
        <h3 class="text-xl font-semibold mb-2">Rocket Transactions</h3>
        <p>Rocket cash-in/out and transfers made easy with full reliability.</p>
      </div>
    </div>
  </section>

  <footer class="bg-blue-600 text-white text-center py-6 mt-10">
    <p>&copy; Developed by Joy. All rights reserved.</p>
  </footer>

  <script src="javaScript.js"></script>

</body>
</html>

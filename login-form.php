<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-purple-700 mb-6">Login</h2>

   

    <form action="login-manager.php" method="POST" class="space-y-4">
      <div>
        <label class="block text-gray-700 font-medium mb-1" for="email">Email Address</label>
        <input type="email" id="email" name="email" placeholder="you@example.com" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
        <?php 
        if(isset($_GET["failds"]) && $_GET["failds"] == "true"){
        ?>
        <p style="color: red;">Incorrect email!</p>
        <?php }?>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1" for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
        <?php 
        if(isset($_GET["faild"]) && $_GET["faild"] == "true"){
        ?>
        <p style="color: red;">Incorrect password!</p>
        <?php }?>
      </div>

      <div class="flex items-center justify-between">
        <label class="flex items-center text-sm text-gray-600">
          <input type="checkbox" class="mr-2"> Remember me
        </label>
        <a href="#" class="text-sm text-purple-600 hover:underline">Forgot password?</a>
      </div>

      <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-2 rounded-lg text-lg font-semibold hover:from-pink-500 hover:to-purple-500 transition duration-300">
        Login
      </button>
      <p class="text-center text-sm text-gray-600 mt-4">
         Don't have an account?
      <a href="register-form.php" class="text-purple-600 hover:underline font-medium">Register here</a>
</p>
    </form>
  </div>

</body>
</html>

<?php 
session_start();
$full_name = $_SESSION['old_full_name'] ?? '';
$email = $_SESSION['old_email'] ?? '';
$password = $_SESSION['old_password'] ?? '';
$cpassword = $_SESSION['old_cpassword'] ?? '';
$full_nameErr = $_SESSION['full_nameErr'] ?? '';
$emailErr = $_SESSION['emailErr'] ?? '';
$passwordErr = $_SESSION['passwordErr'] ?? '';
$cpasswordErr = $_SESSION['cpasswordErr'] ?? '';
session_unset();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register Form</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center">

  <div class="bg-white p-8 rounded-2xl shadow-2xl w-full max-w-md">
    <h2 class="text-3xl font-bold text-center text-purple-700 mb-6">Create Account</h2>

    <?php 
    if(isset($_GET["message"]) && $_GET["message"] == "saved"){
    ?>
    <p style="text-align: center; color:green; font-weight:700; font-size:larger;">Register Successfully.</p>
    <?php
    } 
    ?>

    <form action="register-manager.php" method="POST" class="space-y-4">
      <div>
        <label class="block text-gray-700 font-medium mb-1" for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" value="<?php echo htmlspecialchars($full_name) ?>"  placeholder="Your full name" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
        <p style="color: red; padding-top:4px;"><?php echo $full_nameErr;?></p>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1" for="email">Email Address</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email) ?>" placeholder="you@example.com" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
        <p style="color: red; padding-top:4px;"><?php echo $emailErr;?></p>

      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1" for="password">Password</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($password) ?>" placeholder="Enter password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
        <p style="color: red; padding-top:4px;"><?php echo $passwordErr;?></p>
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1" for="confirm-password">Retype Password</label>
        <input type="password" id="cpassword" name="cpassword" value="<?php echo htmlspecialchars($cpassword) ?>" placeholder="Retype password" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-purple-500 focus:outline-none" required>
        <p style="color: red; padding-top:4px;"><?php echo $cpasswordErr;?></p>
      </div>

      <button type="submit" class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-2 rounded-lg text-lg font-semibold hover:from-pink-500 hover:to-purple-500 transition duration-300">
        Register
      </button>
      <p class="text-center text-sm text-gray-600 mt-4">
        Already have an account?
        <a href="login-form.php" class="text-purple-600 hover:underline font-medium">Login here</a>
      </p>
    </form>
  </div>

</body>
</html>

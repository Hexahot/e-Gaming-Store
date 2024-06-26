<?php
session_start();
require 'config.php';
cookieCheck();

if (isset($_SESSION["loginAdmin"])) {
  header('Location: admin/products/index.php');
  exit;
}
if (isset($_SESSION["loginUser"])) {
  header('Location: index.php');
  exit;
}

if (isset($_POST["submitLogin"])) {
  if (login($_POST) > 0) {
    echo "
            <script>
            alert('Login Successful!');
            </script>";
  } else {
    echo "<script>
            alert('Login failed!');
            </script>";
  }
};

if (isset($_POST["submitRegis"])) {
  if (register($_POST) > 0) {
    echo "
            <script>
            alert('Registration Successful!');
            </script>";
  } else {
    echo "<script>
            alert('Registration failed!');
            </script>";
  }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;700;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <title>Login & Registration Form</title>
  <link rel="stylesheet" href="./resources/css/auth.css">
</head>

<body>
  <div class="container">
    <div class="forms">
      <!-- LOGIN -->
      <div class="form login">
        <span class="title">Log In</span>
        <form action="#" method="post">
          <div class="input-field">
            <input type="text" name="username" placeholder="Your Username" required>
            <i class="uil uil-envelope icon"></i>
          </div>

          <div class="input-field">
            <input type="password" name="password" class="password" placeholder="Your Password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <div class="checkbox-text">
            <div class="checkbox-content">
              <input type="checkbox" id="logCheck">
              <label for="logCheck" class="text">Stay logged in</label>
            </div>
          </div>

          <div class="input-field button">
            <input type="submit" name="submitLogin" value="Log In">
          </div>
        </form>

        <!-- Submit Login -->
        <div class="login-signup">
          <span class="text">Not registered yet?
            <a href="#" class="text signup-link">Sign Up Now</a>
          </span>
        </div>
      </div>

      <!-- SIGN UP -->
      <div class="form signup">
        <span class="title">Sign Up</span>
        <form method="post">
          <div class="input-field">
            <input type="text" name="fullname" placeholder="Enter your full name" required>
            <i class="uil uil-user"></i>
          </div>
          <div class="input-field">
            <input type="text" name="user" placeholder="Enter your username" required>
            <i class="uil uil-user"></i>
          </div>
          <div class="input-field">
            <input type="email" name="email" placeholder="Enter your email" required>
            <i class="uil uil-envelope icon"></i>
          </div>
          <div class="input-field">
            <input type="password" class="password" name="pass" placeholder="Create a password" required>
            <i class="uil uil-lock icon"></i>
          </div>
          <div class="input-field">
            <input type="password" class="password" name="cpass" placeholder="Confirm password" required>
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
          </div>

          <!-- Submit Register -->
          <div class="input-field button">
            <input type="submit" name="submitRegis" value="Sign Up">
          </div>
        </form>

        <div class="login-signup">
          <span class="text">Already registered?
            <a href="#" class="text login-link">Log In Now</a>
          </span>
        </div>
      </div>
    </div>
  </div>

  <script src="./resources/js/auth.js"></script>
</body>

</html>

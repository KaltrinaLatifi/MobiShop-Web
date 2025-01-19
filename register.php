<?php
include "class.php";
session_start();

$registerLogin = new LoginRegister();
if (isset($_POST['register'])) {
  $registerLogin->register($_POST);
  $error = $registerLogin->get_errors();
}
if (isset($_POST['login'])) {
  $registerLogin->login($_POST);
  $get_errors_login = $registerLogin->get_errors_login_all();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="./styles/all.min.css" />
  <link rel="stylesheet" href="./styles/loginRegister.css" />
  <link rel="stylesheet" href="./styles/general.css" />
  <link rel="stylesheet" href="./styles/reset.css" />
</head>

<body>
  <div class="loginRegisterContent">
    <form class="loginRegisterForm" id="registerForm" method="Post">
      <h3>Register</h3>
      <div class="input">
        <label for="registerFirstName">First Name</label>
        <input type="text" name="name" id="registerFirstName" />
        <div class="error"></div>
      </div>
      <div class="input">
        <label for="registerLastName">Last Name</label>
        <input type="text" name="lname" id="registerLastName" />
        <div class="error"></div>
      </div>
      <div class="input">
        <label for="registerEmail">Email</label>
        <input name="email" id="registerEmail" />
        <div class="error"></div>
      </div>
      <div class="input">
        <label for="registerPassword">Password</label>
        <input type="password" name="password" id="registerPassword" />
        <div class="error"></div>
      </div>
      <div class="input">
        <label for="registerConfrimPassword">Confrim Password</label>
        <input type="password" name="confirmPassword" id="registerConfrimPassword" />
        <div class="error"></div>
      </div>
      <?php
      if (isset($error)) {
        foreach ($error as $e) { ?>
          <div class='error' id='error'>
            <button type='button' id='closeBtn'>&times;</button>
            <?php echo $e; ?>
          </div>
        <?php }
      } ?>
      <button type="submit" name="register" id='submit'>Register</button>
      <div>
        <p style = "color:white;">Already Registered? <a  style =" color: #6e695d;" href="./login.php">Login</a></p>
      </div>
    </form>
  </div>

  <script>
    document.getElementById("closeBtn").addEventListener("click", function () {
      document.getElementById("error").style.display = "none";
    });
  </script>
  <script src="./scripts/index.js"></script>
  <!-- <script src="./scripts/registerValidation.js"></script> -->
</body>

</html>
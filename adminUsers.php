<?php
include "classProduct.php";
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] != "admin") {
  header("Location: login.php");
  exit();
}

$users = new Products();

$display = $users->displayUsers();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MobiShop</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="./styles/all.min.css" />
  <link rel="stylesheet" href="./styles/index.css" />
  <link rel="stylesheet" href="./styles/general.css" />
  <link rel="stylesheet" href="./styles/reset.css" />
  <link rel="stylesheet" href="./styles/admin.css" />
</head>

<body>
  <div id="index">
    <header id="header">
      <div class="headerPhoneContent container">
        <div class="part1">
          <a href="./adminDashboard.php" class="headerIcon">Dashboard <span></span></a>
          <i id="hamburgerMenuIcon" class="fa-solid fa-bars"></i>
        </div>
        <div id="dropdownLinks" class="dropdownLinks">
          <a href="./aboutUs.php">About Us</a>
          <a href="./logout.php">Log Out</a>
          <p>
            <?php
            if (isset($_SESSION['user'])) {
              $name = $_SESSION['name'];
              echo "<p>$name</p>";
            }
            ?>
          </p>
        </div>
      </div>
      <div class="headerDestopContent container">
        <a href="./adminDashboard.php" class="headerIcon">Dashboard <span></span></a>
        <div class="headerLinks">
          <a href="./aboutUs.php">About Us</a>
          <a href="./logout.php">Log Out</a>
          <p>
            <?php
            if (isset($_SESSION['user'])) {
              $name = $_SESSION['name'];
              echo "<p>$name</p>";
            }
            ?>
          </p>
        </div>
      </div>
    </header>

    <div class="adminDashboard container">
      <h5>Users</h5>
      <table  style="width:100%">
        <thead>
          <tr>
            <th>Name</th>
            <th>Surname</th>
            <th>Email</th>
            <th>Created Date</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (count($display)) {
            foreach ($display as $row) {
              ?>
              <tr>
                <td>
                  <?php echo ucfirst($row['name']) ?>
                </td>
                <td>
                  <?php echo  ucfirst($row['lastname']) ?>
                </td>
                <td>
                  <?php echo $row['email'] ?>
                </td>
                <td>
                  <?php echo $row['created_date'] ?>
                </td>
              </tr>
            <?php }
          } ?>
        </tbody>
      </table>
    </div>
    <?php include "footer.php" ?>

    <script src="./scripts/index.js"></script>

</body>

</html>
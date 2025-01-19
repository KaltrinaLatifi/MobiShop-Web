<?php

include "classProduct.php";
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] != "admin") {
    header("Location: login.php");
    exit();
}
$addProducts = new Products();

if (isset($_POST['submit'])) {
    $addProducts->add_Products($_POST);
}
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
                    <a href="adminDashboard.php" class="headerIcon">Dashboard <span></span></a>
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
        <div class='adminDashboard'>
            <h5>
                Add New Products
            </h5>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                enctype="multipart/form-data">
                <div class="input">
                    <label>Title</label>
                    <input name="title" required>
                </div>
                <div class="input">
                    <label>Display</label>
                    <input type="text" name="display" required>
                </div>
                <div class="input">
                    <label>Price</label>
                    <input type="number" name="price" required>
                </div>
                <div class="input">
                    <label>Hardware</label>
                    <input type="text" name="hardware" crequired>
                </div>
                <div class="input">
                    <label>Camera</label>
                    <input type="text" name="camera" required>
                </div>
                <div class="input">
                    <label>Battery</label>
                    <input type="text" name="battery" required>
                </div>
                <div class="input">
                    <label>Qty</label>
                    <input type="number" name="qty" required>
                </div>
                <div class="input">
                    <label>Select a file</label>
                    <input name="file" type="file" id="formFileMultiple" multiple>
                </div>
                <div class="addProductFormButton">
                    <button name="submit" type="submit">Add</button>
                </div>
            </form>
        </div>
        
    </div>
    
    <?php include "footer.php" ?>
    <script src="./scripts/index.js"></script>

</body>

</html>
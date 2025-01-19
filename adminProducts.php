<?php
include "classProduct.php";
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] != "admin") {
    header("Location: login.php");
    exit();
}


$products = new Products();

$display = $products->displayProduct();

if (isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $products->delete($deleteId);
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
                All Products
            </h5>
            <table style="width:100%">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Hardware</th>
                        <th>Battery</th>
                        <th>Action</th>
                        <th>Display</th>
                        <th>Camera</th>
                        <th>Quantity</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    if (count($display)) {
                        foreach ($display as $row) {
                            ?>
                            <tr>

                                <td>
                                    <?php echo ucfirst($row['title']) ?>
                                </td>
                                <td>
                                    <?php echo $row['price'] ?> €
                                </td>

                                <td>
                                    <?php echo $row['hardware'] ?>
                                </td>
                                <td>
                                    <?php echo $row['battery'] ?>
                                </td>
                                <td>
                                    &nbsp;
                                    <a href="adminProducts.php?deleteId=<?php echo $row['id'] ?>"
                                        onclick="confirm('Are you sure want to delete this record')"><i class="fas fa-trash-alt"></i> Delete</a>
                                </td>

                                <td>
                                    <?php echo $row['display'] ?>
                                </td>
                                <td>
                                    <?php echo $row['camera'] ?>
                                </td>
                                <td>
                                    <?php echo $row['qty'] ?>
                                </td>
                                <td>
                                    <?php $result = $row['images'] ?>
                                    <img src="./image/<?php echo $result ?>" width="50" height="50">

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
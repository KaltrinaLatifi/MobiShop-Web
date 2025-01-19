<?php

session_start();
include "classProduct.php";
if (!isset($_SESSION['user']) || $_SESSION['user'] != "user") {
    header("Location: login.php");
    exit();
}

$Products = new Products();
if (isset($_GET["action"])) {
    if ($_GET["action"] == "show") {
        $id = $_GET['id'];
        $query = "SELECT * FROM products WHERE id = $id";
        $res = $Products->con->query($query);
        $result = $res->fetch_all(MYSQLI_ASSOC);
        $total_row = $res->num_rows;
    }
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="./styles/all.min.css" />
    <link rel="stylesheet" href="./styles/product.css" />
    <link rel="stylesheet" href="./styles/general.css" />
    <link rel="stylesheet" href="./styles/reset.css" />
</head>

<body>
    <div id="product">
        <header id="header">
            <div class="headerPhoneContent container">
                <div class="part1">
                    <a href="./userPage" class="headerIcon">MobiShop <span></span></a>
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
                <a href="./userPage.php" class="headerIcon">MobiShop<span></span></a>
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
        <div class="productContent ">
            <?php
            if ($total_row > 0) {
                foreach ($res as $row) {
                    ?>
                    <div class="productDetails container">
                        <div class="productImg">
                            <img src="./image/<?php echo $row['images'] ?>" alt="..." />
                        </div>
                        <div class="productInfos">
                            <h4>
                                <?php echo $row['title'] ?>
                            </h4>
                            <div>
                                <div class="productInfo">
                                    <p>Price: <?php echo $row['price'] ?>€</p>
                                </div>
                                <div class="productInfo">
                                    <p>Display: <?php echo $row['display'] ?></p>
                                </div>
                                <div class="productInfo">
                                    <p>Hardware: <?php echo $row['hardware'] ?></p>
                                </div>
                                <div class="productInfo">
                                    <p>Camera: <?php echo $row['camera'] ?></p>
                                </div>
                                <div class="productInfo">
                                    <p>Battery: <?php echo $row['battery'] ?></p>
                                </div>
                                <div class="productInfo">
                                    <p>Quantity: <?php echo $row['qty'] ?></p>
                                </div>
                            </div>
                            <button type="button">Buy Now</button>
                        </div>

                    </div>
                <?php }
            } ?>

        </div>
    </div>
    
    <?php include "footer.php" ?>

    <script src="./scripts/index.js"></script>

</body>

</html>
<?php
session_start();
include "classProduct.php";
if (!isset($_SESSION['user']) || $_SESSION['user'] != "user") {
    header("Location: login.php");
    exit();
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
    <link rel="stylesheet" href="./styles/products.css" />
</head>

<body>
    <div id="index">
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
                <a href="./userPage.php" class="headerIcon">MobiShop <span></span></a>
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
        <div class='productsContent'>
            <h2 class='container'>Products</h2>
            <div class='productsCards container'>
                <?php
                $products = new Products();
                $result = $products->displayProduct();
                foreach ($result as $product) {
                    ?>
                    <div class='productCard'>
                        <div class="cardImg">
                            
<img src="./image/<?php echo $product['images']; ?>" alt="product image">
                        </div>

                        <div class="cardContent">
                            <div class="part1">
                                <p>
                                    <?php echo $product['title']; ?>
                                </p>
                                <p>
                                    <?php echo $product['price']; ?><span>€</span>
                                </p>
                            </div>
                            <div class="part2">
                                <a href="userProduct.php?action=show&id=<?php echo $product['id'] ?>">View</a>

                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
        <?php include "footer.php" ?>
    </div>

    <script src="./scripts/index.js"></script>

</body>

</html>
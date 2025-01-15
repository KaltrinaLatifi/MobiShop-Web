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

</head>

<body>
  <div id="index">
    <header id="header">
      <div class="headerPhoneContent container">
        <div class="part1">
          <a href="./index.php" class="headerIcon">MobiShop<span></span></a>
          <i id="hamburgerMenuIcon" class="fa-solid fa-bars"></i>
        </div>
        <div id="dropdownLinks" class="dropdownLinks">
          <a href="./aboutUs.php">About Us</a>
          <a href="./login.php">Login</a>
          <a href="./register.php">Register</a>
        </div>
      </div>
      <div class="headerDestopContent container">
        <a href="./index.php" class="headerIcon">MobiShop <span></span></a>
        <div class="headerLinks">
          <a href="./aboutUs.php">About Us</a>
          <a href="./login.php" class="login">Login</a>
          <a href="./register.php" class="register">Register</a>
        </div>
      </div>
    </header>
    <div class="indexContent">
      <div class="indexContentPart1">
      <div class="container">
            <h1>
            <span></span> <br> Discover the Latest in <span>Smartphones</span>
            </h1>
          </div>
        <div></div>
        <div class="reasons container">Top-rated phones for productivity, gaming and everyday use</div>
      </div>
      <div class="coloredbg">
        <div class="indexContentPart2 container">
          <div class="part2Item">
          <img src="./image/Photo1.jpg" alt="" />
            <div class="text">
            <h2>Competitive <span>Prices</span> and <span>Special</span> Offers</h2>
            <p>
                  We offer affordable prices and special discounts on the latest models and popular phones,
                   ensuring customers get great value for their money.
                </p>
            </div>
          </div>
          <div class="part2Item reverse">
          <img src="./image/Photo2.jpg" alt="" />
            <div class="text">
            <h2> <span>Fast</span> and <span>Convenient</span>Shopping Experience</h2>
            <p>You can buy your phone online and enjoy quick delivery, including free shipping to certain areas, for a seamless and fast shopping experience.</p>
            </div>
          </div>
          <div class="part2Item">
          <img src="./image/Photo3.jpg" alt="" />
            <div class="text">
            <h2><span>Wide Selection</span></h2>
            <p>
                  We offer a broad range of brands and models to meet the needs and budgets of all customers, 
                  giving you plenty of options to choose from.
                </p>
            </div>
          </div>
        </div>
        <div class="homeLastSection container">
        <p>
              If you are interested in buying a phone, you can explore our wide selection of the latest models and enjoy competitive prices, 
              excellent customer service, and fast delivery options.
            </p>
            <a href="./login.php">Purchase Now</a>
        </div>
      </div>
    </div>
    <?php include "footer.php" ?>
  </div>
  <script src="./scripts/index.js"></script>
</body>

</html>
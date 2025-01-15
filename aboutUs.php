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
  <link rel="stylesheet" href="./styles/general.css" />
  <link rel="stylesheet" href="./styles/reset.css" />
  <link rel="stylesheet" href="./styles/aboutUs.css" />


</head>

<body>
  <header id="header">
    <div class="headerPhoneContent container">
      <div class="part1">
        <a href="./index.php" class="headerIcon">MobiShop <span></span></a>
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
  <div class="slider">
    <div class="slider-container">
      <div class="slide">
        <img src="./image/AboutUs.jpg" alt="Image 1" />
      </div>
      <div class="slide">
        <img src="./image/AboutUs2.jpg" alt="Image 2" />
      </div>
      <div class="slide">
        <img src="./image/AboutUs3.jpg" alt="Image 3" />
      </div>
      <div class="slide">
        <img src="./image/AboutUs4.jpg" alt="Image 4" />
      </div>
      <div class="slide">
        <img src="./image/AboutUs5.jpg" alt="Image 4" />
      </div>
     </div>
      <div class="silderButtons">
      <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
      <button class="next" onclick="moveSlide(1)">&#10095;</button>
      </div>
    </div>
  </div>
  <?php include "footer.php" ?>
</body>


<script>
 
let slideIndex = 0;

function moveSlide(direction) {
  const slides = document.querySelectorAll('.slide');
  slideIndex += direction;

  if (slideIndex >= slides.length) {
    slideIndex = 0;
  }
  if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  }


  const sliderContainer = document.querySelector('.slider-container');
  sliderContainer.style.transform = `translateX(${-100 * slideIndex}%)`;
}

</script>
</html>
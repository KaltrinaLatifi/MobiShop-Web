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

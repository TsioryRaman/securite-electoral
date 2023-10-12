
const carouselItems = document.querySelectorAll('.carousel-item');
let currentSlide = 0;

function showSlide(n) {
    carouselItems.forEach(item => item.classList.remove('active'));
    carouselItems[n].classList.add('active');
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % carouselItems.length;
    showSlide(currentSlide);
}

const interval = 3000; // Définir l'intervalle en millisecondes (par exemple, 3 secondes)
setInterval(nextSlide, interval);

console.log("tgt")


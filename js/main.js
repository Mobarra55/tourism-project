
let currentSlide = 1;

function showSlide(n) {
    // hide all slides
    const slides = document.querySelectorAll('.slide');
    slides.forEach(slide => slide.classList.remove('active'));

    // all dots r inactive
    const dots = document.querySelectorAll('.dot');
    dots.forEach(dot => dot.classList.remove('active'));

    // shoe curret slide
    slides[n - 1].classList.add('active');
    dots[n - 1].classList.add('active');
}

// slide chnge when hit on dot
document.querySelectorAll('.dot').forEach((dot, index) => {
    dot.addEventListener('click', () => {
        currentSlide = index + 1;
        showSlide(currentSlide);
    });
});


setInterval(() => {
    currentSlide++;
    if (currentSlide > document.querySelectorAll('.slide').length) {
        currentSlide = 1;
    }
    showSlide(currentSlide);
}, 2000);



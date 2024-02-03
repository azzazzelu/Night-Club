const slider = document.getElementById('slider');
const indicator = document.getElementById('indicator');
let currentIndex = 0;

function nextSlide() {
    currentIndex = (currentIndex + 1) % slider.children.length;
    updateSlider();
   
}

function prevSlide() {
    currentIndex = (currentIndex - 1 + slider.children.length) % slider.children.length;
    updateSlider();
}

function updateSlider() {
    const translateValue = -currentIndex * 500; // Ширина картинки
    slider.style.transform = `translateX(${translateValue}px)`;
    updateIndicator();
}

function updateIndicator() {
    const children = indicator.children;
    for (let i = 0; i < children.length; i++) {
        children[i].classList.remove('active');
    }
    children[currentIndex].classList.add('active');
}

// Создаем индикаторы для каждой картинки
for (let i = 0; i < slider.children.length; i++) {
    const indicatorDot = document.createElement('div');
    indicatorDot.classList.add('none_active');
    indicatorDot.addEventListener('click', () => {
        currentIndex = i;
        updateSlider();
    });
    indicator.appendChild(indicatorDot);
}
updateIndicator();
const cards_new = document.querySelectorAll('.card_news');
const prevBtn = document.querySelector('.prev_btn');
const nextBtn = document.querySelector('.next_btn');
let currentIndex_news = 0;

prevBtn.addEventListener('click', () => {
    currentIndex_news--;
  if (currentIndex_news < 0) {
    currentIndex_news = cards_new.length - 1;
  }
  updateSlider();
});

nextBtn.addEventListener('click', () => {
    currentIndex_news++;
  if (currentIndex_news >= cards_new.length) {
    currentIndex_news = 0;
  }
  updateSlider();
});

function updateSlider() {
  cards_new.forEach((card, index) => {
    if (index === currentIndex_news) {
        card.style.display = 'flex';
    } else {
        card.style.display = 'none';
    }
  });
}
updateSlider();
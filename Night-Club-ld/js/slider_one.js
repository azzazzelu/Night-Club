

const cards_new_2 = document.querySelectorAll('.slider-card');
const prevBtn_2 = document.querySelector('.arrow_prev');
const nextBtn_2 = document.querySelector('.arrow_next');
let currentIndex_news_2 = 0;

prevBtn_2.addEventListener('click', () => {
    currentIndex_news_2--;
  if (currentIndex_news_2 < 0) {
    currentIndex_news_2 = cards_new_2.length - 1;
  }
  updateSlider_2();
});

nextBtn_2.addEventListener('click', () => {
    currentIndex_news_2++;
  if (currentIndex_news_2 >= cards_new_2.length) {
    currentIndex_news_2 = 0;
  }
  updateSlider_2();
});

function updateSlider_2() {
  cards_new_2.forEach((card, index) => {
    if (index === currentIndex_news_2) {
        card.style.display = 'flex';
    } else {
        card.style.display = 'none';
    }
  });
}
updateSlider_2();
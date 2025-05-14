let slideIndex = 0;
const slides = document.querySelector('.slides');
const totalSlides = document.querySelectorAll('.slides img').length;
const navButtons = document.querySelectorAll('.slider-nav button');

function showSlide(index) {
    if (index >= totalSlides) {
        slideIndex = 0;
    } else if (index < 0) {
        slideIndex = totalSlides - 1;
    } else {
        slideIndex = index;
    }
    
    const offset = -slideIndex * 100;
    slides.style.transform = `translateX(${offset}%)`;
    
    // Обновляем активную кнопку навигации
    navButtons.forEach((button, i) => {
        button.classList.toggle('active', i === slideIndex);
    });
}

// Инициализация слайдера
showSlide(0);

// Добавляем обработчики для кнопок навигации
navButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        showSlide(index);
    });
});

// Автоматическое переключение слайдов
let slideInterval = setInterval(() => {
    showSlide(slideIndex + 1);
}, 5000);

// Останавливаем автоматическое переключение при наведении на слайдер
document.querySelector('.slider').addEventListener('mouseenter', () => {
    clearInterval(slideInterval);
});

// Возобновляем автоматическое переключение при уходе курсора
document.querySelector('.slider').addEventListener('mouseleave', () => {
    slideInterval = setInterval(() => {
        showSlide(slideIndex + 1);
    }, 5000);
});

document.getElementById('profileButton').addEventListener('click', () => {
    alert('Кнопка профиля нажата!');
});

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const locationSearchInput = document.getElementById('locationSearchInput');
    const vacancies = document.querySelectorAll('.vacancy');

    function filterVacancies() {
        const searchTerm = searchInput.value.toLowerCase();
        const locationTerm = locationSearchInput.value.toLowerCase();

        vacancies.forEach(vacancy => {
            const title = vacancy.querySelector('.vacancy-title').textContent.toLowerCase();
            const location = vacancy.querySelector('.vacancy-meta').textContent.toLowerCase();
            
            const matchesTitle = title.includes(searchTerm);
            const matchesLocation = location.includes(locationTerm);
            
            if (matchesTitle && matchesLocation) {
                vacancy.style.display = 'block';
            } else {
                vacancy.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterVacancies);
    locationSearchInput.addEventListener('input', filterVacancies);
});
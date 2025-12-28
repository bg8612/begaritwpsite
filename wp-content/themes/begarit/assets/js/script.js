document.addEventListener('DOMContentLoaded', function() {

// =========================================================================
    // 1. ТЕМА (DARK/LIGHT MODE)
    // =========================================================================
    const themeButton = document.getElementById('themeButton');
    const body = document.body;

    // Функция для исправления цвета автозаполнения Chrome
    function fixAutofillBg() {
        const inputs = document.querySelectorAll('input:-webkit-autofill');
        inputs.forEach(input => {
            const originalName = input.name;
            input.name = originalName + '_hack';
            setTimeout(() => { input.name = originalName; }, 1);
        });
    }

    // Обработка клика
    if (themeButton) {
        themeButton.addEventListener('click', () => {
            // Переключаем класс
            if (body.classList.contains('dark')) {
                body.classList.remove('dark');
                body.classList.add('light');
                localStorage.setItem('theme', 'light');
            } else {
                body.classList.remove('light');
                body.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            // Вызываем фикс автозаполнения
            fixAutofillBg();
        });
    }
    
    // ПРИМЕЧАНИЕ: Мы убрали логику "Логика при загрузке", так как она теперь 
    // полностью обрабатывается быстрым скриптом в header.php.

    // =========================================================================
    // 2. 3D СЛАЙДЕР (С ОПТИМИЗАЦИЕЙ ПРОИЗВОДИТЕЛЬНОСТИ)
    // =========================================================================
    const sliderWrapper = document.querySelector('.custom-slider-wrapper');
    const container = document.querySelector('.custom-slider-container');

    if (sliderWrapper && container) {
        const slides = Array.from(sliderWrapper.querySelectorAll('.slide'));
        const totalSlides = slides.length;

        if (totalSlides > 0) {
            let currentIndex = 0;
            let isAnimating = false;
            const animationDuration = 600;
            let autoplayInterval = null;
            let isPaused = false; // Флаг паузы при наведении

            // Обновление классов (основная логика 3D)
            const updateSlideClasses = () => {
                // Используем requestAnimationFrame для плавности
                requestAnimationFrame(() => {
                    slides.forEach((slide, index) => {
                        slide.classList.remove('slide-active', 'slide-prev-1', 'slide-prev-2', 'slide-next-1', 'slide-next-2');
                        
                        let diff = index - currentIndex;
                        const half = Math.floor(totalSlides / 2);
                        
                        if (diff < -half) diff += totalSlides;
                        else if (diff > half) diff -= totalSlides;

                        if (diff === 0) slide.classList.add('slide-active');
                        else if (diff === 1) slide.classList.add('slide-next-1');
                        else if (diff === 2) slide.classList.add('slide-next-2');
                        else if (diff === -1) slide.classList.add('slide-prev-1');
                        else if (diff === -2) slide.classList.add('slide-prev-2');
                    });
                });
            };

            const goToSlide = (index) => {
                if (isAnimating) return;
                isAnimating = true;
                currentIndex = (index + totalSlides) % totalSlides;
                updateSlideClasses();
                setTimeout(() => { isAnimating = false; }, animationDuration);
            };

            const goNext = () => goToSlide(currentIndex + 1);
            const goPrev = () => goToSlide(currentIndex - 1);

            // Клик по слайду
            sliderWrapper.addEventListener('click', (e) => {
                const clickedSlide = e.target.closest('.slide');
                if (!clickedSlide) return;
                goToSlide(slides.indexOf(clickedSlide));
            });

            // Управление автоплеем
            const startAutoplay = () => {
                if (autoplayInterval) clearInterval(autoplayInterval);
                autoplayInterval = setInterval(goNext, 5000);
            };

            const stopAutoplay = () => {
                if (autoplayInterval) clearInterval(autoplayInterval);
                autoplayInterval = null;
            };

            // Пауза при наведении мыши
            container.addEventListener('mouseenter', () => {
                isPaused = true;
                stopAutoplay();
            });
            container.addEventListener('mouseleave', () => {
                isPaused = false;
                // Запускаем, только если слайдер виден на экране (см. Observer ниже)
                if (isSliderVisible) startAutoplay();
            });

            // Свайпы (Touch events)
            let touchStartX = 0;
            container.addEventListener('touchstart', (e) => {
                if (isAnimating) return;
                touchStartX = e.changedTouches[0].screenX;
            }, { passive: true });

            container.addEventListener('touchend', (e) => {
                if (isAnimating) return;
                const deltaX = e.changedTouches[0].screenX - touchStartX;
                if (deltaX < -50) goNext();
                else if (deltaX > 50) goPrev();
            }, { passive: true });

            // --- ГЛАВНАЯ ОПТИМИЗАЦИЯ: Intersection Observer ---
            // Слайдер работает ТОЛЬКО когда он виден на экране
            let isSliderVisible = true;
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        isSliderVisible = true;
                        if (!isPaused) startAutoplay();
                    } else {
                        isSliderVisible = false;
                        stopAutoplay();
                    }
                });
            }, { threshold: 0.1 }); // Срабатывает, если видно хотя бы 10% слайдера

            observer.observe(container);

            // Также останавливаем, если вкладка браузера не активна
            document.addEventListener("visibilitychange", () => {
                if (document.hidden) {
                    stopAutoplay();
                } else {
                    if (isSliderVisible && !isPaused) startAutoplay();
                }
            });

            // Первичная инициализация
            updateSlideClasses();
        }
    }

    // =========================================================================
    // 3. ПЕРЕКЛЮЧЕНИЕ ПАРОЛЯ (ГЛАЗИК)
    // =========================================================================
    const toggleButtons = document.querySelectorAll('.password-toggle-btn');
    toggleButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            this.classList.toggle('active');
            // Ищем input рядом или внутри родителя
            let input = this.previousElementSibling;
            if (!input || input.tagName !== 'INPUT') {
                input = this.parentElement.querySelector('input');
            }
            
            if (input) {
                input.type = (input.type === 'password') ? 'text' : 'password';
            }
        });
    });

    // =========================================================================
    // 4. ПЛАВНЫЙ СКРОЛЛ К ЯКОРЯМ (Header)
    // =========================================================================
    document.addEventListener('click', function(e) {
        const link = e.target.closest('a');
        if (!link) return;
        
        const href = link.getAttribute('href');
        // Проверяем, что ссылка ведет на якорь текущей страницы
        if (href && href.includes('#studio-steck')) {
            // Если мы уже на главной или это якорная ссылка
            const targetId = href.split('#')[1];
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }
        }
    });

});

// =========================================================================
// 5. GRAVITY FORMS (Maks for Phone) - Оставляем jQuery т.к. GF его использует
// =========================================================================
// if (typeof jQuery !== 'undefined') {
//    jQuery(document).on('gform_post_render', function(event, form_id, current_page){
//        const phoneInput = document.getElementById('input_1_6');
//        
//       if (phoneInput) {
//            phoneInput.addEventListener('input', function(e) {
//                let matrix = "+7 (___) ___-__-__";
//                let i = 0;
//                let def = matrix.replace(/\D/g, "");
//                let val = this.value.replace(/\D/g, "");
//                
//                if (val.startsWith("8")) val = "7" + val.slice(1);
//                if (def.length >= val.length) val = def;
//
//                this.value = matrix.replace(/./g, function(a) {
//                    return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
//                });
//            });
//
//            phoneInput.addEventListener('focus', function() {
//                if (this.value === "") this.value = "+7 (";
//            });
//
//            phoneInput.addEventListener('blur', function() {
//                if (this.value.replace(/\D/g, "").length <= 1) this.value = "";
//            });
//        }
//    });
//
//    jQuery(document).ready(function(){
//        jQuery(document).trigger('gform_post_render', [1, 1]);
//    });
//}

 
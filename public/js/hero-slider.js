document.addEventListener('DOMContentLoaded', function () {
    const hero = document.querySelector('.sp-hero');

    if (!hero) return;

    const topLeft = hero.querySelector('.sp-photo-top-left img');
    const topWide = hero.querySelector('.sp-photo-top-wide img');
    const bottomLeft = hero.querySelector('.sp-photo-bottom-left img');
    const bottomMiddle = hero.querySelector('.sp-photo-bottom-middle img');
    const bottomRight = hero.querySelector('.sp-photo-bottom-right img');

    const bg = hero.querySelector('.sp-hero-bg');
    const prevBtn = hero.querySelector('.sp-hero-arrow-left');
    const nextBtn = hero.querySelector('.sp-hero-arrow-right');
    const dots = Array.from(hero.querySelectorAll('.sp-hero-dots span, .sp-hero-dots button'));

    const slides = [
        {
            bg: '/images/Gemini_Generated_Image_o9b7mfo9b7mfo9b7.png',
            topLeft: '/images/5276117098801340184.png',
            topWide: '/images/5276117098801340186.png',
            bottomLeft: '/images/5276117098801340195.png',
            bottomMiddle: '/images/5276117098801340197.png',
            bottomRight: '/images/5276117098801340193.png'
        },
        {
            bg: '/images/Gemini_Generated_Image_1eakkp1eakkp1eak.png',
            topLeft: '/images/5276117098801340187.png',
            topWide: '/images/5276117098801340199.png',
            bottomLeft: '/images/5276117098801340194.png',
            bottomMiddle: '/images/5276117098801340198.png',
            bottomRight: '/images/5276117098801340200.png'
        },
        {
            bg: '/images/Gemini_Generated_Image_o9b7mfo9b7mfo9b7.png',
            topLeft: '/images/5276117098801340190.png',
            topWide: '/images/5276117098801340191.png',
            bottomLeft: '/images/5276117098801340192.png',
            bottomMiddle: '/images/5276117098801340188.png',
            bottomRight: '/images/5276117098801340185.png'
        }
    ];

    let current = 0;
    let timer = null;
    const delay = 5000;

    function preloadImages() {
        slides.forEach(function (slide) {
            Object.values(slide).forEach(function (src) {
                const img = new Image();
                img.src = src;
            });
        });
    }

    function setImage(img, src) {
        if (!img || !src) return;

        img.style.opacity = '0';

        setTimeout(function () {
            img.src = src;

            if (img.complete) {
                img.style.opacity = '1';
            } else {
                img.onload = function () {
                    img.style.opacity = '1';
                };
            }
        }, 120);
    }

    function setBackground(src) {
        if (!bg || !src) return;

        bg.style.background =
            'linear-gradient(90deg, rgba(4, 44, 34, 0.96), rgba(4, 44, 34, 0.84)), url("' + src + '")';
        bg.style.backgroundSize = 'cover';
        bg.style.backgroundPosition = 'center';
    }

    function showSlide(index) {
        current = (index + slides.length) % slides.length;

        const slide = slides[current];

        setBackground(slide.bg);
        setImage(topLeft, slide.topLeft);
        setImage(topWide, slide.topWide);
        setImage(bottomLeft, slide.bottomLeft);
        setImage(bottomMiddle, slide.bottomMiddle);
        setImage(bottomRight, slide.bottomRight);

        dots.forEach(function (dot, i) {
            dot.classList.toggle('active', i === current);
        });
    }

    function nextSlide() {
        showSlide(current + 1);
    }

    function prevSlide() {
        showSlide(current - 1);
    }

    function startAutoplay() {
        stopAutoplay();

        if (slides.length > 1) {
            timer = setInterval(nextSlide, delay);
        }
    }

    function stopAutoplay() {
        if (timer) {
            clearInterval(timer);
            timer = null;
        }
    }

    if (nextBtn) {
        nextBtn.addEventListener('click', function () {
            nextSlide();
            startAutoplay();
        });
    }

    if (prevBtn) {
        prevBtn.addEventListener('click', function () {
            prevSlide();
            startAutoplay();
        });
    }

    dots.forEach(function (dot, index) {
        dot.style.cursor = 'pointer';

        dot.addEventListener('click', function () {
            showSlide(index);
            startAutoplay();
        });
    });

    hero.addEventListener('mouseenter', stopAutoplay);
    hero.addEventListener('mouseleave', startAutoplay);

    [topLeft, topWide, bottomLeft, bottomMiddle, bottomRight].forEach(function (img) {
        if (!img) return;
        img.style.transition = 'opacity 0.25s ease';
    });

    preloadImages();
    showSlide(0);
    startAutoplay();
});

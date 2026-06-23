document.addEventListener('DOMContentLoaded', function () {
    const hero = document.querySelector('.sp-hero');
    if (!hero) return;

    const slidesEl = hero.querySelector('.sp-hero-slides');
    const prevBtn = hero.querySelector('.sp-hero-arrow-left');
    const nextBtn = hero.querySelector('.sp-hero-arrow-right');
    const dotsContainer = hero.querySelector('.sp-hero-dots');

    const collageSlots = [
        hero.querySelector('.sp-photo-top-left img'),
        hero.querySelector('.sp-photo-top-wide img'),
        hero.querySelector('.sp-photo-bottom-left img'),
        hero.querySelector('.sp-photo-bottom-middle img'),
        hero.querySelector('.sp-photo-bottom-right img'),
    ].filter(Boolean);

    const initialImages = collageSlots
        .map(img => img.getAttribute('src'))
        .filter(Boolean);

    let slides = [];

    if (slidesEl) {
        try {
            slides = JSON.parse(slidesEl.getAttribute('data-slides') || '[]');
        } catch (e) {
            slides = [];
        }
    }

    const slideImages = slides
        .map(slide => slide && slide.image)
        .filter(Boolean);

    const uniqueImages = Array.from(new Set([...slideImages, ...initialImages]));

    if (!uniqueImages.length || !collageSlots.length) return;

    let current = 0;
    let timer = null;
    const delay = 4500;

    function preloadImages() {
        uniqueImages.forEach(function (src) {
            const img = new Image();
            img.src = src;
        });
    }

    function getCollageSet(index) {
        const rotated = uniqueImages.slice(index).concat(uniqueImages.slice(0, index));
        return rotated.slice(0, collageSlots.length);
    }

    function setImage(img, src) {
        if (!img || !src || img.getAttribute('src') === src) return;

        img.style.opacity = '0';

        window.setTimeout(function () {
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

    function showSlide(index) {
        current = (index + uniqueImages.length) % uniqueImages.length;

        const set = getCollageSet(current);

        collageSlots.forEach(function (img, i) {
            if (set[i]) {
                setImage(img, set[i]);
            }
        });

        if (dotsContainer) {
            const dots = dotsContainer.querySelectorAll('span, button');
            dots.forEach(function (dot, i) {
                dot.classList.toggle('active', i === current);
            });
        }
    }

    function nextSlide() {
        showSlide(current + 1);
    }

    function prevSlide() {
        showSlide(current - 1);
    }

    function startAutoplay() {
        stopAutoplay();

        if (uniqueImages.length > 1) {
            timer = window.setInterval(nextSlide, delay);
        }
    }

    function stopAutoplay() {
        if (timer) {
            window.clearInterval(timer);
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

    if (dotsContainer) {
        dotsContainer.innerHTML = '';

        if (uniqueImages.length > 1) {
            uniqueImages.forEach(function (_, index) {
                const dot = document.createElement('span');
                if (index === 0) dot.classList.add('active');
                dot.style.cursor = 'pointer';
                dot.addEventListener('click', function () {
                    showSlide(index);
                    startAutoplay();
                });
                dotsContainer.appendChild(dot);
            });
        }
    }

    collageSlots.forEach(function (img) {
        img.style.transition = 'opacity 0.25s ease';
    });

    let touchStartX = 0;
    let touchStartY = 0;

    hero.addEventListener('touchstart', function (e) {
        if (!e.touches || !e.touches.length) return;

        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
    }, { passive: true });

    hero.addEventListener('touchend', function (e) {
        if (!e.changedTouches || !e.changedTouches.length) return;

        const touchEndX = e.changedTouches[0].clientX;
        const touchEndY = e.changedTouches[0].clientY;

        const diffX = touchEndX - touchStartX;
        const diffY = touchEndY - touchStartY;

        if (Math.abs(diffY) > Math.abs(diffX)) return;
        if (Math.abs(diffX) < 45) return;

        if (diffX < 0) {
            nextSlide();
        } else {
            prevSlide();
        }

        startAutoplay();
    }, { passive: true });

    hero.addEventListener('mouseenter', stopAutoplay);
    hero.addEventListener('mouseleave', startAutoplay);

    preloadImages();
    showSlide(0);
    startAutoplay();
});

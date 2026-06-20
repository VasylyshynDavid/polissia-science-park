document.addEventListener('DOMContentLoaded', function () {
    const hero = document.querySelector('.sp-hero');
    if (!hero) return;

    const slidesEl = hero.querySelector('.sp-hero-slides');
    if (!slidesEl) return;

    const prevBtn = hero.querySelector('.sp-hero-arrow-left');
    const nextBtn = hero.querySelector('.sp-hero-arrow-right');
    const dotsContainer = hero.querySelector('.sp-hero-dots');

    const slides = JSON.parse(slidesEl.getAttribute('data-slides') || '[]');
    if (!slides.length) return;

    const collageSlots = [
        hero.querySelector('.sp-photo-top-left img'),
        hero.querySelector('.sp-photo-top-wide img'),
        hero.querySelector('.sp-photo-bottom-left img'),
        hero.querySelector('.sp-photo-bottom-middle img'),
        hero.querySelector('.sp-photo-bottom-right img'),
    ];

    // Group slides into collage sets (5 images per set)
    // If less than 5, repeat them; if more, cycle through
    function getCollageSet(index) {
        const set = [];
        for (let i = 0; i < 5; i++) {
            const slideIndex = (index + i) % slides.length;
            set.push(slides[slideIndex].image);
        }
        return set;
    }

    let current = 0;
    let timer = null;
    const delay = 4500;

    function preloadImages() {
        slides.forEach(function (s) {
            const img = new Image();
            img.src = s.image;
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
                img.onload = function () { img.style.opacity = '1'; };
            }
        }, 120);
    }

    function showSlide(index) {
        current = (index + slides.length) % slides.length;
        const set = getCollageSet(current);
        collageSlots.forEach(function (img, i) {
            if (img) setImage(img, set[i] || set[0]);
        });
        if (dotsContainer) {
            const dots = dotsContainer.querySelectorAll('span, button');
            dots.forEach(function (dot, i) {
                dot.classList.toggle('active', i === current);
            });
        }
    }

    function nextSlide() { showSlide(current + 1); }
    function prevSlide() { showSlide(current - 1); }

    function startAutoplay() {
        stopAutoplay();
        if (slides.length > 1) timer = setInterval(nextSlide, delay);
    }

    function stopAutoplay() {
        if (timer) { clearInterval(timer); timer = null; }
    }

    if (nextBtn) nextBtn.addEventListener('click', function () { nextSlide(); startAutoplay(); });
    if (prevBtn) prevBtn.addEventListener('click', function () { prevSlide(); startAutoplay(); });

    if (dotsContainer) {
        dotsContainer.querySelectorAll('span, button').forEach(function (dot, index) {
            dot.style.cursor = 'pointer';
            dot.addEventListener('click', function () { showSlide(index); startAutoplay(); });
        });
    }

    hero.addEventListener('mouseenter', stopAutoplay);
    hero.addEventListener('mouseleave', startAutoplay);

    collageSlots.forEach(function (img) {
        if (!img) return;
        img.style.transition = 'opacity 0.25s ease';
    });

    preloadImages();
    showSlide(0);

    // Build dots dynamically
    if (dotsContainer && slides.length > 1) {
        dotsContainer.innerHTML = '';
        for (let i = 0; i < slides.length; i++) {
            const dot = document.createElement('span');
            if (i === 0) dot.classList.add('active');
            dot.style.cursor = 'pointer';
            dot.addEventListener('click', function () { showSlide(i); startAutoplay(); });
            dotsContainer.appendChild(dot);
        }
    }

    startAutoplay();
});

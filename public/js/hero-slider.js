document.addEventListener('DOMContentLoaded', function () {
    window.__SP_HERO_VERSION = 'sp-hero-3-groups-fixed-2026-06-24';

    const hero = document.querySelector('.sp-hero');
    if (!hero) return;

    const prevBtn = hero.querySelector('.sp-hero-arrow-left');
    const nextBtn = hero.querySelector('.sp-hero-arrow-right');
    const dotsContainer = hero.querySelector('.sp-hero-dots');

    const collageSlots = [
        hero.querySelector('.sp-photo-top-left'),
        hero.querySelector('.sp-photo-top-wide'),
        hero.querySelector('.sp-photo-bottom-left'),
        hero.querySelector('.sp-photo-bottom-middle'),
        hero.querySelector('.sp-photo-bottom-right'),
    ].filter(Boolean);

    if (!collageSlots.length) return;

    // Exactly 3 prepared collage slides. Each slide contains 5 different photos.
    // Do not generate 6 shifted states from DB records: it creates visual duplicates.
    const slideGroups = [
        [
            { image: '/images/5276117098801340184.png', title: 'Лабораторія компʼютерних систем' },
            { image: '/images/5276117098801340188.png', title: 'Практична робота в лабораторії' },
            { image: '/images/5276117098801340190.png', title: 'Навчальна аудиторія' },
            { image: '/images/5276117098801340191.png', title: 'Студентська команда' },
            { image: '/images/5276117098801340192.png', title: 'Робототехніка' },
        ],
        [
            { image: '/images/5276117098801340200.png', title: 'Цифрове моделювання' },
            { image: '/images/5276117098801340187.png', title: 'Інноваційна зустріч' },
            { image: '/images/5276117098801340193.png', title: 'Навчання з автоматизації' },
            { image: '/images/5276117098801340199.png', title: 'Інженерна лабораторія' },
            { image: '/images/5276117098801340194.png', title: 'Промислова автоматизація' },
        ],
        [
            { image: '/images/5276117098801340185.png', title: 'Обладнання для моніторингу' },
            { image: '/images/5276117098801340186.png', title: 'Високотехнологічна техніка' },
            { image: '/images/5276117098801340195.png', title: 'Панель керування' },
            { image: '/images/5276117098801340196.png', title: 'Стенд автоматизації' },
            { image: '/images/5276117098801340198.png', title: 'Цифровий стенд' },
        ],
    ];

    let current = 0;
    let timer = null;
    const delay = 6500;

    function ensureImageElement(slot) {
        let img = slot.querySelector('img');

        if (!img) {
            img = document.createElement('img');
            slot.appendChild(img);
        }

        img.style.transition = 'opacity 0.22s ease';
        return img;
    }

    function setImage(slot, item) {
        if (!slot || !item || !item.image) return;

        const img = ensureImageElement(slot);

        if (img.getAttribute('src') === item.image) {
            img.alt = item.title || '';
            return;
        }

        img.style.opacity = '0';

        window.setTimeout(function () {
            img.src = item.image;
            img.alt = item.title || '';

            if (img.complete) {
                img.style.opacity = '1';
            } else {
                img.onload = function () {
                    img.style.opacity = '1';
                };
                img.onerror = function () {
                    img.style.opacity = '1';
                };
            }
        }, 90);
    }

    function updateDots() {
        if (!dotsContainer) return;

        const dots = dotsContainer.querySelectorAll('span, button');
        dots.forEach(function (dot, index) {
            dot.classList.toggle('active', index === current);
        });
    }

    function showGroup(index) {
        current = (index + slideGroups.length) % slideGroups.length;
        const group = slideGroups[current];

        collageSlots.forEach(function (slot, slotIndex) {
            setImage(slot, group[slotIndex]);
        });

        updateDots();
    }

    function nextGroup() {
        showGroup(current + 1);
    }

    function prevGroup() {
        showGroup(current - 1);
    }

    function stopAutoplay() {
        if (timer) {
            window.clearInterval(timer);
            timer = null;
        }
    }

    function startAutoplay() {
        stopAutoplay();
        timer = window.setInterval(nextGroup, delay);
    }

    function bindButton(button, handler) {
        if (!button) return;

        button.style.display = 'flex';
        button.style.pointerEvents = 'auto';
        button.style.zIndex = '1000';

        button.addEventListener('click', function (event) {
            event.preventDefault();
            event.stopPropagation();
            handler();
            startAutoplay();
        });
    }

    // Visual requirement: arrows switch groups in the opposite order.
    bindButton(prevBtn, nextGroup);
    bindButton(nextBtn, prevGroup);

    if (dotsContainer) {
        dotsContainer.style.display = 'flex';
        dotsContainer.style.pointerEvents = 'auto';
        dotsContainer.style.zIndex = '1000';
        dotsContainer.innerHTML = '';

        slideGroups.forEach(function (_, index) {
            const dot = document.createElement('span');
            dot.style.cursor = 'pointer';
            dot.addEventListener('click', function (event) {
                event.preventDefault();
                event.stopPropagation();
                showGroup(index);
                startAutoplay();
            });
            dotsContainer.appendChild(dot);
        });
    }

    // Extra event delegation: works even if another script replaces buttons after load.
    hero.addEventListener('click', function (event) {
        const prev = event.target.closest('.sp-hero-arrow-left');
        const next = event.target.closest('.sp-hero-arrow-right');
        const dot = event.target.closest('.sp-hero-dots span, .sp-hero-dots button');

        if (prev) {
            event.preventDefault();
            nextGroup();
            startAutoplay();
            return;
        }

        if (next) {
            event.preventDefault();
            prevGroup();
            startAutoplay();
            return;
        }

        if (dot && dotsContainer) {
            const dots = Array.prototype.slice.call(dotsContainer.querySelectorAll('span, button'));
            const index = dots.indexOf(dot);

            if (index >= 0) {
                event.preventDefault();
                showGroup(index);
                startAutoplay();
            }
        }
    }, true);

    let touchStartX = 0;
    let touchStartY = 0;

    hero.addEventListener('touchstart', function (event) {
        if (!event.touches || !event.touches.length) return;
        touchStartX = event.touches[0].clientX;
        touchStartY = event.touches[0].clientY;
    }, { passive: true });

    hero.addEventListener('touchend', function (event) {
        if (!event.changedTouches || !event.changedTouches.length) return;

        const diffX = event.changedTouches[0].clientX - touchStartX;
        const diffY = event.changedTouches[0].clientY - touchStartY;

        if (Math.abs(diffY) > Math.abs(diffX) || Math.abs(diffX) < 45) return;

        if (diffX < 0) {
            prevGroup();
        } else {
            nextGroup();
        }

        startAutoplay();
    }, { passive: true });

    slideGroups.forEach(function (group) {
        group.forEach(function (item) {
            const img = new Image();
            img.src = item.image;
        });
    });

    hero.addEventListener('mouseenter', stopAutoplay);
    hero.addEventListener('mouseleave', startAutoplay);

    showGroup(0);
    startAutoplay();
});

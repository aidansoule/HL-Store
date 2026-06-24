(function () {
    'use strict';

    function loadBackground(el) {
        if (!el || el.classList.contains('is-bg-loaded')) return;
        const url = el.dataset.bg;
        if (!url) return;

        if (el.classList.contains('menu-card')) {
            el.style.setProperty('--card-bg', 'url("' + url + '")');
        } else {
            el.style.backgroundImage = 'url("' + url + '")';
        }

        el.classList.add('is-bg-loaded');
    }

    function initLazyBackgrounds(selector, eagerCount) {
        const elements = document.querySelectorAll(selector);
        if (!elements.length) return;

        elements.forEach(function (el, index) {
            if (index < eagerCount) loadBackground(el);
        });

        if (!('IntersectionObserver' in window)) {
            elements.forEach(loadBackground);
            return;
        }

        const observer = new IntersectionObserver(function (entries, obs) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) return;
                loadBackground(entry.target);
                obs.unobserve(entry.target);
            });
        }, { rootMargin: '240px 0px' });

        elements.forEach(function (el, index) {
            if (index >= eagerCount) observer.observe(el);
        });
    }

    function loadHeroSlide(slide) {
        if (!slide || slide.dataset.imageLoaded === 'true') return;

        const picture = slide.querySelector('picture');
        if (!picture) return;

        const source = picture.querySelector('source');
        if (source && source.dataset.srcset) {
            source.srcset = source.dataset.srcset;
            delete source.dataset.srcset;
        }

        const img = picture.querySelector('img');
        if (img && img.dataset.src) {
            img.src = img.dataset.src;
            delete img.dataset.src;
        }

        slide.dataset.imageLoaded = 'true';
    }

    // Mobile drawer
    const menuToggle = document.querySelector('.menu-toggle');
    const mobileDrawer = document.getElementById('mobile-drawer');

    function openDrawer() {
        if (!mobileDrawer) return;
        mobileDrawer.classList.add('is-open');
        mobileDrawer.setAttribute('aria-hidden', 'false');
        if (menuToggle) menuToggle.setAttribute('aria-expanded', 'true');
        document.body.style.overflow = 'hidden';
    }

    function closeDrawer() {
        if (!mobileDrawer) return;
        mobileDrawer.classList.remove('is-open');
        mobileDrawer.setAttribute('aria-hidden', 'true');
        if (menuToggle) menuToggle.setAttribute('aria-expanded', 'false');
        document.body.style.overflow = '';
    }

    if (menuToggle && mobileDrawer) {
        menuToggle.addEventListener('click', openDrawer);
        mobileDrawer.querySelectorAll('[data-close-drawer]').forEach(function (el) {
            el.addEventListener('click', closeDrawer);
        });
        mobileDrawer.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeDrawer);
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && mobileDrawer.classList.contains('is-open')) {
                closeDrawer();
            }
        });
    }

    // Mobile drawer careers accordion
    document.querySelectorAll('.mobile-nav__toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const item = btn.closest('.mobile-nav__item');
            const isOpen = item.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', String(isOpen));
        });
    });

    // Footer mobile accordion
    document.querySelectorAll('.footer-mobile-nav__toggle').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const item = btn.closest('.footer-mobile-nav__item');
            const isOpen = item.classList.toggle('is-open');
            btn.setAttribute('aria-expanded', String(isOpen));
        });
    });

    // Hero slider
    function initSlider(container) {
        if (!container) return;

        const slides = container.querySelectorAll('.hero-slide');
        const prevBtn = container.querySelector('.hero-slider__arrow--prev');
        const nextBtn = container.querySelector('.hero-slider__arrow--next');

        if (slides.length === 0) return;

        let current = 0;
        let timer = null;

        function goTo(index) {
            slides[current].classList.remove('is-active');
            current = (index + slides.length) % slides.length;
            slides[current].classList.add('is-active');
            loadHeroSlide(slides[current]);
            loadHeroSlide(slides[(current + 1) % slides.length]);
        }

        function next() { goTo(current + 1); }
        function prev() { goTo(current - 1); }

        function startAutoplay() {
            stopAutoplay();
            timer = setInterval(next, 5000);
        }

        function stopAutoplay() {
            if (timer) {
                clearInterval(timer);
                timer = null;
            }
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', function () {
                prev();
                startAutoplay();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', function () {
                next();
                startAutoplay();
            });
        }

        container.addEventListener('mouseenter', stopAutoplay);
        container.addEventListener('mouseleave', startAutoplay);

        startAutoplay();
        loadHeroSlide(slides[0]);
        if (slides.length > 1) loadHeroSlide(slides[1]);
    }

    const heroSlider = document.querySelector('.hero-slider');
    if (heroSlider) initSlider(heroSlider);

    initLazyBackgrounds('.menu-card[data-bg]', window.innerWidth <= 767 ? 2 : 3);
    initLazyBackgrounds('.careers-strip__inner[data-bg]', 0);

    // Menu category carousel
    const menuCarousel = document.querySelector('[data-carousel]');
    if (menuCarousel) {
        const track = menuCarousel.querySelector('.menu-carousel__track');
        const viewport = menuCarousel.querySelector('.menu-carousel__viewport');
        const prevBtn = menuCarousel.querySelector('.menu-carousel__arrow--prev');
        const nextBtn = menuCarousel.querySelector('.menu-carousel__arrow--next');
        const cards = track ? track.querySelectorAll('.menu-card') : [];

        if (track && viewport && cards.length > 0) {
            let offset = 0;

            function getVisibleCount() {
                if (window.innerWidth <= 767) return 2;
                if (window.innerWidth <= 1024) return 2;
                return 3;
            }

            function getGap() {
                if (window.innerWidth <= 767) return 10;
                return 50;
            }

            function cardWidth() {
                const gap = getGap();
                const visible = getVisibleCount();
                return (viewport.clientWidth - gap * (visible - 1)) / visible;
            }

            function maxOffset() {
                return Math.max(0, cards.length - getVisibleCount());
            }

            function update() {
                const gap = getGap();
                const width = cardWidth();
                track.style.gap = gap + 'px';
                cards.forEach(function (card) {
                    card.style.flexBasis = width + 'px';
                    card.style.maxWidth = width + 'px';
                });
                track.style.transform = 'translateX(-' + (offset * (width + gap)) + 'px)';
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    offset = Math.max(0, offset - 1);
                    update();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    offset = Math.min(maxOffset(), offset + 1);
                    update();
                });
            }

            window.addEventListener('resize', function () {
                offset = Math.min(offset, maxOffset());
                update();
            });

            update();
        }
    }

    // Menu page nav highlight
    const menuNav = document.querySelector('.menu-nav');
    if (menuNav) {
        const sections = document.querySelectorAll('.menu-section');
        const navLinks = menuNav.querySelectorAll('.menu-nav__link');

        function updateActiveNav() {
            let current = '';
            sections.forEach(function (section) {
                if (window.scrollY >= section.offsetTop - 150) {
                    current = section.getAttribute('id');
                }
            });
            navLinks.forEach(function (link) {
                link.classList.toggle('is-active', link.getAttribute('href') === '#' + current);
            });
        }

        window.addEventListener('scroll', updateActiveNav, { passive: true });
        updateActiveNav();
    }
})();

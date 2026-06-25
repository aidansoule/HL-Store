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

    // Menu category carousel (infinite loop)
    const menuCarousel = document.querySelector('[data-carousel]');
    if (menuCarousel) {
        const track = menuCarousel.querySelector('.menu-carousel__track');
        const viewport = menuCarousel.querySelector('.menu-carousel__viewport');
        const prevBtn = menuCarousel.querySelector('.menu-carousel__arrow--prev');
        const nextBtn = menuCarousel.querySelector('.menu-carousel__arrow--next');

        if (track && viewport) {
            let originalCards = [];
            let currentIndex = 0;
            let cloneCount = 0;
            let step = 0;
            let isAnimating = false;
            let resizeTimer = null;

            function getVisibleCount() {
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

            function allCards() {
                return track.querySelectorAll('.menu-card');
            }

            function canLoop() {
                return originalCards.length > getVisibleCount();
            }

            function cloneCard(card) {
                const clone = card.cloneNode(true);
                clone.classList.add('menu-card--clone');
                clone.setAttribute('aria-hidden', 'true');
                clone.setAttribute('tabindex', '-1');

                if (card.classList.contains('is-bg-loaded')) {
                    clone.classList.add('is-bg-loaded');
                    if (card.style.getPropertyValue('--card-bg')) {
                        clone.style.setProperty('--card-bg', card.style.getPropertyValue('--card-bg'));
                    }
                }

                return clone;
            }

            function clearClones() {
                track.querySelectorAll('.menu-card--clone').forEach(function (clone) {
                    clone.remove();
                });
            }

            function setupClones() {
                clearClones();
                originalCards = Array.from(track.querySelectorAll('.menu-card:not(.menu-card--clone)'));
                cloneCount = getVisibleCount();

                if (!canLoop()) {
                    currentIndex = 0;
                    return;
                }

                const firstClones = originalCards.slice(0, cloneCount).map(cloneCard);
                const lastClones = originalCards.slice(-cloneCount).map(cloneCard);

                lastClones.reverse().forEach(function (clone) {
                    track.insertBefore(clone, track.firstChild);
                });
                firstClones.forEach(function (clone) {
                    track.appendChild(clone);
                });

                currentIndex = cloneCount;
                initLazyBackgrounds('.menu-card--clone[data-bg]:not(.is-bg-loaded)', 0);
            }

            function applyTransform(animate) {
                const cards = allCards();
                const gap = getGap();
                const width = cardWidth();

                step = width + gap;
                track.style.gap = gap + 'px';
                cards.forEach(function (card) {
                    card.style.flexBasis = width + 'px';
                    card.style.maxWidth = width + 'px';
                });

                if (animate) {
                    track.style.transition = '';
                    isAnimating = true;
                } else {
                    track.style.transition = 'none';
                }

                track.style.transform = 'translateX(-' + (currentIndex * step) + 'px)';

                if (!animate) {
                    track.offsetHeight;
                    track.style.transition = '';
                    isAnimating = false;
                }
            }

            function normalizePosition() {
                if (!canLoop()) return;

                if (currentIndex >= cloneCount + originalCards.length) {
                    currentIndex = cloneCount;
                    applyTransform(false);
                } else if (currentIndex < cloneCount) {
                    currentIndex = cloneCount + originalCards.length - getVisibleCount();
                    applyTransform(false);
                }
            }

            function moveBy(delta) {
                if (isAnimating) return;

                if (!canLoop()) {
                    const maxOffset = Math.max(0, originalCards.length - getVisibleCount());
                    currentIndex = Math.max(0, Math.min(maxOffset, currentIndex + delta));
                    applyTransform(true);
                    return;
                }

                currentIndex += delta;
                applyTransform(true);
            }

            track.addEventListener('transitionend', function (event) {
                if (event.target !== track || event.propertyName !== 'transform') return;
                isAnimating = false;
                normalizePosition();
            });

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    moveBy(-1);
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    moveBy(1);
                });
            }

            window.addEventListener('resize', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {
                    setupClones();
                    applyTransform(false);
                }, 150);
            });

            setupClones();
            applyTransform(false);
        }
    }

    // Menu page nav highlight
    const menuNav = document.querySelector('.menu-page-nav');
    if (menuNav) {
        const sections = document.querySelectorAll('.menu-page-section');
        const navLinks = menuNav.querySelectorAll('.menu-page-nav__link');

        function updateActiveNav() {
            let current = '';
            const offset = (document.querySelector('.site-header')?.offsetHeight || 0) + menuNav.offsetHeight + 20;
            sections.forEach(function (section) {
                if (window.scrollY >= section.offsetTop - offset) {
                    current = section.getAttribute('id') || '';
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

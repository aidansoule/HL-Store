<?php

declare(strict_types=1);

$pageTitle = 'menu';
$pageDescription = 'Browse the full Hungry Lion menu – chicken meals, family meals, buckets, winglets, burgers, and more.';
$bodyClass = 'page-menu';

require_once __DIR__ . '/includes/config.php';
$siteData = require __DIR__ . '/includes/menu-data.php';
require_once __DIR__ . '/includes/menu-item.php';

$heroSlides = $siteData['hero-slides'];
$menuNav = $siteData['menu-nav'];
$menuSections = $siteData['sections'];

require __DIR__ . '/includes/header.php';
?>

<div class="menu-page-toolbar">
    <nav class="menu-page-nav" aria-label="Menu categories">
        <ul class="menu-page-nav__list">
            <?php foreach ($menuNav as $link): ?>
            <li>
                <a href="#<?= escape($link['anchor']) ?>" class="menu-page-nav__link"><?= escape($link['title']) ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</div>

<section class="hero-slider menu-page-hero" aria-label="Promotional banners">
    <div class="hero-slider__track">
        <?php foreach ($heroSlides as $index => $slide): ?>
        <div class="hero-slide<?= $index === 0 ? ' is-active' : '' ?>">
            <picture>
                <source
                    media="(max-width: 767px)"
                    <?= $index === 0 ? 'srcset="' . escape($slide['mobile']) . '"' : 'data-srcset="' . escape($slide['mobile']) . '"' ?>
                >
                <img
                    <?= $index === 0 ? 'src="' . escape($slide['desktop']) . '"' : 'data-src="' . escape($slide['desktop']) . '"' ?>
                    alt="<?= escape($slide['alt']) ?>"
                    class="hero-slide__img"
                    decoding="async"
                    <?= $index === 0 ? 'fetchpriority="high"' : '' ?>
                    width="2000"
                    height="400"
                >
            </picture>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="hero-slider__arrow hero-slider__arrow--prev" type="button" aria-label="Previous slide">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M15.41 7.41 14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
    </button>
    <button class="hero-slider__arrow hero-slider__arrow--next" type="button" aria-label="Next slide">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M10 6 8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
    </button>
</section>

<div class="menu-page-sections">
    <?php foreach ($menuSections as $section): ?>
    <section id="<?= escape($section['anchor']) ?>" class="menu-page-section">
        <div class="container">
            <h2 class="menu-page-section__title"><?= escape($section['title']) ?></h2>

            <?php if (($section['layout'] ?? '') === 'daily-deals'): ?>
            <div class="menu-deals-layout">
                <div class="menu-product-grid menu-product-grid--4">
                    <?php foreach ($section['tuesday'] as $index => $item): ?>
                        <?php renderMenuProduct($item, $index < 2); ?>
                    <?php endforeach; ?>
                </div>
                <div class="menu-product-grid menu-product-grid--4">
                    <?php foreach ($section['wednesday'] as $item): ?>
                        <?php renderMenuProduct($item); ?>
                    <?php endforeach; ?>
                </div>
                <div class="menu-deals-layout__bottom">
                    <div class="menu-product-grid menu-product-grid--2">
                        <?php foreach ($section['secondary'] as $item): ?>
                            <?php renderMenuProduct($item); ?>
                        <?php endforeach; ?>
                    </div>
                    <?php renderMenuProduct($section['special']); ?>
                </div>
            </div>
            <?php else: ?>
            <div class="menu-product-grid menu-product-grid--4">
                <?php foreach ($section['items'] as $index => $item): ?>
                    <?php renderMenuProduct($item, $index < 4); ?>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <?php endforeach; ?>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>

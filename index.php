<?php

declare(strict_types=1);

$pageTitle = 'Home';
$pageDescription = "Welcome to Hungry Lion – Africa's best-loved chicken brand. Fried chicken, wings, burgers and more.";
$bodyClass = 'page-home';

require_once __DIR__ . '/includes/config.php';
$siteData = require __DIR__ . '/includes/menu-data.php';
$heroSlides = $siteData['hero-slides'];
$menuCategories = $siteData['menu-categories'];
$careersBanner = $siteData['careers-banner'];

require __DIR__ . '/includes/header.php';
?>

<section class="hero-slider" aria-label="Promotional banners">
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

<section class="cta-bar">
    <div class="container cta-bar__inner">
        <a href="<?= escape(STORE_LOCATOR_URL) ?>" class="btn btn--red btn--cta">Find A Store</a>
        <a href="<?= escape(MENU_PDF_URL) ?>" class="btn btn--red btn--cta" target="_blank" rel="noopener">Download Menu</a>
    </div>
</section>

<section class="menu-section-home">
    <div class="menu-section-home__shell">
        <div class="menu-section-home__heading">
            <h2 class="section-heading">Our Menu</h2>
        </div>
        <div class="menu-carousel-wrap">
        <div class="menu-carousel" data-carousel>
            <button class="menu-carousel__arrow menu-carousel__arrow--prev" type="button" aria-label="Previous categories">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M15.41 7.41 14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
            </button>
            <div class="menu-carousel__viewport">
                <div class="menu-carousel__track">
                    <?php foreach ($menuCategories as $category): ?>
                    <a
                        href="menu.php#<?= escape($category['id']) ?>"
                        class="menu-card"
                        data-bg="<?= escape($category['image']) ?>"
                        style="--card-radius: <?= (int) ($category['radius'] ?? 10) ?>px; --card-position: <?= escape($category['position'] ?? 'center') ?>;"
                    >
                        <h3 class="menu-card__title"><?= $category['title_html'] ?></h3>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
            <button class="menu-carousel__arrow menu-carousel__arrow--next" type="button" aria-label="Next categories">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M10 6 8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
            </button>
        </div>
        </div>
    </div>
</section>

<section class="careers-strip">
    <div class="container">
        <div class="careers-strip__inner" data-bg="<?= escape($careersBanner['image']) ?>">
            <h2 class="careers-strip__title"><a href="careers.php">Join Our<br>Team</a></h2>
            <a href="careers.php" class="btn btn--red btn--cta btn--careers">View Careers</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

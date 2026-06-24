<?php

declare(strict_types=1);

$pageTitle = 'Our Menu';
$pageDescription = 'Browse the full Hungry Lion menu – chicken meals, family meals, buckets, winglets, burgers, and more.';
$bodyClass = 'page-menu';

require_once __DIR__ . '/includes/config.php';
$siteData = require __DIR__ . '/includes/menu-data.php';
$menuSections = $siteData['sections'];
$menuCategories = $siteData['menu-categories'];

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero page-hero--compact">
    <div class="container">
        <h1 class="page-hero__title">Our Menu</h1>
        <p class="page-hero__subtitle">Quality fried chicken, made fresh with local flavours</p>
    </div>
</section>

<nav class="menu-nav" aria-label="Menu categories">
    <div class="container">
        <ul class="menu-nav__list">
            <?php foreach ($menuCategories as $category): ?>
            <li>
                <a href="#<?= escape($category['id']) ?>" class="menu-nav__link"><?= escape($category['title']) ?></a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>

<div class="container menu-sections">
    <?php foreach ($menuSections as $section): ?>
    <section id="<?= escape($section['id']) ?>" class="menu-section">
        <h2 class="menu-section__title"><?= escape($section['title']) ?></h2>
        <div class="menu-items">
            <?php foreach ($section['items'] as $item): ?>
            <article class="menu-item">
                <div class="menu-item__image" aria-hidden="true">
                    <span class="menu-item__placeholder">🍗</span>
                </div>
                <div class="menu-item__body">
                    <h3 class="menu-item__name"><?= escape($item['name']) ?></h3>
                    <p class="menu-item__price"><?= escape($item['price']) ?></p>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endforeach; ?>
</div>

<section class="menu-disclaimer section">
    <div class="container">
        <p class="text-muted text-center">
            Prices are indicative and may vary by store. Please confirm at your nearest Hungry Lion.
        </p>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

<?php

declare(strict_types=1);

$pageTitle = 'Delivery Partners';
$pageDescription = 'Order Hungry Lion for delivery through our trusted delivery partners.';
$bodyClass = 'page-delivery';

$partners = [
    ['name' => 'Uber Eats', 'description' => 'Order your favourite Hungry Lion meals for delivery via Uber Eats.', 'url' => 'https://www.ubereats.com'],
    ['name' => 'Mr D Food', 'description' => 'South Africa\'s leading food delivery service – Hungry Lion is just a tap away.', 'url' => 'https://www.mrdfood.com'],
    ['name' => 'Checkers Sixty60', 'description' => 'Get Hungry Lion delivered in 60 minutes with Checkers Sixty60.', 'url' => 'https://www.sixty60.co.za'],
];

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero page-hero--compact">
    <div class="container">
        <h1 class="page-hero__title">Delivery Partners</h1>
        <p class="page-hero__subtitle">Hungry Lion delivered to your door</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <p class="lead text-center">Can't make it to a store? Order Hungry Lion through one of our delivery partners and enjoy Africa's best-loved chicken from the comfort of your home.</p>

        <div class="partner-grid">
            <?php foreach ($partners as $partner): ?>
            <article class="partner-card">
                <h2 class="partner-card__name"><?= escape($partner['name']) ?></h2>
                <p class="partner-card__desc"><?= escape($partner['description']) ?></p>
                <a href="<?= escape($partner['url']) ?>" class="btn btn--outline" target="_blank" rel="noopener noreferrer">Order Now</a>
            </article>
            <?php endforeach; ?>
        </div>

        <p class="text-muted text-center" style="margin-top: 2rem;">
            Delivery availability varies by location. Check your preferred delivery app for store coverage in your area.
        </p>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

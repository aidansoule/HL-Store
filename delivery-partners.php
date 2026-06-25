<?php

declare(strict_types=1);

$pageTitle = 'Delivery Partners';
$pageDescription = 'Order Hungry Lion for delivery through Mr D and Uber Eats.';
$bodyClass = 'page-delivery';

$partners = [
    [
        'name' => 'Mr D',
        'image' => 'assets/images/delivery-partners/mrd.png',
        'url' => 'https://www.mrd.com/delivery/restaurants/hungry-lion-near-me',
    ],
    [
        'name' => 'Uber Eats',
        'image' => 'assets/images/delivery-partners/uber-eats.webp',
        'url' => 'https://www.ubereats.com/za/brand/hungry-lion',
    ],
];

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="delivery-partners">
    <div class="container">
        <h1 class="delivery-partners__title">Delivery Partners</h1>
    </div>

    <div class="container delivery-partners__grid">
        <?php foreach ($partners as $index => $partner): ?>
        <article class="delivery-partner">
            <a href="<?= escape($partner['url']) ?>" class="delivery-partner__logo-link" target="_blank" rel="noopener noreferrer">
                <img
                    src="<?= escape($partner['image']) ?>"
                    alt="<?= escape($partner['name']) ?>"
                    class="delivery-partner__logo"
                    width="512"
                    height="512"
                    loading="<?= $index === 0 ? 'eager' : 'lazy' ?>"
                >
            </a>
            <a href="<?= escape($partner['url']) ?>" class="delivery-partner__btn" target="_blank" rel="noopener noreferrer">Order Online</a>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

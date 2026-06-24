<?php

declare(strict_types=1);

$pageTitle = 'Africa';
$pageDescription = 'Hungry Lion operates across 9 African countries with over 500 stores.';
$bodyClass = 'page-africa';

$countries = [
    ['name' => 'South Africa', 'flag' => '🇿🇦', 'since' => '1997', 'stores' => '300+'],
    ['name' => 'Zambia', 'flag' => '🇿🇲', 'since' => '1997', 'stores' => '80+'],
    ['name' => 'Namibia', 'flag' => '🇳🇦', 'since' => '1998', 'stores' => '40+'],
    ['name' => 'Botswana', 'flag' => '🇧🇼', 'since' => '1999', 'stores' => '25+'],
    ['name' => 'Eswatini', 'flag' => '🇸🇿', 'since' => '1999', 'stores' => '15+'],
    ['name' => 'Angola', 'flag' => '🇦🇴', 'since' => '2010', 'stores' => '20+'],
    ['name' => 'Lesotho', 'flag' => '🇱🇸', 'since' => '2024', 'stores' => '5+'],
    ['name' => 'Zimbabwe', 'flag' => '🇿🇼', 'since' => '2025', 'stores' => '10+'],
    ['name' => 'Mauritius', 'flag' => '🇲🇺', 'since' => '2025', 'stores' => '5+'],
];

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1 class="page-hero__title">Hungry Lion in Africa</h1>
        <p class="page-hero__subtitle">Proudly African, serving communities across the continent</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <p class="lead text-center">From a single store in Stellenbosch in 1997, Hungry Lion has grown into Africa's fastest-growing fried chicken brand, with a presence in nine countries and counting.</p>

        <div class="country-grid">
            <?php foreach ($countries as $country): ?>
            <article class="country-card">
                <span class="country-card__flag" aria-hidden="true"><?= $country['flag'] ?></span>
                <h2 class="country-card__name"><?= escape($country['name']) ?></h2>
                <p class="country-card__meta">Since <?= escape($country['since']) ?></p>
                <p class="country-card__stores"><?= escape($country['stores']) ?> stores</p>
            </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

<?php

declare(strict_types=1);

$pageTitle = 'Africa';
$pageDescription = 'Hungry Lion operates across Angola, Botswana, Eswatini, Lesotho, Mauritius, Namibia, South Africa, Zambia, and Zimbabwe.';
$bodyClass = 'page-africa';

$countries = [
    ['name' => 'Angola', 'url' => 'https://hungrylion.co.ao/'],
    ['name' => 'Botswana', 'url' => 'https://hungrylion.co.bw/'],
    ['name' => 'Eswatini', 'url' => 'http://hungrylion.africa'],
    ['name' => 'Lesotho', 'url' => 'https://hungrylion.co.ls/'],
    ['name' => 'Mauritius', 'url' => 'https://hungrylion.co.mu/'],
    ['name' => 'Namibia', 'url' => 'https://hungrylion.co.na/'],
    ['name' => 'South Africa', 'url' => 'https://www.hungrylion.co.za/'],
    ['name' => 'Zambia', 'url' => 'https://hungrylion.co.zm/'],
    ['name' => 'Zimbabwe', 'url' => 'https://hungrylion.co.zw/'],
];

$africaMapImage = 'https://www.hungrylion.co.za/wp-content/uploads/2025/06/Africa.png';

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="africa-page">
    <div class="africa-page__inner">
        <div class="africa-page__countries">
            <ul class="africa-page__list">
                <?php foreach ($countries as $country): ?>
                <li>
                    <a href="<?= escape($country['url']) ?>" target="_blank" rel="noopener noreferrer">
                        <span class="africa-page__icon" aria-hidden="true">
                            <svg viewBox="0 0 384 512" xmlns="http://www.w3.org/2000/svg">
                                <path d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"/>
                            </svg>
                        </span>
                        <span class="africa-page__label"><?= escape($country['name']) ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="africa-page__map">
            <img
                src="<?= escape($africaMapImage) ?>"
                alt="Map of Africa showing Hungry Lion countries"
                width="800"
                height="800"
                loading="eager"
                decoding="async"
                fetchpriority="high"
            >
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

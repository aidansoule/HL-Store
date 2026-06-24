<?php

declare(strict_types=1);

$pageTitle = 'Find A Store';
$pageDescription = 'Find your nearest Hungry Lion restaurant across South Africa and Africa.';
$bodyClass = 'page-find-store';

$stores = [
    ['name' => 'Stellenbosch – Eikestad Mall', 'city' => 'Stellenbosch', 'province' => 'Western Cape', 'country' => 'South Africa'],
    ['name' => 'Cape Town – Canal Walk', 'city' => 'Cape Town', 'province' => 'Western Cape', 'country' => 'South Africa'],
    ['name' => 'Johannesburg – Sandton City', 'city' => 'Johannesburg', 'province' => 'Gauteng', 'country' => 'South Africa'],
    ['name' => 'Durban – Gateway Theatre', 'city' => 'Durban', 'province' => 'KwaZulu-Natal', 'country' => 'South Africa'],
    ['name' => 'Pretoria – Menlyn Park', 'city' => 'Pretoria', 'province' => 'Gauteng', 'country' => 'South Africa'],
    ['name' => 'Port Elizabeth – Greenacres', 'city' => 'Gqeberha', 'province' => 'Eastern Cape', 'country' => 'South Africa'],
    ['name' => 'Lusaka – Manda Hill', 'city' => 'Lusaka', 'province' => 'Lusaka Province', 'country' => 'Zambia'],
    ['name' => 'Windhoek – Maerua Mall', 'city' => 'Windhoek', 'province' => 'Khomas', 'country' => 'Namibia'],
    ['name' => 'Gaborone – Game City', 'city' => 'Gaborone', 'province' => 'South-East', 'country' => 'Botswana'],
    ['name' => 'Mbabane – Swazi Plaza', 'city' => 'Mbabane', 'province' => 'Hhohho', 'country' => 'Eswatini'],
];

$searchQuery = trim($_GET['q'] ?? '');
$filteredStores = $stores;

if ($searchQuery !== '') {
    $needle = mb_strtolower($searchQuery);
    $filteredStores = array_values(array_filter($stores, static function (array $store) use ($needle): bool {
        $haystack = mb_strtolower($store['name'] . ' ' . $store['city'] . ' ' . $store['province'] . ' ' . $store['country']);
        return str_contains($haystack, $needle);
    }));
}

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero page-hero--compact">
    <div class="container">
        <h1 class="page-hero__title">Find A Store</h1>
        <p class="page-hero__subtitle">Over 500 stores across Africa</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <form class="store-search" method="get" action="find-store.php" role="search">
            <label for="store-search" class="visually-hidden">Search stores</label>
            <input
                type="search"
                id="store-search"
                name="q"
                placeholder="Search by city, mall, or province..."
                value="<?= escape($searchQuery) ?>"
            >
            <button type="submit" class="btn btn--primary">Search</button>
        </form>

        <?php if ($filteredStores === []): ?>
        <p class="text-center text-muted">No stores found matching "<?= escape($searchQuery) ?>". Try a different search term.</p>
        <?php else: ?>
        <div class="store-list">
            <?php foreach ($filteredStores as $store): ?>
            <article class="store-card">
                <h2 class="store-card__name"><?= escape($store['name']) ?></h2>
                <p class="store-card__location">
                    <?= escape($store['city']) ?>, <?= escape($store['province']) ?><br>
                    <?= escape($store['country']) ?>
                </p>
                <a href="https://maps.google.com/?q=<?= urlencode($store['name'] . ' ' . $store['city']) ?>" class="btn btn--outline btn--sm" target="_blank" rel="noopener noreferrer">Get Directions</a>
            </article>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

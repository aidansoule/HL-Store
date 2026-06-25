<?php

declare(strict_types=1);

function renderMenuProduct(array $item, bool $eagerImage = false): void
{
    if (!empty($item['special'])): ?>
<article class="menu-product menu-product--special">
    <div class="menu-product__name">
        <h3><?= escape($item['name']) ?></h3>
    </div>
    <div class="menu-product__image-wrap">
        <img
            src="<?= escape($item['image']) ?>"
            alt="<?= escape($item['name']) ?>"
            class="menu-product__image"
            width="800"
            height="800"
            loading="<?= $eagerImage ? 'eager' : 'lazy' ?>"
            decoding="async"
        >
    </div>
    <div class="menu-product__variants">
        <div class="menu-product__variant-names">
            <?php foreach ($item['variants'] as $variant): ?>
            <span><?= escape($variant['name']) ?></span>
            <?php endforeach; ?>
        </div>
        <div class="menu-product__variant-prices">
            <?php foreach ($item['variants'] as $variant): ?>
            <span><?= escape($variant['price']) ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</article>
    <?php return;
    endif; ?>
<article class="menu-product">
    <div class="menu-product__name">
        <h3><?= escape($item['name']) ?></h3>
    </div>
    <div class="menu-product__image-wrap">
        <img
            src="<?= escape($item['image']) ?>"
            alt="<?= escape($item['name']) ?>"
            class="menu-product__image"
            width="800"
            height="800"
            loading="<?= $eagerImage ? 'eager' : 'lazy' ?>"
            decoding="async"
        >
    </div>
    <div class="menu-product__price">
        <p><?= escape($item['price']) ?></p>
    </div>
</article>
<?php
}

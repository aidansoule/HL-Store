<?php

declare(strict_types=1);

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/social-icons.php';

$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? SITE_TAGLINE;
$bodyClass = $bodyClass ?? '';
?>
<!DOCTYPE html>
<html lang="en-ZA">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= escape($pageDescription) ?>">
    <title><?= escape($pageTitle) ?> - <?= escape(SITE_NAME) ?></title>
    <link rel="preconnect" href="https://www.hungrylion.co.za" crossorigin>
    <link rel="dns-prefetch" href="https://www.hungrylion.co.za">
    <link rel="preload" href="assets/fonts/Block-Berthold-Regular.ttf" as="font" type="font/ttf" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700;900&display=swap" media="print" onload="this.media='all'">
    <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;600;700;900&display=swap"></noscript>
    <link rel="stylesheet" href="assets/css/style.css?v=39">
    <link rel="icon" href="assets/images/favicon.png" sizes="32x32">
</head>
<body class="<?= escape($bodyClass) ?>">
    <a class="skip-link" href="#main-content">Skip to content</a>

    <header class="site-header">
        <div class="container header-inner">
            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="mobile-drawer" aria-label="Open menu">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M3.5 7.5h17c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5h-17c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5z"/>
                    <path d="M20.5 10.5h-17c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5h17c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5z"/>
                    <path d="M20.5 16.5h-17c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5h17c.83 0 1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5z"/>
                </svg>
            </button>

            <a href="index.php" class="logo" aria-label="<?= escape(SITE_NAME) ?> Home">
                <img src="assets/images/logo.png" alt="<?= escape(SITE_NAME) ?>" width="270" height="50">
            </a>

            <div class="header-store hide-mobile">
                <a href="<?= escape(STORE_LOCATOR_URL) ?>" class="header-store-btn">
                    <img src="assets/images/store-pin.svg?v=2" alt="" class="header-store-btn__icon" width="23" height="30" aria-hidden="true">
                    <span>Find A Store</span>
                </a>
            </div>

            <a href="<?= escape(STORE_LOCATOR_URL) ?>" class="header-pin hide-desktop" aria-label="Find A Store">
                <img src="assets/images/store-pin.svg?v=2" alt="" width="23" height="30" aria-hidden="true">
            </a>
        </div>
    </header>

    <div id="mobile-drawer" class="mobile-drawer" aria-hidden="true">
        <div class="mobile-drawer__overlay" data-close-drawer></div>
        <nav class="mobile-drawer__panel" aria-label="Mobile navigation">
            <button class="mobile-drawer__close" type="button" aria-label="Close menu" data-close-drawer>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                    <path d="M19 6.41 17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>

            <div class="mobile-drawer__content">
                <ul class="mobile-nav">
                    <?php foreach ($mobileNavLinks as $link): ?>
                    <li class="mobile-nav__item<?= isset($link['children']) ? ' mobile-nav__item--has-children' : '' ?>">
                        <?php if (isset($link['children'])): ?>
                        <button type="button" class="mobile-nav__toggle" aria-expanded="false">
                            <?= escape($link['label']) ?>
                            <svg class="mobile-nav__caret" width="12" height="12" viewBox="0 0 320 512" fill="currentColor" aria-hidden="true">
                                <path d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z"/>
                            </svg>
                        </button>
                        <ul class="mobile-nav__sub">
                            <?php foreach ($link['children'] as $child): ?>
                            <li><a href="<?= escape($child['url']) ?>"><?= escape($child['label']) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                        <?php else: ?>
                        <a href="<?= escape($link['url']) ?>"><?= escape($link['label']) ?></a>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <ul class="mobile-drawer__social" aria-label="Social media">
                    <?php foreach ($socialLinks as $name => $url):
                        $icon = socialIconSvg($name);
                    ?>
                    <li>
                        <a href="<?= escape($url) ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= escape($name) ?>">
                            <svg viewBox="<?= escape($icon['viewBox']) ?>" width="16" height="16" fill="currentColor" aria-hidden="true"><?= $icon['path'] ?></svg>
                        </a>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="mobile-drawer__footer">
                <a href="<?= escape(MENU_PDF_URL) ?>" class="btn btn--yellow btn--menu-download" target="_blank" rel="noopener">
                    <span>Download Our Menu</span>
                    <svg width="18" height="18" viewBox="0 0 512 512" fill="currentColor" aria-hidden="true">
                        <path d="M216 0h80c13.3 0 24 10.7 24 24v168h87.7c17.8 0 26.7 21.5 14.1 34.1L269.7 378.3c-7.5 7.5-19.8 7.5-27.3 0L90.1 226.1c-12.6-12.6-3.7-34.1 14.1-34.1H192V24c0-13.3 10.7-24 24-24zm296 376v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h146.7l49 49c20.1 20.1 52.5 20.1 72.6 0l49-49H488c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"/>
                    </svg>
                </a>
                <div class="mobile-drawer__logo">
                    <img src="assets/images/logo-drawer.webp" alt="<?= escape(SITE_NAME) ?>" width="220" height="80" loading="lazy">
                </div>
            </div>
        </nav>
    </div>

    <main id="main-content">

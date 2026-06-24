<?php

declare(strict_types=1);

define('SITE_NAME', 'Hungry Lion');
define('SITE_TAGLINE', "Africa's Best-Loved Chicken Brand");
define('SITE_URL', '/');
define('CURRENT_YEAR', (int) date('Y'));
define('MENU_PDF_URL', 'https://www.hungrylion.co.za/wp-content/uploads/2026/05/RSA-Downloadable.pdf');
define('STORE_LOCATOR_URL', 'https://stores.hungrylion.co.za/');

$navLinks = [
    'Stores' => [
        ['label' => 'Find A Store', 'url' => 'find-store.php'],
        ['label' => 'Delivery Partners', 'url' => 'delivery-partners.php'],
    ],
    'Hungry Lion' => [
        ['label' => 'About', 'url' => 'about.php'],
        ['label' => 'Africa', 'url' => 'africa.php'],
    ],
    'Menu' => [
        ['label' => 'Our Menu', 'url' => 'menu.php'],
        ['label' => 'Daily Specials', 'url' => 'menu.php#daily-deals'],
    ],
    'Work For Us' => [
        ['label' => 'General Workers', 'url' => 'careers.php#general'],
        ['label' => 'HQ & Store Management', 'url' => 'careers.php#management'],
    ],
    'Stay In Touch' => [
        ['label' => 'Contact Us', 'url' => 'contact.php'],
    ],
];

$mobileNavLinks = [
    ['label' => 'Our Menu', 'url' => 'menu.php'],
    ['label' => 'Find A Store', 'url' => STORE_LOCATOR_URL],
    ['label' => 'Delivery Partners', 'url' => 'delivery-partners.php'],
    ['label' => 'Donation Requests', 'url' => 'donation-request.php'],
    ['label' => 'About Us', 'url' => 'about.php'],
    ['label' => 'Africa', 'url' => 'africa.php'],
    ['label' => 'Careers', 'url' => 'careers.php', 'children' => [
        ['label' => 'General Workers', 'url' => 'careers.php#general'],
        ['label' => 'HQ & Store Management', 'url' => 'careers.php#management'],
    ]],
    ['label' => 'Contact Us', 'url' => 'contact.php'],
];

$socialLinks = [
    'Facebook' => 'https://www.facebook.com/HungryLionSA',
    'Instagram' => 'https://www.instagram.com/hungrylionsa/',
    'X' => 'https://twitter.com/HungryLionSA',
    'TikTok' => 'https://www.tiktok.com/@hungrylionsa',
    'LinkedIn' => 'https://www.linkedin.com/company/hungry-lion/',
];

function pageUrl(string $path): string
{
    return SITE_URL . ltrim($path, '/');
}

function isActivePage(string $filename): bool
{
    return basename($_SERVER['PHP_SELF'] ?? '') === $filename;
}

function escape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

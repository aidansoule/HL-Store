<?php

declare(strict_types=1);

define('SITE_NAME', 'Hungry Lion');
define('SITE_TAGLINE', "Africa's Best-Loved Chicken Brand");
define('SITE_URL', '/');
define('CURRENT_YEAR', (int) date('Y'));
define('MENU_PDF_URL', 'https://www.hungrylion.co.za/wp-content/uploads/2026/05/RSA-Downloadable.pdf');
define('STORE_LOCATOR_URL', 'https://stores.hungrylion.co.za/');
define('LEGAL_URL', 'https://www.hungrylion.co.za/legal/');
define('FOOTER_CROWN_URL', 'https://www.hungrylion.co.za/wp-content/uploads/2025/05/HL_Crown-y.svg');

$footerColumns = [
    [
        'sections' => [
            [
                'title' => 'Stores',
                'links' => [
                    ['label' => 'Find A Store', 'url' => STORE_LOCATOR_URL],
                    ['label' => 'Delivery Partners', 'url' => 'delivery-partners.php'],
                ],
            ],
            [
                'title' => 'HUNGRY LION',
                'links' => [
                    ['label' => 'About', 'url' => 'about.php'],
                    ['label' => 'Africa', 'url' => 'africa.php'],
                ],
                'spaced' => true,
            ],
        ],
    ],
    [
        'sections' => [
            [
                'title' => 'Menu',
                'links' => [
                    ['label' => 'Our Menu', 'url' => 'menu.php'],
                    ['label' => 'Daily Specials', 'url' => 'menu.php#anchordeals'],
                ],
            ],
        ],
    ],
    [
        'sections' => [
            [
                'title' => 'WORK FOR US',
                'links' => [
                    ['label' => 'General Workers', 'url' => 'job.php'],
                    ['label' => 'HQ & Store Management', 'url' => 'https://hungrylion.applytojob.com/apply'],
                ],
            ],
        ],
    ],
    [
        'sections' => [
            [
                'title' => 'STAY IN TOUCH',
                'links' => [
                    ['label' => 'Contact Us', 'url' => 'contact.php'],
                ],
            ],
        ],
        'showSocial' => true,
        'modifier' => 'contact',
    ],
];

$mobileNavLinks = [
    ['label' => 'Our Menu', 'url' => 'menu.php'],
    ['label' => 'Find A Store', 'url' => STORE_LOCATOR_URL],
    ['label' => 'Delivery Partners', 'url' => 'delivery-partners.php'],
    ['label' => 'Donation Requests', 'url' => 'donation-request.php'],
    ['label' => 'About Us', 'url' => 'about.php'],
    ['label' => 'Africa', 'url' => 'africa.php'],
    ['label' => 'Careers', 'url' => 'job.php', 'children' => [
        ['label' => 'General Workers', 'url' => 'job.php'],
        ['label' => 'HQ & Store Management', 'url' => 'https://hungrylion.applytojob.com/apply'],
    ]],
    ['label' => 'Contact Us', 'url' => 'contact.php'],
];

$socialLinks = [
    'Facebook' => 'https://www.facebook.com/hungrylion/',
    'Instagram' => 'https://www.instagram.com/hungrylionsa/',
    'X' => 'https://x.com/hungrylion',
    'TikTok' => 'https://www.tiktok.com/@hungrylionsa',
    'LinkedIn' => 'https://za.linkedin.com/company/hungrylion',
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

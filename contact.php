<?php

declare(strict_types=1);

$pageTitle = 'Contact';
$pageDescription = 'Contact Hungry Lion call centre, head office in Stellenbosch, or share your feedback online.';
$bodyClass = 'page-contact';

$mapEmbedUrl = 'https://maps.google.com/maps?q=Hungry%20Lion%20HQ%20Head%20Office%20Trumali%20St%2C%20Stellenbosch%2C%207600&t=m&z=10&output=embed&iwloc=near';

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="contact-page">
    <div class="contact-page__header">
        <div class="contact-page__inner">
            <h2 class="contact-page__title">Our Contact Details</h2>
        </div>
    </div>

    <div class="contact-page__body">
        <div class="contact-page__inner contact-page__layout">
            <div class="contact-page__map">
                <iframe
                    src="<?= escape($mapEmbedUrl) ?>"
                    title="Hungry Lion HQ Head Office Trumali St, Stellenbosch, 7600"
                    aria-label="Hungry Lion HQ Head Office Trumali St, Stellenbosch, 7600"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                ></iframe>
            </div>

            <div class="contact-page__details">
                <h2 class="contact-page__section-title">Call Centre</h2>
                <div class="contact-page__phone">
                    <span class="contact-page__phone-icon" aria-hidden="true">
                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                            <path d="M497.39 361.8l-112-48a24 24 0 0 0-28 6.9l-49.6 60.6A370.66 370.66 0 0 1 130.6 204.11l60.6-49.6a23.94 23.94 0 0 0 6.9-28l-48-112A24.16 24.16 0 0 0 122.6.61l-104 24A24 24 0 0 0 0 48c0 256.5 207.9 464 464 464a24 24 0 0 0 23.4-18.6l24-104a24.29 24.29 0 0 0-14.01-27.6z"/>
                        </svg>
                    </span>
                    <a href="tel:+27214932600" class="contact-page__phone-link">+27 21 493 2600</a>
                </div>

                <h2 class="contact-page__section-title">Head Office</h2>
                <p class="contact-page__address">
                    Trumali House<br>
                    Trumali St,<br>
                    Harringtons Place,<br>
                    Stellenbosch, 7600<br>
                    South Africa
                </p>

                <h2 class="contact-page__section-title">Share Your Feedback</h2>
                <p class="contact-page__feedback">
                    <a href="https://www.hungrylion.review/" target="_blank" rel="noopener noreferrer">www.hungrylion.review</a>
                </p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

<?php

declare(strict_types=1);

$pageTitle = 'Job';
$pageDescription = 'Join Africa\'s best-loved and fastest growing chicken brand. Apply for general worker positions at Hungry Lion.';
$bodyClass = 'page-job';

$heroImage = 'https://www.hungrylion.co.za/wp-content/uploads/2026/06/1300x380-Final-1024x299.jpg';
$applyUrl = 'https://hungrylion.apply.servios.tech/';

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="job-page">
    <div class="job-page__card">
        <div class="job-page__title-wrap">
            <h2 class="job-page__title">General Workers</h2>
        </div>

        <div class="job-page__hero">
            <img
                src="<?= escape($heroImage) ?>"
                alt="Join the Hungry Lion team"
                width="1024"
                height="299"
                loading="eager"
                decoding="async"
                fetchpriority="high"
            >
        </div>

        <h2 class="job-page__subtitle">Join Africa&rsquo;s Best-Loved and Fastest Growing Chicken Brand!</h2>

        <div class="job-page__intro">
            <p>At Hungry Lion, we serve up Bigger Chicken Pieces, More Thick-Cut Chips, and More to Share&mdash;because great food brings people together!</p>
            <p>Want to be part of a dynamic and passionate team? We&rsquo;re looking for hardworking, energetic team players to join us.</p>
        </div>

        <div class="job-page__apply">
            <p>
                <span class="job-page__apply-icon" aria-hidden="true">📲</span>
                <strong>Apply Now!</strong><br>
                Click here: <a href="<?= escape($applyUrl) ?>" target="_blank" rel="noopener noreferrer">hungrylion.apply</a> to start your journey with Hungry Lion.
            </p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

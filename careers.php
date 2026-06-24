<?php

declare(strict_types=1);

$pageTitle = 'Careers';
$pageDescription = 'Join the Hungry Lion team. Career opportunities for general workers and management across Africa.';
$bodyClass = 'page-careers';

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <h1 class="page-hero__title">Join Our Team</h1>
        <p class="page-hero__subtitle">Build your career with Africa's fastest-growing fried chicken brand</p>
    </div>
</section>

<section id="general" class="section">
    <div class="container content-grid">
        <article class="content-block">
            <h2>General Workers</h2>
            <p>Looking for your first job or a fresh start in the fast-food industry? Hungry Lion offers exciting opportunities for motivated individuals who want to grow with us.</p>
            <p>As a team member, you'll be part of a dynamic environment where you'll learn valuable skills in customer service, food preparation, and teamwork. We provide comprehensive training and support to help you succeed.</p>
            <ul class="feature-list">
                <li>Competitive remuneration</li>
                <li>On-the-job training provided</li>
                <li>Career growth opportunities</li>
                <li>Flexible working hours</li>
                <li>Employee meal benefits</li>
            </ul>
            <a href="contact.php" class="btn btn--primary">Apply Now</a>
        </article>

        <article class="content-block content-block--highlight" id="management">
            <h2>HQ &amp; Store Management</h2>
            <p>Experienced leaders wanted! We're always looking for talented managers to lead our stores and support functions at head office.</p>
            <p>Our culture of internal promotion means many of our area and regional managers started as team members. If you're passionate about people, operations, and delivering exceptional customer experiences, we want to hear from you.</p>
            <ul class="feature-list">
                <li>Store Manager positions</li>
                <li>Area &amp; Regional Manager roles</li>
                <li>Head Office support functions</li>
                <li>Leadership development programmes</li>
                <li>Competitive packages</li>
            </ul>
            <a href="contact.php" class="btn btn--yellow">Contact HR</a>
        </article>
    </div>
</section>

<section class="stats-banner section section--yellow">
    <div class="container stats-grid">
        <div class="stat">
            <span class="stat__number">500+</span>
            <span class="stat__label">Stores</span>
        </div>
        <div class="stat">
            <span class="stat__number">10,000+</span>
            <span class="stat__label">Employees</span>
        </div>
        <div class="stat">
            <span class="stat__number">9</span>
            <span class="stat__label">Countries</span>
        </div>
        <div class="stat">
            <span class="stat__number">1997</span>
            <span class="stat__label">Founded</span>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

<?php

declare(strict_types=1);

$pageTitle = 'Donation Requests';
$pageDescription = 'Submit a donation request to Hungry Lion. We support communities across Africa.';
$bodyClass = 'page-donation';

$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orgName = trim($_POST['org_name'] ?? '');
    $contactName = trim($_POST['contact_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $eventDate = trim($_POST['event_date'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if ($orgName === '') {
        $errors[] = 'Please enter your organisation name.';
    }
    if ($contactName === '') {
        $errors[] = 'Please enter a contact name.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($description === '') {
        $errors[] = 'Please describe your donation request.';
    }

    if ($errors === []) {
        $success = true;
    }
}

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero page-hero--compact">
    <div class="container">
        <h1 class="page-hero__title">Donation Requests</h1>
        <p class="page-hero__subtitle">Supporting the communities we serve</p>
    </div>
</section>

<section class="section">
    <div class="container content-grid">
        <article class="content-block">
            <h2>Community Support</h2>
            <p>At Hungry Lion, we believe in giving back to the communities that have supported us for nearly three decades. We receive many requests for donations and do our best to support worthy causes across the regions where we operate.</p>
            <p>Please complete the form with as much detail as possible about your organisation and the event or initiative you are requesting support for. Our team reviews all requests and will respond within 10 business days.</p>
            <div class="info-box">
                <p><strong>Please note:</strong> Due to the volume of requests received, we cannot guarantee approval for all submissions. Priority is given to registered non-profit organisations and community initiatives.</p>
            </div>
        </article>

        <div class="contact-form-wrap">
            <?php if ($success): ?>
            <div class="alert alert--success" role="status">
                <p>Your donation request has been submitted. We'll be in touch soon.</p>
            </div>
            <?php endif; ?>

            <?php if ($errors !== []): ?>
            <div class="alert alert--error" role="alert">
                <ul>
                    <?php foreach ($errors as $error): ?>
                    <li><?= escape($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php endif; ?>

            <form class="contact-form" method="post" action="donation-request.php" novalidate>
                <div class="form-group">
                    <label for="org_name">Organisation Name</label>
                    <input type="text" id="org_name" name="org_name" required value="<?= escape($_POST['org_name'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="contact_name">Contact Person</label>
                    <input type="text" id="contact_name" name="contact_name" required value="<?= escape($_POST['contact_name'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required value="<?= escape($_POST['email'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="event_date">Event Date (if applicable)</label>
                    <input type="date" id="event_date" name="event_date" value="<?= escape($_POST['event_date'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="description">Request Details</label>
                    <textarea id="description" name="description" rows="6" required placeholder="Tell us about your organisation and what you're requesting..."><?= escape($_POST['description'] ?? '') ?></textarea>
                </div>
                <button type="submit" class="btn btn--primary btn--lg">Submit Request</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

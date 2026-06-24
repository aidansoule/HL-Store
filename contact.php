<?php

declare(strict_types=1);

$pageTitle = 'Contact Us';
$pageDescription = 'Get in touch with Hungry Lion. Contact our head office or find your nearest store.';
$bodyClass = 'page-contact';

$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name === '') {
        $errors[] = 'Please enter your name.';
    }
    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    if ($subject === '') {
        $errors[] = 'Please enter a subject.';
    }
    if ($message === '') {
        $errors[] = 'Please enter your message.';
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
        <h1 class="page-hero__title">Contact Us</h1>
        <p class="page-hero__subtitle">We'd love to hear from you</p>
    </div>
</section>

<section class="section">
    <div class="container contact-grid">
        <div class="contact-info">
            <h2>Head Office</h2>
            <address>
                <p>Hungry Lion (Pty) Ltd</p>
                <p>Stellenbosch, Western Cape</p>
                <p>South Africa</p>
            </address>

            <h3>General Enquiries</h3>
            <p>
                <a href="mailto:info@hungrylion.co.za">info@hungrylion.co.za</a>
            </p>

            <h3>Store Development</h3>
            <p>
                Jacques Dreyer<br>
                <a href="tel:+27837518285">+27 83 751 8285</a><br>
                <a href="mailto:jacques.dreyer@hungrylion.co.za">jacques.dreyer@hungrylion.co.za</a>
            </p>

            <h3>Follow Us</h3>
            <ul class="contact-social">
                <?php foreach ($socialLinks as $name => $url): ?>
                <li><a href="<?= escape($url) ?>" target="_blank" rel="noopener noreferrer"><?= escape($name) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="contact-form-wrap">
            <?php if ($success): ?>
            <div class="alert alert--success" role="status">
                <p>Thank you for your message! We'll get back to you soon.</p>
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

            <form class="contact-form" method="post" action="contact.php" novalidate>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" name="name" required value="<?= escape($_POST['name'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required value="<?= escape($_POST['email'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required value="<?= escape($_POST['subject'] ?? '') ?>">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required><?= escape($_POST['message'] ?? '') ?></textarea>
                </div>
                <button type="submit" class="btn btn--primary btn--lg">Send Message</button>
            </form>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

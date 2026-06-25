    </main>

    <?php require_once __DIR__ . '/social-icons.php'; ?>

    <footer class="site-footer">
        <div class="footer-main hide-mobile">
            <div class="container footer-grid">
                <?php foreach ($footerColumns as $column): ?>
                <div class="footer-col<?= isset($column['modifier']) ? ' footer-col--' . escape($column['modifier']) : '' ?>">
                    <?php foreach ($column['sections'] as $section): ?>
                    <div class="footer-section<?= !empty($section['spaced']) ? ' footer-section--spaced' : '' ?>">
                        <h2 class="footer-col__title"><?= escape($section['title']) ?></h2>
                        <ul class="footer-col__list">
                            <?php foreach ($section['links'] as $link): ?>
                            <li><a href="<?= escape($link['url']) ?>"><?= escape($link['label']) ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php endforeach; ?>
                    <?php if (!empty($column['showSocial'])): ?>
                    <?php renderSocialLinks('desktop'); ?>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="footer-legal-bar hide-mobile">
            <div class="container">
                <p class="footer-legal">
                    <strong>
                        <a href="<?= escape(LEGAL_URL) ?>">Legal</a>
                        &nbsp;|&nbsp;
                        <a href="<?= escape(LEGAL_URL) ?>">&copy; <?= escape(SITE_NAME) ?> <?= CURRENT_YEAR ?></a>
                        &nbsp;|&nbsp;
                        <a href="<?= escape(LEGAL_URL) ?>">All Rights Reserved</a>
                    </strong>
                </p>
            </div>
        </div>

        <div class="footer-mobile-bar hide-desktop">
            <div class="container footer-mobile-bar__inner">
                <?php renderSocialLinks('mobile'); ?>
                <img src="<?= escape(FOOTER_CROWN_URL) ?>" alt="" class="footer-crown" width="68" height="75" aria-hidden="true" loading="lazy">
                <p class="footer-legal">
                    <strong>
                        <a href="<?= escape(LEGAL_URL) ?>">Legal</a>
                        &nbsp;|&nbsp;
                        <a href="<?= escape(LEGAL_URL) ?>">&copy; <?= escape(SITE_NAME) ?> <?= CURRENT_YEAR ?></a>
                        &nbsp;|&nbsp;
                        <a href="<?= escape(LEGAL_URL) ?>">All Rights Reserved</a>
                    </strong>
                </p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js?v=8" defer></script>
</body>
</html>

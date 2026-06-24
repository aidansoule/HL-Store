    </main>

    <?php require_once __DIR__ . '/social-icons.php'; ?>

    <footer class="site-footer">
        <div class="footer-main hide-mobile">
            <div class="container footer-grid">
                <?php foreach ($navLinks as $heading => $links): ?>
                <div class="footer-col">
                    <h3 class="footer-col__title"><?= escape($heading) ?></h3>
                    <ul class="footer-col__list">
                        <?php foreach ($links as $link): ?>
                        <li><a href="<?= escape($link['url']) ?>"><?= escape($link['label']) ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="footer-mobile hide-desktop">
            <div class="container">
                <nav class="footer-mobile-nav" aria-label="Footer navigation">
                    <ul>
                        <?php foreach ($mobileNavLinks as $link): ?>
                        <li class="footer-mobile-nav__item<?= isset($link['children']) ? ' footer-mobile-nav__item--has-children' : '' ?>">
                            <?php if (isset($link['children'])): ?>
                            <button type="button" class="footer-mobile-nav__toggle" aria-expanded="false">
                                <?= escape($link['label']) ?>
                                <span aria-hidden="true">+</span>
                            </button>
                            <ul class="footer-mobile-nav__sub">
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
                </nav>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container footer-bottom__inner">
                <ul class="social-links" aria-label="Social media">
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
                <img src="https://www.hungrylion.co.za/wp-content/uploads/2025/05/cropped-lion-1-192x192.png" alt="" class="footer-lion" width="68" height="68" aria-hidden="true" loading="lazy">
                <p class="footer-legal">
                    <a href="contact.php">Legal</a>
                    &nbsp;|&nbsp;
                    &copy; <?= escape(SITE_NAME) ?> <?= CURRENT_YEAR ?> | All Rights Reserved
                </p>
            </div>
        </div>
    </footer>

    <script src="assets/js/main.js?v=6" defer></script>
</body>
</html>

<?php

declare(strict_types=1);

$pageTitle = 'About';
$pageDescription = "Learn about Hungry Lion – Africa's best-loved chicken brand, founded in 1997 in Stellenbosch, South Africa.";
$bodyClass = 'page-about';

$aboutImageBase = 'https://www.hungrylion.co.za/wp-content/uploads/2025/06';

require_once __DIR__ . '/includes/config.php';
require __DIR__ . '/includes/header.php';
?>

<section class="about-page">
    <div class="about-page__intro">
        <div class="container">
            <h2 class="about-page__welcome">Welcome to the home of Africa&rsquo;s best-loved chicken brand</h2>
        </div>
    </div>

    <div class="about-page__section">
        <div class="container">
            <h2 class="about-page__heading">Who is Hungry Lion?</h2>
            <div class="about-page__text">
                <p>Hungry Lion is a Quick Service Restaurant, founded with a simple yet ambitious vision: To bring joy to our employees, customers, and local communities through food, served with passion.</p>
                <p>We started as a small eatery in 1997, driven by our genuine desire to make people happy through food. Over the years, our dedication, commitment, and focus on quality have propelled us to become a household name in South Africa, Zambia, Namibia, Botswana, Eswatini, Lesotho, Angola, Zimbabwe and Mauritius.</p>
                <p>At the heart of our philosophy lies the belief that good food should never compromise on taste, quality, or nutritional value. We handpick the freshest ingredients, source them responsibly, and skilfully fry each piece of chicken to ensure an explosion of flavours with every bite.</p>
            </div>
        </div>
    </div>

    <div class="about-page__split">
        <div class="container about-page__split-inner">
            <div class="about-page__split-text">
                <h2 class="about-page__heading">Our Story</h2>
                <div class="about-page__text">
                    <p>Hungry Lion opened its first restaurant in South Africa in 1997 with a small store in Eikestad Mall in the iconic student town, Stellenbosch. This store proved so successful that four more stores were added in the same year, of which two were in Zambia, and one in the Eastern Cape.</p>
                    <p>In 1998, we opened our first store in Namibia and in 1999, we branched out into Eswatini and Botswana. In 2010, we expanded into Angola, in 2024 into Lesotho and in 2025 we arrived in Zimbabwe and Mauritius.</p>
                    <p>In 2025, we proudly opened our 500th Hungry Lion store and reached a milestone of 10,000 employees. And that&rsquo;s just the beginning &ndash; we have big plans for expansion in the next few years!</p>
                </div>
            </div>
            <div class="about-page__split-media">
                <img
                    src="<?= escape($aboutImageBase) ?>/IMG_1752-1536x1024-1-1024x683.jpg"
                    alt="Hungry Lion restaurant"
                    width="800"
                    height="534"
                    loading="eager"
                    decoding="async"
                >
            </div>
        </div>
    </div>

    <div class="about-page__split about-page__split--reverse">
        <div class="container about-page__split-inner">
            <div class="about-page__split-media">
                <img
                    src="<?= escape($aboutImageBase) ?>/DSCF1383-1536x1024-1-1024x683.jpg"
                    alt="Hungry Lion food"
                    width="800"
                    height="534"
                    loading="lazy"
                    decoding="async"
                >
            </div>
            <div class="about-page__split-text">
                <h2 class="about-page__heading">Our Food</h2>
                <div class="about-page__text">
                    <p>Hungry Lion prides itself on offering a delicious selection of fried chicken, wings, burgers, chips, drinks, and ice cream, made with quality fresh ingredients and bursting with local flavours. We regularly offer specials and promotions to reward our loyal customers.</p>
                    <p>We understand that our customers value quality food, which is why we use only the freshest ingredients and take great care in preparing each dish with attention to detail. Our commitment to using sustainable practices ensures that our food is not only delicious but also environmentally responsible.</p>
                    <p>Whether you&rsquo;re stopping in for a quick lunch or enjoying a meal with friends and family, you can count on us to provide fast and friendly service, and an eating experience that exceeds your expectations.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="about-page__split">
        <div class="container about-page__split-inner">
            <div class="about-page__split-text">
                <h2 class="about-page__heading">Our Commitment</h2>
                <div class="about-page__text">
                    <p>It&rsquo;s not just our commitment to quality food and great service that sets us apart &ndash; it&rsquo;s our commitment to our employees and the community.</p>
                    <p>We recognise that our staff are key to achieving our ambitions and therefore focus on training, upskilling and providing career development opportunities for all employees. Our network of branch, area and regional managers act as an extension of our Head Office, testament to our culture of internal promotion. Our rapid expansion plan brings exciting opportunities for our hard-working, dedicated staff.</p>
                    <p>We&rsquo;re proud to be a part of the community! We&rsquo;re committed to support the communities in which we operate which is why we prioritise job creation and entrepreneurship through our local initiatives. We believe that by working together, we can make a positive impact on the world around us and create a better future for our children and future generations.</p>
                    <p>Thank you for choosing Hungry Lion, and we look forward to serving you soon!</p>
                </div>
            </div>
            <div class="about-page__split-media">
                <img
                    src="<?= escape($aboutImageBase) ?>/DSCF1376-1536x1024-1-1024x683.jpg"
                    alt="Hungry Lion team"
                    width="800"
                    height="534"
                    loading="lazy"
                    decoding="async"
                >
            </div>
        </div>
    </div>

    <div class="about-page__note">
        <div class="container">
            <p>For new store development, please contact Jacques Dreyer: +27 83 751 8285 / <a href="mailto:jacques.dreyer@hungrylion.co.za">jacques.dreyer@hungrylion.co.za</a></p>
            <p><em><strong>Please note: Hungry Lion does not offer franchise opportunities.</strong></em></p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>

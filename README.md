# Hungry Lion Website (PHP)

A PHP recreation of the [Hungry Lion](https://www.hungrylion.co.za/) fast-food restaurant website, featuring the brand's signature red and yellow styling.

## Requirements

- PHP 8.0 or higher

## Quick Start

From the project root, start PHP's built-in development server:

```bash
php -S localhost:8000
```

Then open [http://localhost:8000](http://localhost:8000) in your browser.

## Pages

| Page | File | Description |
|------|------|-------------|
| Home | `index.php` | Hero carousel, menu categories, careers CTA |
| Menu | `menu.php` | Full menu with prices |
| About | `about.php` | Company history and values |
| Find A Store | `find-store.php` | Store locator with search |
| Careers | `careers.php` | Job opportunities |
| Contact | `contact.php` | Contact form and details |
| Africa | `africa.php` | Countries of operation |
| Delivery Partners | `delivery-partners.php` | Third-party delivery links |
| Donation Requests | `donation-request.php` | Community donation form |

## Project Structure

```
├── index.php              # Home page
├── menu.php               # Menu page
├── about.php              # About page
├── contact.php            # Contact page
├── find-store.php         # Store locator
├── careers.php            # Careers page
├── africa.php             # Africa expansion page
├── delivery-partners.php  # Delivery partners
├── donation-request.php   # Donation requests
├── includes/
│   ├── config.php         # Site configuration
│   ├── menu-data.php      # Menu items and hero slides
│   ├── header.php         # Shared header
│   └── footer.php         # Shared footer
└── assets/
    ├── css/style.css      # Stylesheet
    ├── js/main.js         # Carousel & navigation JS
    └── images/            # Logo and favicon
```

## Deployment

Point your web server document root to this directory. Works with Apache, Nginx, or any PHP-capable host.

## Notes

This is a frontend recreation for demonstration purposes. Contact and donation forms validate input but do not send emails — wire up `mail()` or an SMTP library for production use.

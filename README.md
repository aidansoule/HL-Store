# Hungry Lion Website (PHP)

A PHP recreation of the [Hungry Lion](https://www.hungrylion.co.za/) fast-food restaurant website, featuring the brand's signature red and yellow styling.

## Requirements

- PHP 8.0 or higher

## Local Development with MAMP

[MAMP](https://www.mamp.info/) is the recommended local setup on macOS.

### Install (one time)

From the project root:

```bash
./scripts/setup-mamp.sh
```

This script:

- Symlinks the project into `/Applications/MAMP/htdocs/hl-store`
- Configures Nginx for `hl-store.local` on port `8888`
- Fixes a common Apache `mamp` user issue on fresh installs
- Starts MAMP's Nginx + PHP servers
- Adds `127.0.0.1 hl-store.local` to `/etc/hosts` (prompts for password)

### Daily use

Start the local servers:

```bash
./scripts/start-mamp.sh
```

Stop them when finished:

```bash
./scripts/stop-mamp.sh
```

### Open the site

| URL | When to use |
|-----|-------------|
| [http://localhost:8888/hl-store/](http://localhost:8888/hl-store/) | Always works after `./scripts/start-mamp.sh` |
| [http://hl-store.local:8888/](http://hl-store.local:8888/) | After hosts entry is added |

No database is required — this is a static PHP frontend.

**Note:** MAMP 7.x uses Nginx by default. If Apache fails to start, use the Nginx URLs above or run `./scripts/setup-mamp.sh` to apply the Apache user fix.

## Quick Start (PHP built-in server)

If you prefer not to use MAMP, start PHP's built-in development server from the project root:

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

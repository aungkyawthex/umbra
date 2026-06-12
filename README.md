# Umbra 🖋️

Umbra is a minimalist blog platform built with **pure PHP** and **Tailwind CSS**, designed for thoughtful writing rather than endless scrolling.
It focuses on clarity, reading experience, and personal expression.

> _Built for thinking._

---

## Features

### Writing & Publishing
- Create, edit, and delete blog posts
- Cover image uploads (JPEG, PNG, GIF, WebP; max 2MB)
- Tag system with comma-separated input
- Draft, published, and scheduled post statuses
- Word count and estimated reading time
- Auto-generated slugs from titles

### Reading & Discovery
- Homepage with hero section and latest posts
- Full posts listing with search and tag filtering
- Paginated results (6 posts per page)
- Single post view with full content, tags, and cover images

### Social Features
- Like / unlike posts (AJAX-powered)
- Write reflections (comments) on posts
- Follow / unfollow authors
- Personal feed page showing followed authors' posts
- Real-time notifications for likes and comments

### User Profiles
- Public author profiles with bio
- Profile page with all published posts
- Edit and delete your own posts from the profile view

### SEO & Discoverability
- Dynamic Open Graph and Twitter Card meta tags
- JSON-LD structured data (WebSite and BlogPosting schemas)
- Auto-generated `/sitemap.xml`
- Dynamic `/robots.txt`
- Per-page title, description, and canonical URLs

### UI/UX
- Dark mode (follows system theme preference)
- Responsive design with mobile hamburger menu
- Flash messages for success/error/warning
- CSRF protection on all forms
- Image preview before upload
- Auto-expanding textareas
- Lazy-loaded images

---

## Tech Stack

| Layer | Technology |
|-------|------------|
| **Backend** | PHP (Vanilla, MVC-style structure) |
| **Database** | MySQL (PDO) |
| **Frontend** | Tailwind CSS v4 |
| **Icons** | Font Awesome 6.4 (CDN) |
| **Fonts** | Manrope + Noto Sans Myanmar (Google Fonts) |
| **Email** | PHPMailer v7 (SMTP) |
| **Auth** | PHP Sessions |

---

## Requirements

- **PHP** 7.4+ with the following extensions:
  - PDO (MySQL driver)
  - `mbstring`
  - `fileinfo`
  - `session`
- **MySQL** 5.7+ or MariaDB 10.3+
- **Composer**
- **Node.js** and **npm** (for Tailwind CSS compilation)
- **Apache** with `mod_rewrite` (production) or PHP built-in server (development)

---

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/aungkyawthex/umbra.git
cd umbra
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install Node.js dependencies and build CSS

```bash
npm install
npm run dev       # one-time build
# or
npm run watch     # watch mode for development
```

### 4. Create the database

Log into MySQL and create the database:

```sql
CREATE DATABASE umbra_blog;
USE umbra_blog;
```

---

## Project Structure

```
umbra/
├── app/
│   ├── Core/               # App bootstrap, Router, Database, Base Controller
│   ├── Controllers/        # Auth, Blog, Profile, User controllers
│   ├── Helpers/            # Auth guards, utility functions, CSRF, flash messages
│   └── Services/           # PHPMailer-based email service
├── config/
│   └── database.php        # Database credentials
├── routes/
│   └── web.php             # Route definitions
├── views/
│   ├── layouts/            # Master layout
│   ├── auth/               # Login & register forms
│   ├── blog/               # Homepage, post views, create/edit forms
│   ├── posts/              # Posts listing with search
│   ├── profile/            # User profile page
│   ├── reading-list/       # Personal feed
│   ├── pages/              # Terms & conditions
│   └── errors/             # 404 page
├── public/
│   ├── index.php           # Entry point
│   ├── .htaccess           # Apache URL rewriting
│   ├── assets/             # CSS, images
│   └── uploads/            # User-uploaded cover images
├── vendor/                 # Composer dependencies
├── composer.json
└── package.json
```

---

## Configuration Notes

- **Error reporting** is enabled by default in `index.php`. Disable `display_errors` and set `error_reporting` to `0` or `E_ALL & ~E_DEPRECATED & ~E_STRICT` in production.
- **Scheduled posts** are published on-demand when a visitor loads the post page (the SQL query checks `scheduled_at <= NOW()`). There is no cron job or background worker.
- **Email** (PHPMailer) is configured for Gmail SMTP but requires a valid [Google App Password](https://support.google.com/accounts/answer/185833) in `app/Services/Mail.php`. The mail service is currently not called from the registration flow.
- **Shared hosting** compatible. The `.htaccess` file in `public/` handles URL rewriting for Apache.

---

## License

This project is open source. See the repository for license details.

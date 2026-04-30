# Student Resource Hub

A community-driven resource sharing platform for college students. Find textbooks, mental health support, tech tools, and career services.

## Quick Start with DDEV

[DDEV](https://ddev.com/get-started/) is an easy local dev environment - no PHP/DB install needed!

### 1. Install DDEV
Follow the [official install guide](https://ddev.com/get-started/) for your OS:
- Linux, macOS, Windows instructions included
- Requires Docker (install first if needed)

Verify: `ddev version`

### 2. Clone & Start
```bash
git clone https://github.com/ColtOsb/LabProject.git student-resource-hub
cd student-resource-hub
ddev config
ddev start
ddev launch
```

### 3. Database Setup
```bash
ddev import-db --src=dump.sql  # Creates users + resources tables
```

### 4. Access App
- **Site**: https://student-resource-hub.ddev.site
- **DB**: `ddev mysql` (user: `db`, pass: `db`)

## Features
- ✅ User registration/login (PHP sessions + PDO/MySQL)
- ✅ Add/browse resources (CRUD)
- ✅ Protected pages
- ✅ Responsive design (CSS Grid)
- ✅ Dynamic home page from DB

## Manual Setup
PHP 8+ + MySQL server required. Import `dump.sql` and point webserver docroot to `public/`.

## Troubleshooting
ddev describe # Check docroot=public, URLs
ddev logs -s web # Nginx/PHP errors
ddev restart # Reset
## File Structure
├── public/ # Docroot (index.php router)
├── config/ # db.php
├── controllers/ # UserController.php, ResourceController.php
├── models/ # User.php, Resource.php
├── views/ # login.php, home.php, add.php
├── styles.css # Responsive design
└── dump.sql # Empty DB schema (users + resources)


**Production ready** → just point Apache/Nginx docroot to `public/`!

---

*Built for CS 3600 • April 2026*

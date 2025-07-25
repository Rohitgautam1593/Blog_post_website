# Blog Post PHP

A simple blog web app using PHP, MySQL, HTML/CSS, and JavaScript.

## Setup Instructions

1. **Clone the repository**

2. **Create the Database**
   - Import `blog_db.sql` into your MySQL server:
     - Using phpMyAdmin: Import the file.
     - Using CLI: `mysql -u root -p < blog_db.sql`

3. **Configure Database Connection**
   - Edit `config/db.php` if your DB credentials differ from the defaults.

4. **Run the App**
   - Place the project in your web server's root (e.g., `htdocs` for XAMPP).
   - Access `http://localhost/blog_post_php/index.php` in your browser.

5. **Admin Access**
   - Manually set a user's role to `admin` in the `users` table for admin features.

## Features
- User registration and login
- Create, view, and list blog posts
- Comment on posts (with moderation)
- Admin dashboard for comment moderation
- Search posts

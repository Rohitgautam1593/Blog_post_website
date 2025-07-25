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

--- 

The error `Fatal error: Uncaught PDOException: could not find driver` means the **PDO MySQL extension is still not enabled** in your PHP configuration.

This is a PHP setup issue, not a code issue.  
**No code or command I run here can fix it until you enable the extension in your local PHP installation.**

---

## **How to Fix (Step-by-Step, Please Follow Exactly):**

1. **Find your PHP installation folder**  
   (e.g., `C:\php` or `C:\Program Files\php`)

2. **Open `php.ini` in a text editor**  
   - If you don’t see `php.ini`, copy `php.ini-development` or `php.ini-production` to `php.ini` and edit that.

3. **Search for this line:**  
   ```
   ;extension=pdo_mysql
   ```
   - Remove the `;` at the start so it becomes:
   ```
   extension=pdo_mysql
   ```

4. **Save the file.**

5. **Restart your PHP server:**  
   - Stop the running PHP server (press `Ctrl+C` in the terminal).
   - Start it again:
     ```
     php -S localhost:8000
     ```

---

### **Verify the Fix**

1. Create a file called `phpinfo.php` in your project directory with this content:
   ```php
   <?php phpinfo();
   ```
2. Visit `http://localhost:8000/phpinfo.php` in your browser.
3. Search for `pdo_mysql` in the output.  
   - If you see it, the extension is enabled.
   - If not, the extension is still not enabled.

---

**This is a one-time manual setup step required for all PHP+MySQL projects.**  
If you need, I can walk you through it in detail or help you debug your `php.ini` file.  
Let me know if you want to upload your `php.ini` or need screenshots for the process! 
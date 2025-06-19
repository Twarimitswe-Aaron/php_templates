# User Registration and Login System with Admin Panel

## Overview
This project is a secure, beginner-friendly user registration and login system built with PHP and MySQL. It includes an admin panel, user management, and modern security features. The system is designed for easy learning and practical use in web applications.

## Working Principle
- Users can register, verify their email, log in, and manage their profile.
- Passwords are securely hashed and never stored in plain text.
- The system uses session management and cookies for authentication.
- Admins can manage users and view statistics from a dedicated panel.

## Features
- **User Registration** with email verification
- **Secure Login** with password hashing
- **Remember Me** (persistent login with cookies)
- **Account Lockout** after multiple failed login attempts
- **Password Strength Meter** on signup
- **Forgot Password** with secure reset link (no plain text passwords sent)
- **Change Password** (with old password verification)
- **Profile Management** (view and edit profile)
- **Admin Panel** for user management
- **Fully Commented Code** for easy learning
- **Responsive UI** with Bootstrap

## Setup Instructions
### 1. Requirements
- XAMPP (or any PHP/MySQL server)
- Composer (for PHPMailer dependencies)

### 2. Installation
1. **Clone or copy the project** to your XAMPP `htdocs` directory:
   ```
   C:/xampp/htdocs/PHP/User-Registration-and-login-System-with-admin-panel/User Registration and login System with admin panel/loginsystem
   ```
2. **Import the database**:
   - Open phpMyAdmin.
   - Create a database named `loginsystem`.
   - Import the `SQL File/loginsystem.sql` file.
3. **Configure database connection**:
   - Edit `includes/config.php` if your MySQL username/password is different.
4. **Set up PHPMailer for email**:
   - In `signup.php`, `password-recovery.php`, set your Gmail SMTP credentials:
     ```php
     $mail->Username = 'your gmail id here';
     $mail->Password = 'your gmail password here';
     $mail->setFrom('your gmail id here', 'Your Name');
     ```
   - Allow less secure apps or use an app password if 2FA is enabled.
   - Run `composer install` in the `vendor/phpmailer/phpmailer` directory if needed.
5. **Start Apache and MySQL** in XAMPP.
6. **Visit** `http://localhost/PHP/User-Registration-and-login-System-with-admin-panel/User%20Registration%20and%20login%20System%20with%20admin%20panel/loginsystem/` in your browser.

## File Structure
```
loginsystem/
  admin/           # Admin panel files
  assets/          # JS/CSS/image assets
  css/             # Custom styles
  includes/        # Config, navbar, sidebar, footer
  js/              # Custom scripts
  vendor/          # PHPMailer and dependencies
  index.php        # Home page
  login.php        # User login
  signup.php       # User registration
  profile.php      # User profile
  edit-profile.php # Edit profile
  change-password.php # Change password
  password-recovery.php # Forgot password
  reset-password.php    # Password reset via link
  verify.php            # Email verification
  logout.php       # Logout script
  welcome.php      # Welcome page after login
```

## How to Use
- **Register:** Click "Signup Here" on the home page, fill the form, and check your email for a verification link.
- **Verify Email:** Click the link in your email to activate your account.
- **Login:** Enter your email and password. Use "Remember Me" for persistent login.
- **Forgot Password:** Click "Forgot Password?" to receive a reset link.
- **Change Password:** After login, go to "Change Password".
- **Edit Profile:** After login, go to "Profile" > "Edit Profile".
- **Logout:** Click "Logout" from any page.
- **Admin Panel:** Use the "Admin Panel" card on the home page (default admin credentials can be set in the database).

## Security Notes
- **Passwords** are hashed using PHP's `password_hash` and `password_verify`.
- **No plain text passwords** are ever sent or stored.
- **Account lockout** prevents brute-force attacks.
- **Email verification** ensures only real users can log in.
- **Reset links** are time-limited and single-use.
- **All user input** is validated and sanitized.

## Credits
- UI based on Bootstrap 5
- Email via PHPMailer
- Developed and commented for learning and practical use

---

**For any issues or questions, please open an issue or contact the project maintainer.** 
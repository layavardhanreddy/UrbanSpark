# UrbanSpark - Ignite Ideas for a Smarter City

A full-stack web application for submitting and managing city improvement ideas.

## Setup Instructions

1. **Database Setup**
   - Import the `setup.sql` file into your MySQL server
   - Default admin credentials:
     - Username: admin
     - Password: admin123

2. **Directory Structure**
   - `uploads/` - For storing uploaded files
   - `assets/images/` - For storing images
   - `db/config.php` - Database configuration

3. **Web Server Requirements**
   - PHP 7.4 or higher
   - MySQL 5.7 or higher
   - Apache/Nginx web server
   - PHP extensions: mysqli, fileinfo, gd

4. **Configuration**
   - Update database credentials in `db/config.php` if needed
   - Ensure the `uploads` directory has write permissions
   - Add a city-themed background image to `assets/images/city-bg.jpg`

5. **Security Notes**
   - Change the default admin password after first login
   - Ensure the `uploads` directory is not publicly accessible
   - Keep your database credentials secure

## Features
- User idea submission with file uploads
- Idea gallery with filtering and sorting
- AJAX-powered like functionality
- Admin panel for idea management
- Statistics visualization
- Responsive design with Tailwind CSS

## File Structure
```
├── index.html
├── submit.html
├── ideas.php
├── stats.html
├── assets/
│   └── images/
├── uploads/
├── php/
│   ├── submit_idea.php
│   └── like_idea.php
├── db/
│   └── config.php
└── admin/
    ├── login.php
    ├── dashboard.php
    └── logout.php
``` 
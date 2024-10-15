# WordPress Project

## Overview

This repository contains the `wp-content` folder for a WordPress installation. It is designed to be used with a local WordPress setup. Follow the instructions below to set up your local environment, configure a virtual host, and get started.

## Prerequisites

- XAMPP or another local server setup (e.g., MAMP, WAMP)
- Git installed on your machine
- Basic knowledge of using the terminal

## Setup Instructions

### 1. Install WordPress Locally

1. **Download the latest WordPress:**
   - Go to the [WordPress.org download page](https://wordpress.org/download/) and download the latest version.

2. **Extract and Move WordPress:**
   - Extract the downloaded file.
   - Move the extracted folder to your local server's `htdocs` directory (e.g., `/opt/lampp/htdocs/` for XAMPP).

### 2. Create a Database

1. **Open phpMyAdmin:**
   - Navigate to `http://localhost/phpmyadmin` in your web browser.

2. **Create a New Database:**
   - Click on the "Databases" tab.
   - Enter a name for your database and click "Create."

### 3. Configure WordPress

1. **Rename the `wp-config-sample.php` file:**
   - Go to your WordPress folder and rename `wp-config-sample.php` to `wp-config.php`.

2. **Edit `wp-config.php`:**
   - Open the `wp-config.php` file and update the following lines with your database details:
   ```php
   define('DB_NAME', 'your_database_name');
   define('DB_USER', 'root'); // Default for XAMPP
   define('DB_PASSWORD', ''); // Default for XAMPP
   define('DB_HOST', 'localhost');

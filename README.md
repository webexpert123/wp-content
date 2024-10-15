# WordPress Project README

## Overview

This repository contains the `wp-content` folder for a WordPress installation. It is intended to be used with a local WordPress setup. Follow the instructions below to set up your local environment, create a virtual host, and get started.

## Prerequisites

- XAMPP or another local server setup (e.g., MAMP, WAMP)
- Git installed on your machine
- Basic knowledge of using the terminal

## Setup Instructions

1. **Install WordPress Locally:**
   - Download the latest WordPress from the [WordPress.org download page](https://wordpress.org/download/) and extract the files.
   - Move the extracted folder to your local server's `htdocs` directory (e.g., `/opt/lampp/htdocs/` for XAMPP).

2. **Create a Database:**
   - Open phpMyAdmin by navigating to `http://localhost/phpmyadmin`.
   - Click on the "Databases" tab, enter a name for your database, and click "Create."

3. **Configure WordPress:**
   - Rename the `wp-config-sample.php` file in your WordPress directory to `wp-config.php`.
   - Open `wp-config.php` and update the following lines with your database details:
     ```php
     define('DB_NAME', 'your_database_name');
     define('DB_USER', 'root'); // Default for XAMPP
     define('DB_PASSWORD', ''); // Default for XAMPP
     define('DB_HOST', 'localhost');
     ```

4. **Change the Site URL:**
   - In `wp-config.php`, add the following lines to set the correct URL:
     ```php
     define('WP_HOME', 'http://your_local_domain');
     define('WP_SITEURL', 'http://your_local_domain');
     ```

5. **Create a Virtual Host:**
   - Open the Apache configuration file:
     ```bash
     sudo nano /opt/lampp/etc/httpd.conf
     ```
   - Uncomment the line to include virtual hosts:
     ```apache
     #Include etc/extra/httpd-vhosts.conf
     ```
   - Edit the Virtual Hosts file:
     ```bash
     sudo nano /opt/lampp/etc/extra/httpd-vhosts.conf
     ```
   - Add a new virtual host configuration:
     ```apache
     <VirtualHost *:80>
         DocumentRoot "/opt/lampp/htdocs/your_wordpress_folder"
         ServerName your_local_domain
         <Directory "/opt/lampp/htdocs/your_wordpress_folder">
             AllowOverride All
             Require all granted
         </Directory>
     </VirtualHost>
     ```
   - Update your hosts file:
     ```bash
     sudo nano /etc/hosts
     ```
     Add the following line:
     ```
     127.0.0.1 your_local_domain
     ```
   - Restart XAMPP to apply the changes:
     ```bash
     sudo /opt/lampp/lampp restart
     ```

6. **Clone the Repository:**
   - Clone this repository to your WordPress directory:
     ```bash
     git clone <repository-url> /opt/lampp/htdocs/your_wordpress_folder/wp-content
     ```
   - Delete the existing `wp-content` folder if it exists, and ensure the cloned content is in the correct location.

7. **Import the Database:**
   - The database will be provided via email or another source. Once received, import it into your local database using phpMyAdmin:
     - Open phpMyAdmin at `http://localhost/phpmyadmin`.
     - Select your database.
     - Click on the "Import" tab, choose the SQL file, and click "Go."

8. **Access Your Local WordPress Site:**
   - Open your web browser and navigate to `http://your_local_domain`. Your WordPress site should be up and running.

## Notes

- If you need any help with the database or setup, please reach out via email.
- Ensure to check permissions for the `wp-content` folder as needed.

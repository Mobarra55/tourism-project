# Use a ready-made image with Apache + PHP (latest stable as of 2025)
FROM php:8.3-apache

# Enable mod_rewrite (useful if you have .htaccess files for clean URLs)
RUN a2enmod rewrite

# Copy all your project files into the web root
COPY . /var/www/html/

# Optional: Install common PHP extensions your app might need
# Uncomment lines below if you use PDO/MySQL, GD for images, etc.
# RUN docker-php-ext-install pdo_mysql mysqli gd

# Set permissions (important for any writable folders, if your app has uploads)
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 (Render ignores this but it's good practice)
EXPOSE 80

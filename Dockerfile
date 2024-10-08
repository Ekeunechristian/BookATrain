# Use the official PHP image with Apache
FROM php:8.3.12-apache

# Copy your application code to the Apache server directory
COPY . /var/www/html/

# Enable Apache mod_rewrite
RUN a2enmod rewrite


FROM php:8.1-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mysqli zip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHPUnit globally
RUN composer global require phpunit/phpunit --prefer-dist

# Set Composer global bin directory to PATH
ENV PATH="/root/.composer/vendor/bin:${PATH}"

# Enable Apache mod_rewrite (useful for frameworks like Laravel/Symfony)
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html

# Expose the default Apache port
EXPOSE 80


FROM php:7.4-apache

# Install necessary PHP extensions and tools
RUN docker-php-ext-install mysqli

# Enable Apache modules
RUN a2enmod rewrite ssl

# Copy custom Apache configuration
COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

# Copy your application code into the container
COPY . /var/www/html

# Expose ports
EXPOSE 80
EXPOSE 443

FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install gd zip pdo pdo_mysql exif \
&& docker-php-ext-enable exif

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --no-scripts --no-autoloader

# Set permissions for Laravel storage and cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Install Node.js 16.x and npm dependencies
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash - && \
    apt-get install -y nodejs

# Install npm packages
RUN npm install

# Run npm build (use npm run dev if you prefer not to build)
RUN npm run build

# Expose port 9000
EXPOSE 9000

# Start PHP-FPM
CMD ["php-fpm"]


# FROM php:8.1-fpm

# # Install dependencies
# RUN apt-get update && apt-get install -y \
#     build-essential \
#     libpng-dev \
#     libjpeg62-turbo-dev \
#     libfreetype6-dev \
#     libonig-dev \
#     libxml2-dev \
#     zip \
#     unzip \
#     git \
#     curl \
#     && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# # Install Composer
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Set working directory
# WORKDIR /var/www

# # Copy project files ke working directory
# COPY . .

# # Install dependencies Laravel
# RUN composer install

# # Set permission untuk folder storage dan bootstrap
# RUN mkdir -p /var/www/storage /var/www/bootstrap/cache && \
#     chown -R www-data:www-data /var/www && \
#     chmod -R 775 /var/www/storage && \
#     chmod -R 775 /var/www/bootstrap/cache

# # Gunakan user www-data
# USER www-data

# # Expose port 9000 untuk PHP-FPM
# EXPOSE 9000

# CMD ["php-fpm"]

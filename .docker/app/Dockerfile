FROM php:8.0-fpm

# Install dependencies
RUN apt update && apt install -y \
    build-essential \
    libfontconfig1 libxrender1 \
    zlib1g-dev \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    libpng-dev \
    libgmp-dev \
    libjpeg62-turbo-dev \
    libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev \
    libfreetype6 \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    wget \
    apt-utils

# Set working directory
WORKDIR /var/www/app/

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install intl opcache pdo pdo_mysql mbstring zip exif pcntl bcmath gmp gd
RUN pecl install apcu
RUN docker-php-ext-enable apcu
RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.1.4

#Install symfony
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

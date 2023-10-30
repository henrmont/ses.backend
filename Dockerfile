FROM php:8.2-fpm

# Install Dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    libicu-dev \
    zip \
    nginx \
    supervisor \
    unzip

# PHP_CPPFLAGS are used by the docker-php-ext-* scripts
ENV PHP_CPPFLAGS="$PHP_CPPFLAGS -std=c++11"

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Configure extensions
RUN docker-php-ext-configure intl && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

# Install extensions
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    opcache \
    intl

# Purge dependencies
RUN apt-get remove libicu-dev icu-devtools -y

# Configure opcache
RUN { \
    echo 'opcache.memory_consumption=128'; \
    echo 'opcache.interned_strings_buffer=8'; \
    echo 'opcache.max_accelerated_files=4000'; \
    echo 'opcache.revalidate_freq=2'; \
    echo 'opcache.fast_shutdown=1'; \
    echo 'opcache.enable_cli=1'; \
    } > /usr/local/etc/php/conf.d/php-opocache-cfg.ini

# Install aplication
WORKDIR /var/www/html
COPY . .
RUN chmod -R 777 .

# Set entrypoint
COPY entrypoint.sh /etc/entrypoint.sh
ENTRYPOINT ["/etc/entrypoint.sh"]


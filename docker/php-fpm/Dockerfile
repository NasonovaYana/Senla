FROM php:8.0-fpm

RUN apt-get update && apt-get -y upgrade \
    && apt-get install apt-utils git zip libzip-dev\
                libpng-dev libwebp-dev libjpeg62-turbo-dev libfreetype6-dev -y \
    && docker-php-ext-configure gd --with-freetype \
    && docker-php-ext-install zip pdo pdo_mysql gd \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && apt-get clean


ENV COMPOSER_ALLOW_SUPERUSER 1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet \
    && rm -rf /root/.composer/cash

WORKDIR "/application"
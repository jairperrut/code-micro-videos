FROM php:7.3.6-fpm-alpine3.9

ENV SHELL /bin/bash

RUN apk add --no-cache openssl bash mysql-client nodejs npm
RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www
RUN rm -rf /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN composer install && \
    php artisan config:cache && \
    chmod -R 777 storage
    
RUN ln -s public html    

EXPOSE 9000
ENTRYPOINT ["php-fpm"]
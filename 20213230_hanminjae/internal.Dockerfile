# internal.Dockerfile
FROM php:8.2-apache

COPY ./page/internal/ /var/www/html/
RUN docker-php-ext-install mysqli
EXPOSE 80

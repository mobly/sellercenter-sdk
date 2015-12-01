FROM php:5

VOLUME /sellercenter-sdk

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y libcurl4-openssl-dev libxslt-dev

RUN docker-php-ext-install curl xsl mbstring

RUN php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin --filename=composer

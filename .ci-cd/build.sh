#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && exit 0

set -xe

# Install git (the php image doesn't have it) which is required by composer
apt-get update -yqq
apt-get install git zip unzip wget -yqq

# Install Xdebug (driver for output code coverage)
pecl install xdebug
docker-php-ext-enable xdebug

echo "xdebug.mode=coverage" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \

# Install composer
curl -sS https://getcomposer.org/installer | php

# Install all project dependencies
php composer.phar install

# Install infection
wget https://github.com/infection/infection/releases/download/0.21.5/infection.phar
wget https://github.com/infection/infection/releases/download/0.21.5/infection.phar.asc
chmod +x infection.phar
mv infection.phar /usr/local/bin/infection
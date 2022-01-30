#!/bin/bash

# We need to install dependencies only for Docker
[[ ! -e /.dockerenv ]] && exit 0
set -xe

# Install composer
curl -sS https://getcomposer.org/installer | php

# Install all project dependencies
php composer.phar install --no-dev
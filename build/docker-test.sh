#!/usr/bin/env bash

cd sellercenter-sdk
composer install
vendor/bin/phpunit


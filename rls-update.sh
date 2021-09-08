#!/bin/sh

DIR_SRC=`dirname $0`

cd $DIR_SRC/
git pull
composer install --no-interaction

chown -R www-data:www-data $DIR_SRC/

php $DIR_SRC/artisan  optimize:clear
php $DIR_SRC/artisan queue:restart

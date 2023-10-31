#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

role=${CONTAINER_ROLE:-app}

if [ "$role" = "app" ]; then

    echo 'laravel is starting in app mode.'
    php artisan optimize:clear
    php artisan view:cache
    php-fpm -D
    nginx -g "daemon off;"

elif [ "$role" = "queue" ]; then

    echo 'laravel is starting in queue mode.'
    php artisan queue:work --verbose --tries=3 --timeout=600

fi




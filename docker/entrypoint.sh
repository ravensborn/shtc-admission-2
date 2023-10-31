#!/bin/bash

if [ ! -f "vendor/autoload.php" ]; then
    composer install --no-progress --no-interaction
fi

role=${CONTAINER_ROLE:-app}

if [ "$role" = "app" ]; then

    php artisan optimize:clear
    php artisan view:cache
    php-fpm -D
    nginx -g "daemon off;"

elif [ "$role" = "queue" ]; then

    php artisan queue:work

fi




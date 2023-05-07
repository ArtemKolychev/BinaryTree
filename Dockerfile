FROM php:8.2-cli

WORKDIR /usr/src/www
COPY . /usr/src/www

CMD [ "php", "./index.php" ]
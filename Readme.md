## TheShopworks  technical test

### Requirements:

* [Docker](https://www.docker.com/) in order to quickly bring up a database
* PHP in order to run Laravel
* PHPUnit
* Composer
* Yarn

### Setup

    docker-compose up -d
    docker exec -i shopworks_db_1 mysql -uapp -ptest local < db/install.sql
    cd src
    composer install
    yarn install
    php artisan serve

### Testing

    cd src
    phpunit
# TRANSFER MONEY

## Dependências
* [Mysql 5.7](https://dev.mysql.com/downloads/mysql/5.7.html)
* [PHP 7.3](https://www.php.net/downloads.php)
* [Composer](https://getcomposer.org/download/)

## Instalação & execução

* `$ git clone https://github.com/NataliaLira/transferSystem.git`
* `$ cd transferSystem` 
* `cp .env.example .env`

### Manual

* `$ composer install`
* `$ php artisan key:generate`
* `$ php artisan config:cache`
* `$ php artisan serve`

#### Migrações

* `$ php artisan migrate`
* `$ php artisan db:seed`

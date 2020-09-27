# Rest API Lumen Skeleton

Basic structure for creating REST APIs using Lumen Framework and extra packages

### System requirements

- PHP >= 7.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension

### Installation


```sh
$ git clone https://github.com/krepe/lumen8-api-skeleton.git
$ cd lumen8-api-skeleton.git/
```
IMPORTANT: configure .env (copy .env.example) at the root of the application with the development variables: connections with MySQL and MongoDB, APP Ids of the authentication services (google, facebook).
```sh
$ composer install
$ php artisan key:generate
$ php artisan jwt:secret
$ php artisan migrate
$ php artisan db:seed --class=UserSeeder
$ php -S localhost:8000 -t public
```

Development server running in: http://localhost:8000

### Packages Used

- Lumen Micro Framework [https://lumen.laravel.com/docs/8.x]
- JWT Auth [https://github.com/tymondesigns/jwt-auth/]
- Lumen Config Discover [https://github.com/tymondesigns/jwt-auth/]
- Lumen Generator [https://github.com/chuckrincon/lumen-config-discover]


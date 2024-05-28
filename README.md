<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requirements
- PHP 8.3
- Docker
## Packages used
- laravel/sail: Used to enable applications without the need to have a web server. Instead, it uses docker to create all the necessary packages (MySQL, etc.)
- laravel/breeze: Used to generate the front end of the application using Inertia with Vue

## How to install sail

1. ```composer require laravel/sail --dev```
2. ```php artisan sail:install```
3. On the select list pick ```MySQL```

First launch:
1. Docker must be running
2. ```./vendor/bin/sail up``` OR If you configure the alias as in the documentation https://laravel.com/docs/11.x/sail#configuring-a-shell-alias You canuse ```sail up```
3. Sail is going to create Docker container with MySQL and application

## How to install breeze

1. ```composer require laravel/breeze --dev```
2. ```php artisan breeze:install```
3. On the select list pick ```Vue with Inertia```
4. Select ```TypeScript``` by pressing ```space``` and then ```enter```
5. Then confirm the default selected option (```PHPUnit```)

First launch:

1. Run ```npm install``` to install all package
- You canrun ```build``` or ```dev```: <br>
    1.```build```: <br>
         -```npm run build```
    2.```dev```: <br>
        -```npm run dev```

## Next

1. Run migration ```sail artisan migrate```
2. Run seeder ```sail artisan db:seed``` (default user is set in ```database/seeders/DatabaseSeeder.php```)
3. Now you can go to [Localhost](http://localhost)
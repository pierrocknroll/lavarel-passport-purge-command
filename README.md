# lavarel-passport-purge-command
This command purges expired access/refresh tokens for Laravel Passport to not overload your database

## Installation
* Install the command with composer :
```
composer require "pierrocknroll/lavarel-passport-purge-command @dev"
```

* For Laravel <= 5.4, add the command to your /config/app.php in the providers array :
```
\Pierrocknroll\LavarelPassportPurgeCommand\ServiceProvider::class
```
For Laravel >= 5.5, the package is auto discovered.

## Usage
```
php artisan passport:purge
```

### Options
```
--days : Number of days the tokens must be expired, default 30.
```


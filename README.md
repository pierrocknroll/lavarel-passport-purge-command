# lavarel-passport-purge-command
This command purge expired access/refresh tokens for Laravel Passport to not overload your database

## Installation

* Add the command to your /app/console/Kernel.php in the $commands array :
``` 
protected $commands = [
    Pierrocknroll\LavarelPassportPurgeCommand\PurgeOldTokens::class
];
```

## Usage
```
php artisan passport:purge
```

### Options
```
--days : Number of days the tokens must be expired, default 30.
```


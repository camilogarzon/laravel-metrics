# laravel-metrics
Metrics Tracking System

Go to project folder:
```sh
$ cd $HOME/laravel-metrics
```

Install dependencies with composer:
```sh
$ composer install
```


Check credentials in ``.env`` file to set a connection with the database. Then restore a backup from my local database (``homestead_2017-07-27.sql``), or create schema from migrations:  
```sh
$ php artisan migrate
```

Set permissions:
```sh
$ chmod -R 777 $HOME/laravel-metrics/storage/*
```




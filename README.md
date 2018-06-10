# Installation

## Add Package

Add following package into your composer.json.

```php
 "require": {

    "chouhai2018/showrouter": "dev-master"

}  
```

 After adding packages, run the following command:

```
 composer update
```

##  Add Service Provider

Add following service provider into your providers array in config/app.php

```
\Chouhai2018\ShowRouter\ShowRouterServiceProvider::class,
```

## Run the following command:

```
 php artisan vendor:publish
```

Note:look at [num]ChouHai2018, input num enter

```
php artisan migrate
```

## Access

 http://localhost:8000/showrouter 

# Customization

## Customize Routes

You can customize your route to anything other than showrouter.

 Open `config/chouhai2018/showrouter.php`

 Change the value of route parameter to your favorite one.

##  Customize View

Publish view file by,

```
 php artisan vendor:publish --tag=views
```

 It will publish view file to `resources/views/routes/showrouter.php`. Customize it the way you want. 

## Change Configuration View

Change view parameter in `config/chouhai2018/showrouter.php` to routes.showrouter 

# Language

Change Configuration  `config/chouhai2018/showrouter.php` to `zhcn => true`,display 简体中文 for web.

Note:default is English 

# Security

Of course, you need to secure this route showrouter in the production environment.

 You can find option enable_showrouter into `config/chouhai2018/showrouter.php` and simply make it false while in production environment directly or via your .env file.

##  Track Api calls count

By the time, our project grows with lots of routes and api endpoints. And it's really difficult to figure out which routes are most used or used or not used at all.

 In some cases, we also want to know, which routes are frequently called and we want to cache those data. Other lots of real life practical problems and use cases can be there with our routes.

 To start tracking api calls, you need to perform following steps:

## Publish Migration

Run the following command to publish migration,

```
 php artisan vendor:publish --tag=migrations
```

 It will publish migration file into database/migrations.

 

## Migrate database

Migrate your database by,

```
 php artisan migrate
```

 It will create one new table in database called api_calls_count.

##  Change Configuration file

Change config file config/chouhai2018/showrouter.php & Make collections.api_calls_count => true.

 That's all. Checkout your routes and one new column count will be added into datatable.

 

 

 
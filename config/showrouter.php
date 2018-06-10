<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Enable Routes Explorer route
    |--------------------------------------------------------------------------
    |
    | Make sure, either you protect this route by overriding it with some middleware
    | or make it false in production environment
    |
    */

    'showrouter' => true,

    /*
    |--------------------------------------------------------------------------
    | Routes Explorer route
    |--------------------------------------------------------------------------
    |
    | On this url, routes explorer will be displayed
    |
    */

    'route' => 'showrouter',

    /*
    |--------------------------------------------------------------------------
    | Routes Explorer view file name
    |--------------------------------------------------------------------------
    |
    | this view file will be used to display a view
    |
    */

    'view' => 'chouhai2018::showrouter',

    /*
    |--------------------------------------------------------------------------
    | Data Collectors
    |--------------------------------------------------------------------------
    |
    | Various data collectors to collect data
    |
    */

    'collections' => [

        // collect api calls count
        'api_calls_count' => false,
        'zhcn' =>  false,

    ]
];
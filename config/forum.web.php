<?php

return [

    'enable' => true,

    /*
    |--------------------------------------------------------------------------
    | Router
    |--------------------------------------------------------------------------
    |
    | Web router config.
    |
    */

    'router' => [
        'prefix' => '/forum',
        'as' => 'forum.',
        'namespace' => '\TeamTeaTime\Forum\Http\Controllers\Web',
        'middleware' => ['web'],
        'auth_middleware' => ['auth'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Route Prefixes
    |--------------------------------------------------------------------------
    |
    | Prefixes to use for each model.
    |
    */

    'route_prefixes' => [
        'category' => 'c',
        'thread' => 't',
        'post' => 'p',
    ],


    'default_category_color' => '#007bff',

    'utility_class' => TeamTeaTime\Forum\Support\Web\Forum::class,

];

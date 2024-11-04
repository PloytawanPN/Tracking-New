<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Cache Store
    |--------------------------------------------------------------------------
    |
    | This option controls the default cache store that will be used by the
    | framework. This connection is utilized if another isn't explicitly
    | specified when running a cache operation inside the application.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Cache Stores
    |--------------------------------------------------------------------------
    |
    | Here you may define all of the cache "stores" for your application as
    | well as their drivers. You may even define multiple stores for the
    | same cache driver to group types of items stored in your caches.
    |
    | Supported drivers: "array", "database", "file", "memcached",
    |                    "redis", "dynamodb", "octane", "null"
    |
    */

    'stores' => [

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'connection' => env('DB_CACHE_CONNECTION'),
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION'),
            'lock_table' => env('DB_CACHE_LOCK_TABLE'),
        ],

        'file' => [
            'driver' => 'file',
            'path' => storage_path('framework/cache/data'),
            'lock_path' => storage_path('framework/cache/data'),
        ],

        'memcached' => [
            'driver' => 'memcached',
            'persistent_id' => env('MEMCACHED_PERSISTENT_ID'),
            'sasl' => [
                env('MEMCACHED_USERNAME'),
                env('MEMCACHED_PASSWORD'),
            ],
            'options' => [
                // Memcached::OPT_CONNECT_TIMEOUT => 2000,
            ],
            'servers' => [
                [
                    'host' => env('MEMCACHED_HOST', '127.0.0.1'),
                    'port' => env('MEMCACHED_PORT', 11211),
                    'weight' => 100,
                ],
            ],
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => env('REDIS_CACHE_CONNECTION', 'cache'),
            'lock_connection' => env('REDIS_CACHE_LOCK_CONNECTION', 'default'),
        ],

        'dynamodb' => [
            'driver' => 'dynamodb',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
            'table' => env('DYNAMODB_CACHE_TABLE', 'cache'),
            'endpoint' => env('DYNAMODB_ENDPOINT'),
        ],

        'octane' => [
            'driver' => 'octane',
        ],

    ],

    'Active-Status' => [
        0 => ['name'=> 'Inactive'],
        1 => ['name'=> 'Active'],
    ],
    'Export-Status' => [
        0 => ['name'=> 'Inactive'],
        1 => ['name'=> 'Active'],
    ],
    'Sold-Status' => [
        0 => ['name'=> 'Not Sold'],
        1 => ['name'=> 'Sold'],
    ],
    'Produce-Status'=> [
        0 => ['name'=> 'Inactive'],
        1 => ['name'=> 'Active'],
    ],
    'Payment-Status' => [
        0 => ['name'=> 'Pending Payment'],
        1 => ['name'=> 'Paid'],
    ],
    'Shipping-Company' => [
        'kerry' => ['name'=> 'Kerry Express','code'=>'kerry'],
        'flash' => ['name'=> 'Flash Express','code'=>'flash'],
        'nex' => ['name'=> 'Nex Logistics','code'=>'nex'],
        'thai_post' => ['name'=> 'Thailand Post','code'=>'thai_post'],
        'dhl' => ['name'=> 'DHL','code'=>'dhl'],
        'ups' => ['name'=> 'UPS','code'=>'ups'],
        'grab' => ['name'=> 'Grab Express','code'=>'grab'],
        'lineman' => ['name'=> 'Lineman','code'=>'lineman'],
        'scg' => ['name'=> 'SCG Logistics','code'=>'scg'],
        'tnt' => ['name'=> 'TNT','code'=>'tnt'],
        'rabbit' => ['name'=> 'Rabbit Line Pay','code'=>'rabbit'],
    ],
    'Status' => [
        0 => ['name'=> 'Inactive'],
        1 => ['name'=> 'Active'],
    ],
    'Payment-Method' => [
        1 => ['name'=> 'Cash'],
        2 => ['name'=> 'Credit Card'],
        3 => ['name'=> 'Bank Transfer'],
    ],


    /*
    |--------------------------------------------------------------------------
    | Cache Key Prefix
    |--------------------------------------------------------------------------
    |
    | When utilizing the APC, database, memcached, Redis, and DynamoDB cache
    | stores, there might be other applications using the same cache. For
    | that reason, you may prefix every cache key to avoid collisions.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_cache_'),

];

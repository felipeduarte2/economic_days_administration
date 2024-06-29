<?php

use Illuminate\Support\Str;

return [

    /*
    |------------------------------------------------- -------------------------
    | Almacén de caché predeterminado
    |------------------------------------------------- -------------------------
    |
    | Esta opción controla el almacén de caché predeterminado que utilizará el
    | estructura. Esta conexión se utiliza si otra no está explícitamente
    | especificado al ejecutar una operación de caché dentro de la aplicación.
    |
    */

    'default' => env('CACHE_STORE', 'database'),

    /*
    |------------------------------------------------- -------------------------
    | Almacenes de caché
    |------------------------------------------------- -------------------------
    |
    | Aquí puede definir todos los "almacenes" de caché para su aplicación como
    | así como sus conductores. Incluso puedes definir varias tiendas para el
    | mismo controlador de caché para agrupar tipos de elementos almacenados en sus cachés.
    |
    | Controladores compatibles: "apc", "array", "database", "file", "memcached",
    | "redis", "dynamodb", "octano", "nulo"
    |
    */

    'stores' => [

        'array' => [
            'driver' => 'array',
            'serialize' => false,
        ],

        'database' => [
            'driver' => 'database',
            'table' => env('DB_CACHE_TABLE', 'cache'),
            'connection' => env('DB_CACHE_CONNECTION', null),
            'lock_connection' => env('DB_CACHE_LOCK_CONNECTION', null),
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

    /*
    |------------------------------------------------- -------------------------
    | Prefijo de clave de caché
    |------------------------------------------------- -------------------------
    |
    | Cuando se utiliza la caché de APC, base de datos, memcached, Redis y DynamoDB
    | tiendas, puede haber otras aplicaciones usando el mismo caché. Para
    | Por esa razón, puede anteponer cada clave de caché para evitar colisiones.
    |
    */

    'prefix' => env('CACHE_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_cache_'),

];

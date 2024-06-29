<?php

return [

    /*
    |------------------------------------------------- -------------------------
    | Disco del sistema de archivos predeterminado
    |------------------------------------------------- -------------------------
    |
    | Aquí puede especificar el disco del sistema de archivos predeterminado que debe usarse
    | por el marco. El disco "local", así como una variedad de nube.
    | Los discos basados ​​​​están disponibles para su aplicación para el almacenamiento de archivos.
    |
    */

    'default' => env('FILESYSTEM_DISK', 'local'),

        /*
    |------------------------------------------------- -------------------------
    | Discos del sistema de archivos
    |------------------------------------------------- -------------------------
    |
    | A continuación puede configurar tantos discos del sistema de archivos como sea necesario y
    | Incluso puede configurar varios discos para el mismo controlador. Ejemplos para
    | La mayoría de los controladores de almacenamiento compatibles se configuran aquí como referencia.
    |
    | Controladores compatibles: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
            'throw' => false,
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
            'throw' => false,
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'use_path_style_endpoint' => env('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw' => false,
        ],

    ],

    /*
    |------------------------------------------------- -------------------------
    | Enlaces simbólicos
    |------------------------------------------------- -------------------------
    |
    | Aquí podrá configurar los enlaces simbólicos que se crearán cuando el
    | `storage:link` Se ejecuta el comando Artisan. Las claves de la matriz deben ser
    | las ubicaciones de los enlaces y los valores deben ser sus objetivos.
    |
    */

    'links' => [
        public_path('storage') => storage_path('app/public'),
    ],

];

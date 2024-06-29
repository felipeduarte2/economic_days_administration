<?php

return [

    /*
    |------------------------------------------------- -------------------------
    | Servicios de terceros
    |------------------------------------------------- -------------------------
    |
    | Este archivo sirve para almacenar las credenciales de servicios de terceros, como
    | como Mailgun, Postmark, AWS y más. Este archivo proporciona de facto
    | ubicación para este tipo de información, permitiendo que los paquetes tengan
    | un archivo convencional para localizar las distintas credenciales de servicio.
    |
    */
    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];

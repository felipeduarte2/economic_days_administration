<?php

return [

    /*
    |------------------------------------------------- -------------------------
    | Correo predeterminado
    |------------------------------------------------- -------------------------
    |
    | Esta opción controla el correo predeterminado que se utiliza para enviar todos los correos electrónicos.
    | mensajes a menos que se especifique explícitamente otro remitente al enviar
    | el mensaje. Todos los correos adicionales se pueden configurar dentro del
    | matriz de "envíos publicitarios". Se proporcionan ejemplos de cada tipo de envío publicitario.
    |
    */

    'default' => env('MAIL_MAILER', 'log'),

    /*
    |------------------------------------------------- -------------------------
    | Configuraciones de correo
    |------------------------------------------------- -------------------------
    |
    | Aquí puede configurar todos los correos utilizados por su aplicación más
    | sus respectivas configuraciones. Se han configurado varios ejemplos para
    | usted y usted son libres de agregar el suyo propio según lo requiera su aplicación.
    |
    | Laravel admite una variedad de controladores de "transporte" de correo que se pueden utilizar
    | al entregar un correo electrónico. Puedes especificar cuál estás usando
    | sus anuncios publicitarios a continuación. También puede agregar anuncios publicitarios adicionales si es necesario.
    |
    | Compatible con: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    | "matasellos", "registro", "matriz", "conmutación por error", "roundrobin"
    |
    */

    'mailers' => [

        'smtp' => [
            'transport' => 'smtp',
            'url' => env('MAIL_URL'),
            'host' => env('MAIL_HOST', '127.0.0.1'),
            'port' => env('MAIL_PORT', 2525),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => env('MAIL_USERNAME'),
            'password' => env('MAIL_PASSWORD'),
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN'),
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

    ],

    /*
    |------------------------------------------------- -------------------------
    | Dirección global "De"
    |------------------------------------------------- -------------------------
    |
    | Es posible que desee que todos los correos electrónicos enviados por su aplicación se envíen desde
    | la misma dirección. Aquí puede especificar un nombre y una dirección que sea
    | Se utiliza globalmente para todos los correos electrónicos que envía su aplicación.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

];

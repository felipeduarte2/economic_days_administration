<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nombre de la aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor es el nombre de su aplicación, que se utilizará cuando el
    | framework necesita colocar el nombre de la aplicación en una notificación o
    | otros elementos de la interfaz de usuario donde es necesario mostrar el nombre de una aplicación.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |------------------------------------------------- -------------------------
    | Entorno de aplicación
    |------------------------------------------------- -------------------------
    |
    | Este valor determina el "entorno" en el que se encuentra actualmente su aplicación.
    | ejecutándose. Esto puede determinar cómo prefiere configurar varios
    | servicios que utiliza la aplicación. Configure esto en su archivo ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |------------------------------------------------- -------------------------
    | Modo de depuración de aplicaciones
    |------------------------------------------------- -------------------------
    |
    | Cuando su aplicación está en modo de depuración, aparecen mensajes de error detallados con
    | Los seguimientos de la pila se mostrarán en cada error que ocurra dentro de su
    | solicitud. Si está deshabilitado, se muestra una página de error genérica simple.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |------------------------------------------------- -------------------------
    | URL de la aplicación
    |------------------------------------------------- -------------------------
    |
    | La consola utiliza esta URL para generar URL correctamente cuando se utiliza
    | la herramienta de línea de comando Artisan. Deberías configurar esto en la raíz de
    | la aplicación para que esté disponible dentro de los comandos de Artisan.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |------------------------------------------------- -------------------------
    | Zona horaria de la aplicación
    |------------------------------------------------- -------------------------
    |
    | Aquí puede especificar la zona horaria predeterminada para su aplicación, que
    | será utilizado por las funciones de fecha y hora de PHP. La zona horaria
    | está configurado en "UTC" de forma predeterminada, ya que es adecuado para la mayoría de los casos de uso.
    |
    */

    'timezone' => env('APP_TIMEZONE', 'UTC'),

    /*
    |------------------------------------------------- -------------------------
    | Configuración regional de la aplicación
    |------------------------------------------------- -------------------------
    |
    | La configuración regional de la aplicación determina la configuración regional predeterminada que se utilizará.
    | por los métodos de traducción/localización de Laravel. Esta opción puede ser
    | configúrelo en cualquier configuración regional para la que planee tener cadenas de traducción.
    |
    */

    'locale' => env('APP_LOCALE', 'es'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'es'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'en_US'),

    /*
    |------------------------------------------------- -------------------------
    | Clave de encriptación
    |------------------------------------------------- -------------------------
    |
    | Esta clave es utilizada por los servicios de cifrado de Laravel y debe configurarse
    | a una cadena aleatoria de 32 caracteres para garantizar que todos los valores cifrados
    | son seguros. Debe hacer esto antes de implementar la aplicación.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |------------------------------------------------- -------------------------
    | Controlador del modo de mantenimiento
    |------------------------------------------------- -------------------------
    |
    | Estas opciones de configuración determinan el controlador utilizado para determinar y
    | gestionar el estado del "modo de mantenimiento" de Laravel. El controlador de "caché"
    | Permite controlar el modo de mantenimiento en varias máquinas.
    |
    | Controladores compatibles: "archivo", "caché"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];

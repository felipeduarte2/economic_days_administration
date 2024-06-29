<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Driver predeterminado de Sesión
    |--------------------------------------------------------------------------
    |
    | Esta opción determina el driver de sesión que se utiliza para las peticiones
    | entrantes. Laravel soporta una variedad de opciones de almacenamiento para
    | persistir los datos de sesión. El almacenamiento en base de datos es una
    | buena opción predeterminada.
    |
    | Soportado: "file", "cookie", "database", "apc",
    |            "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'database'),

    /*
    |--------------------------------------------------------------------------
    | Tiempo de vida de la Sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar el número de minutos que deseas que la sesión
    | permanezca inactiva antes de que expire. Si deseas que expire
    | inmediatamente cuando se cierra el navegador puedes indicarlo
    | a través de la opción expire_on_close.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => env('SESSION_EXPIRE_ON_CLOSE', false),

    /*
    |--------------------------------------------------------------------------
    | Cifrado de Sesión
    |--------------------------------------------------------------------------
    |
    | Esta opción te permite especificar con facilidad que todos los datos de
    | sesión se cifren antes de ser almacenados. Todo el cifrado es
    | realizado automáticamente por Laravel y puedes utilizar la sesión
    | de la misma manera.
    |
    */

    'encrypt' => env('SESSION_ENCRYPT', false),

    /*
    |--------------------------------------------------------------------------
    | Ubicación del archivo de Sesión
    |--------------------------------------------------------------------------
    |
    | Cuando se utiliza el driver "file" para almacenar las sesiones,
    | los archivos son almacenados en disco. La ubicación por defecto está
    | definida aquí; sin embargo, puedes proporcionar otra ubicación donde
    | deben ser almacenados.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Conexión de la Base de Datos para la Sesión
    |--------------------------------------------------------------------------
    |
    | Al utilizar los drivers "database" o "redis" para almacenar las sesiones,
    | puedes especificar la conexión que se utilizará para administrar estas
    | sesiones. Esta conexión debe corresponder a una opción definida en
    | tu configuración de la base de datos.
    |
    */

    'connection' => env('SESSION_CONNECTION'),

    /*
    |--------------------------------------------------------------------------
    | Tabla de la Base de Datos para la Sesión
    |--------------------------------------------------------------------------
    |
    | Al utilizar el driver "database" para almacenar las sesiones, puedes
    | especificar la tabla que se utilizará para almacenar los datos de sesión.
    | Por supuesto, se define una opción predeterminada para ti; sin embargo,
    | eres libre de cambiar esto a otra tabla.
    |
    */

    'table' => env('SESSION_TABLE', 'sessions'),

    /*
    |--------------------------------------------------------------------------
    | Almacén de Caché para la Sesión
    |--------------------------------------------------------------------------
    |
    | Cuando se utiliza uno de los backends de sesión basados en caché de
    | Laravel, puedes especificar el almacén de caché que se utilizará para
    | almacenar los datos de sesión entre las peticiones. Este debe
    | coincidir con uno de tus almacenes de caché definidos.
    |
    | Afecta: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE'),

    /*
    |--------------------------------------------------------------------------
    | Lotería de Limpieza de Sesión
    |--------------------------------------------------------------------------
    |
    | Algunos controladores de sesión basados en caché deben recorrer su
    | ubicación de almacenamiento para eliminar sesiones antiguas del
    | almacenamiento. Aquí se especifican las probabilidades de que esto
    | ocurra en cada petición. De forma predeterminada, las probabilidades
    | son 2 de cada 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Nombre de la Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | Aquí puedes cambiar el nombre de la cookie que crea el framework para
    | almacenar la sesión. Por lo general, no es necesario cambiar este
    | valor ya que no aporta una mejor seguridad.
    |
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Ruta de la Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | La ruta de la cookie de sesión determina la ruta para la cual se
    | considerará que la cookie está disponible. Por lo general, esto será
    | la ruta raíz de tu aplicación, pero puedes cambiarlo cuando sea
    | necesario.
    |
    */

    'path' => env('SESSION_PATH', '/'),

    /*
    |--------------------------------------------------------------------------
    | Dominio de la Cookie de Sesión
    |--------------------------------------------------------------------------
    |
    | Este valor determina el dominio y los subdominios para los que la
    | cookie de sesión está disponible. Por defecto, la cookie será
    | disponible para el dominio raíz y todos sus subdominios.
    |
    |
    */

    'domain' => env('SESSION_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Solo HTTPS Cookies
    |--------------------------------------------------------------------------
    |
    | Si estableces esta opción en true, las cookies de sesión solo se
    | enviarán de vuelta al servidor si el navegador tiene una conexión
    | HTTPS. Esto evitará que la cookie sea enviada cuando no se pueda
    | hacer de forma segura.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE'),

    /*
    |--------------------------------------------------------------------------
    | Acceso HTTP Solo
    |--------------------------------------------------------------------------
    |
    | Si estableces esta opción en true, JavaScript no podrá acceder al
    | valor de la cookie y la cookie solo será accesible mediante el
    | protocolo HTTP. Es poco probable que debas deshabilitar esta opción.
    |
    */

    'http_only' => env('SESSION_HTTP_ONLY', true),

    /*
    |--------------------------------------------------------------------------
    | Cookies de Mismo Sitio
    |--------------------------------------------------------------------------
    |
    | Esta opción determina cómo se comportan tus cookies en cuanto a cómo
    | se manejan las solicitudes entre sitios. Puede usarse para mitigar
    | ataques CSRF. Por defecto, se establecerá en "lax" para permitir
    | solicitudes seguras entre sitios.
    |
    | Consulta: https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Set-Cookie#samesitesamesite-value
    |
    | Compatible: "lax", "strict", "none", null
    |
    */

    'same_site' => env('SESSION_SAME_SITE', 'lax'),

    /*
    |--------------------------------------------------------------------------
    | Cookies Particionadas
    |--------------------------------------------------------------------------
    |
    | Si estableces esta opción en true, la cookie se vinculará al sitio
    | de nivel superior para contextos entre sitios. Las cookies particionadas
    | son aceptadas por el navegador cuando se marcan como "secure" y el
    | atributo Same-Site está configurado como "none".
    |
    */

    'partitioned' => env('SESSION_PARTITIONED_COOKIE', false),

];

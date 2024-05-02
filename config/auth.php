<?php

return [

    /*
     |------------------------------------------------- -------------------------
     | Valores predeterminados de autenticación
     |------------------------------------------------- -------------------------
     |
     | Esta opción define la "protección" y la contraseña de autenticación predeterminadas.
     | restablecer el "broker" para su aplicación. Puedes cambiar estos valores.
     | según sea necesario, pero son un comienzo perfecto para la mayoría de las aplicaciones.
     |
     */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
     |------------------------------------------------- -------------------------
     | Guardias de autenticación
     |------------------------------------------------- -------------------------
     |
     | A continuación, puede definir cada protección de autenticación para su aplicación.
     | Por supuesto, se ha definido una excelente configuración predeterminada para usted.
     | que utiliza almacenamiento de sesión más el proveedor de usuario Eloquent.
     |
     | Todos los guardias de autenticación tienen un proveedor de usuario, que define cómo
     | los usuarios en realidad se recuperan de su base de datos u otro almacenamiento
     | sistema utilizado por la aplicación. Normalmente se utiliza Eloquent.
     |
     | Soportado: "sesión"
     |
     */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
     |------------------------------------------------- -------------------------
     | Proveedores de usuarios
     |------------------------------------------------- -------------------------
     |
     | Todos los guardias de autenticación tienen un proveedor de usuario, que define cómo
     | los usuarios en realidad se recuperan de su base de datos u otro almacenamiento
     | sistema utilizado por la aplicación. Normalmente se utiliza Eloquent.
     |
     | Si tiene varias tablas de usuarios o modelos, puede configurar varias
     | proveedores para representar el modelo/tabla. Estos proveedores pueden entonces
     | se asignará a cualquier guardia de autenticación adicional que haya definido.
     |
     | Compatible: "base de datos", "elocuente"
     |
     */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
     |------------------------------------------------- -------------------------
     | Restablecer contraseñas
     |------------------------------------------------- -------------------------
     |
     | Estas opciones de configuración especifican el comportamiento de la contraseña de Laravel.
     | funcionalidad de reinicio, incluida la tabla utilizada para el almacenamiento de tokens
     | y el proveedor de usuarios que se invoca para recuperar usuarios.
     |
     | El tiempo de vencimiento es la cantidad de minutos que durará cada token de reinicio.
     | considerado válido. Esta característica de seguridad hace que los tokens tengan una vida corta, por lo que
     | tienen menos tiempo para ser adivinados. Puede cambiar esto según sea necesario.
     |
     | La configuración del acelerador es la cantidad de segundos que un usuario debe esperar antes de
     | generando más tokens de restablecimiento de contraseña. Esto evita que el usuario
     | generando rápidamente una gran cantidad de tokens de restablecimiento de contraseña.
     |
     */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
     |------------------------------------------------- -------------------------
     | Tiempo de espera de confirmación de contraseña
     |------------------------------------------------- -------------------------
     |
     | Aquí puede definir la cantidad de segundos antes de la confirmación de la contraseña.
     | La ventana caduca y se solicita a los usuarios que vuelvan a ingresar su contraseña a través del
     | pantalla de confirmación. De forma predeterminada, el tiempo de espera dura tres horas.
     |
     */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];

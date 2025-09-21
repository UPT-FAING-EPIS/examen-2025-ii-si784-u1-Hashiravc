<?php

return [

    'defaults' => [
        'guard' => 'api',      // Cambiar a 'api'
        'passwords' => 'usuarios',
    ],

'guards' => [
    'web' => [
        'driver' => 'session',
        'provider' => 'usuarios',
    ],

    'api' => [
        'driver' => 'jwt',
        'provider' => 'usuarios',
        'hash' => false,
    ],
],
'providers' => [
    'usuarios' => [
        'driver' => 'eloquent',
        'model' => App\Models\Usuario::class,
    ],
],


    'passwords' => [
        'usuarios' => [
            'provider' => 'usuarios',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];

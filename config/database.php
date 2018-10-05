<?php
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
return [

    'default' => env('DB_CONNECTION', 'mysql'),

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', $url["host"]),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE',  substr($url["path"], 1)),
            'username' => env('DB_USERNAME', $url["user"]),
            'password' => env('DB_PASSWORD', $url["pass"]),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],
    ],

    'migrations' => 'migrations',

];
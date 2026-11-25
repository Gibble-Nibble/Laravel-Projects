<?php

use Illuminate\Support\Str;
use Pdo\Mysql;

$tsa3Driver = env('DB_TSA3_CONNECTION', env('DB_CONNECTION', 'sqlite'));
$tfa8Driver = env('DB_TFA8_CONNECTION', env('DB_CONNECTION', 'sqlite'));
$tsa4Driver = env('DB_TSA4_CONNECTION', env('DB_CONNECTION', 'sqlite'));

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for database operations. This is
    | the connection which will be utilized unless another connection
    | is explicitly specified when you execute a query / statement.
    |
    */

    'default' => env('DB_CONNECTION', 'sqlite'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Below are all of the database connections defined for your application.
    | An example configuration is provided for each database system which
    | is supported by Laravel. You're free to add / remove connections.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
            'transaction_mode' => 'DEFERRED',
        ],

        'tsa3' => [
            'driver' => $tsa3Driver,
            'url' => env('DB_TSA3_URL'),
            'database' => env(
                'DB_TSA3_DATABASE',
                $tsa3Driver === 'sqlite' ? database_path('tsa3.sqlite') : 'laravel_pos_tsa3',
            ),
            'host' => env('DB_TSA3_HOST', env('DB_HOST', '127.0.0.1')),
            'port' => env('DB_TSA3_PORT', env('DB_PORT', '3306')),
            'username' => env('DB_TSA3_USERNAME', env('DB_USERNAME', 'root')),
            'password' => env('DB_TSA3_PASSWORD', env('DB_PASSWORD', '')),
            'unix_socket' => env('DB_TSA3_SOCKET', env('DB_SOCKET', '')),
            'charset' => env('DB_TSA3_CHARSET', env('DB_CHARSET', 'utf8mb4')),
            'collation' => env('DB_TSA3_COLLATION', env('DB_COLLATION', 'utf8mb4_unicode_ci')),
            'prefix' => '',
            'prefix_indexes' => true,
            'foreign_key_constraints' => env('DB_TSA3_FOREIGN_KEYS', true),
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                Mysql::ATTR_SSL_CA => env('DB_TSA3_SSL_CA', env('MYSQL_ATTR_SSL_CA')),
            ]) : [],
        ],

        'tfa8' => [
            'driver' => $tfa8Driver,
            'url' => env('DB_TFA8_URL'),
            'database' => env(
                'DB_TFA8_DATABASE',
                $tfa8Driver === 'sqlite' ? database_path('tfa8.sqlite') : 'laravel_pos_tfa8',
            ),
            'host' => env('DB_TFA8_HOST', env('DB_HOST', '127.0.0.1')),
            'port' => env('DB_TFA8_PORT', env('DB_PORT', '3306')),
            'username' => env('DB_TFA8_USERNAME', env('DB_USERNAME', 'root')),
            'password' => env('DB_TFA8_PASSWORD', env('DB_PASSWORD', '')),
            'unix_socket' => env('DB_TFA8_SOCKET', env('DB_SOCKET', '')),
            'charset' => env('DB_TFA8_CHARSET', env('DB_CHARSET', 'utf8mb4')),
            'collation' => env('DB_TFA8_COLLATION', env('DB_COLLATION', 'utf8mb4_unicode_ci')),
            'prefix' => '',
            'prefix_indexes' => true,
            'foreign_key_constraints' => env('DB_TFA8_FOREIGN_KEYS', true),
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                Mysql::ATTR_SSL_CA => env('DB_TFA8_SSL_CA', env('MYSQL_ATTR_SSL_CA')),
            ]) : [],
        ],

        'tsa4' => [
            'driver' => $tsa4Driver,
            'url' => env('DB_TSA4_URL'),
            'database' => env(
                'DB_TSA4_DATABASE',
                $tsa4Driver === 'sqlite' ? database_path('tsa4.sqlite') : 'laravel_tsa4',
            ),
            'host' => env('DB_TSA4_HOST', env('DB_HOST', '127.0.0.1')),
            'port' => env('DB_TSA4_PORT', env('DB_PORT', '3306')),
            'username' => env('DB_TSA4_USERNAME', env('DB_USERNAME', 'root')),
            'password' => env('DB_TSA4_PASSWORD', env('DB_PASSWORD', '')),
            'unix_socket' => env('DB_TSA4_SOCKET', env('DB_SOCKET', '')),
            'charset' => env('DB_TSA4_CHARSET', env('DB_CHARSET', 'utf8mb4')),
            'collation' => env('DB_TSA4_COLLATION', env('DB_COLLATION', 'utf8mb4_unicode_ci')),
            'prefix' => '',
            'prefix_indexes' => true,
            'foreign_key_constraints' => env('DB_TSA4_FOREIGN_KEYS', true),
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                Mysql::ATTR_SSL_CA => env('DB_TSA4_SSL_CA', env('MYSQL_ATTR_SSL_CA')),
            ]) : [],
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                Mysql::ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'mariadb' => [
            'driver' => 'mariadb',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => env('DB_CHARSET', 'utf8mb4'),
            'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                Mysql::ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            'search_path' => 'public',
            'sslmode' => env('DB_SSLMODE', 'prefer'),
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DB_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'laravel'),
            'username' => env('DB_USERNAME', 'root'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => env('DB_CHARSET', 'utf8'),
            'prefix' => '',
            'prefix_indexes' => true,
            // 'encrypt' => env('DB_ENCRYPT', 'yes'),
            // 'trust_server_certificate' => env('DB_TRUST_SERVER_CERTIFICATE', 'false'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run on the database.
    |
    */

    'migrations' => [
        'table' => 'migrations',
        'update_date_on_publish' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as Memcached. You may define your connection settings here.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug((string) env('APP_NAME', 'laravel')).'-database-'),
            'persistent' => env('REDIS_PERSISTENT', false),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
            'max_retries' => env('REDIS_MAX_RETRIES', 3),
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'),
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100),
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
            'max_retries' => env('REDIS_MAX_RETRIES', 3),
            'backoff_algorithm' => env('REDIS_BACKOFF_ALGORITHM', 'decorrelated_jitter'),
            'backoff_base' => env('REDIS_BACKOFF_BASE', 100),
            'backoff_cap' => env('REDIS_BACKOFF_CAP', 1000),
        ],

    ],

];

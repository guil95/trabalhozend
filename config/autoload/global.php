<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'cache' => [
        'adapter' => [
                'name' => 'apc',
                'options' => ['ttl' => 3600],
            ],
        'plugins' => [
                'exception_handler' => ['throw_exceptions' => false],
                'serializer',
            ],
    ],
    'service_manager' => [
        'factories' => [
            Application\Model\BeerTableGateway::class =>  Application\Factory\BeerTableGateway::class,
            Application\Factory\DbAdapter::class => Application\Factory\DbAdapter::class,
            Application\Factory\Db\Adapter\Adapter::class => Application\Factory\Db\Adapter\Adapter::class,
            Application\Model\Beer\TableGateway::class => Application\Factory\Model\Beer\TableGateway::class,
            Application\Service\Auth::class => Application\Factory\Service\Auth::class,
            'Application\Service\Cache' => Application\Factory\Service\Cache::class,
        ],
        'alias' => [
            'DB' => Application\Factory\DbAdapter::class,
        ],
    ],
    'db' => [
        'driver' => 'Pdo_Sqlite',
        'database' => 'data/beers.db',
    ],
];

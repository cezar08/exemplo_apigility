<?php
return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'dummy' => [],
        ],
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOPgSql\Driver::class,
                'params' => [
                    'host' => 'crs.unochapeco.edu.br',
                    'port' => '5432',
                    'user' => 'sis',
                    'password' => 'Xpc04$10pos',
                    'dbname' => 'db_crs_api',
                ],
            ],
        ],
    ],
    'router' => [
        'routes' => [
            'oauth' => [
                'options' => [
                    'spec' => '%oauth%',
                    'regex' => '(?P<oauth>(/oauth))',
                ],
                'type' => 'regex',
            ],
        ],
    ],
];

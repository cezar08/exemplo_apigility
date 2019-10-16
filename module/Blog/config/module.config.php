<?php

namespace Blog;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'doctrine' => [
        'driver' => [
            'blog_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    'Blog\Entity' => 'blog_entities'
                ]
            ]
        ]
    ],
    'service_manager' => [
        'factories' => [
            'PostService' => function ($sm) {
                $em = $sm->get('Doctrine\ORM\EntityManager');

                return new \Blog\Service\PostService($em);
            }
        ]
    ]
];

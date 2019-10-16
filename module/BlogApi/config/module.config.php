<?php
return [
    'service_manager' => [
        'factories' => [
            \BlogApi\V1\Rest\Users\UsersResource::class => \BlogApi\V1\Rest\Users\UsersResourceFactory::class,
            \BlogApi\V1\Rest\Posts\PostsResource::class => \BlogApi\V1\Rest\Posts\PostsResourceFactory::class,
            \BlogApi\V1\Rest\Categories\CategoriesResource::class => \BlogApi\V1\Rest\Categories\CategoriesResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'blog-api.rest.users' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/users[/:users_id]',
                    'defaults' => [
                        'controller' => 'BlogApi\\V1\\Rest\\Users\\Controller',
                    ],
                ],
            ],
            'blog-api.rest.posts' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/posts[/:posts_id]',
                    'defaults' => [
                        'controller' => 'BlogApi\\V1\\Rest\\Posts\\Controller',
                    ],
                ],
            ],
            'blog-api.rest.categories' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/categories[/:categories_id]',
                    'defaults' => [
                        'controller' => 'BlogApi\\V1\\Rest\\Categories\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'blog-api.rest.users',
            1 => 'blog-api.rest.posts',
            2 => 'blog-api.rest.categories',
        ],
    ],
    'zf-rest' => [
        'BlogApi\\V1\\Rest\\Users\\Controller' => [
            'listener' => \BlogApi\V1\Rest\Users\UsersResource::class,
            'route_name' => 'blog-api.rest.users',
            'route_identifier_name' => 'users_id',
            'collection_name' => 'users',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
                2 => 'DELETE',
                3 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \BlogApi\V1\Rest\Users\UsersEntity::class,
            'collection_class' => \BlogApi\V1\Rest\Users\UsersCollection::class,
            'service_name' => 'Users',
        ],
        'BlogApi\\V1\\Rest\\Posts\\Controller' => [
            'listener' => \BlogApi\V1\Rest\Posts\PostsResource::class,
            'route_name' => 'blog-api.rest.posts',
            'route_identifier_name' => 'posts_id',
            'collection_name' => 'posts',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \BlogApi\V1\Rest\Posts\PostsEntity::class,
            'collection_class' => \BlogApi\V1\Rest\Posts\PostsCollection::class,
            'service_name' => 'Posts',
        ],
        'BlogApi\\V1\\Rest\\Categories\\Controller' => [
            'listener' => \BlogApi\V1\Rest\Categories\CategoriesResource::class,
            'route_name' => 'blog-api.rest.categories',
            'route_identifier_name' => 'categories_id',
            'collection_name' => 'categories',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \BlogApi\V1\Rest\Categories\CategoriesEntity::class,
            'collection_class' => \BlogApi\V1\Rest\Categories\CategoriesCollection::class,
            'service_name' => 'Categories',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'BlogApi\\V1\\Rest\\Users\\Controller' => 'Json',
            'BlogApi\\V1\\Rest\\Posts\\Controller' => 'Json',
            'BlogApi\\V1\\Rest\\Categories\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'BlogApi\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'BlogApi\\V1\\Rest\\Posts\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'BlogApi\\V1\\Rest\\Categories\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'BlogApi\\V1\\Rest\\Users\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/json',
            ],
            'BlogApi\\V1\\Rest\\Posts\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/json',
            ],
            'BlogApi\\V1\\Rest\\Categories\\Controller' => [
                0 => 'application/vnd.blog-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \BlogApi\V1\Rest\Users\UsersEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.users',
                'route_identifier_name' => 'users_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \BlogApi\V1\Rest\Users\UsersCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.users',
                'route_identifier_name' => 'users_id',
                'is_collection' => true,
            ],
            \BlogApi\V1\Rest\Posts\PostsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.posts',
                'route_identifier_name' => 'posts_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \BlogApi\V1\Rest\Posts\PostsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.posts',
                'route_identifier_name' => 'posts_id',
                'is_collection' => true,
            ],
            \BlogApi\V1\Rest\Categories\CategoriesEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.categories',
                'route_identifier_name' => 'categories_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \BlogApi\V1\Rest\Categories\CategoriesCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'blog-api.rest.categories',
                'route_identifier_name' => 'categories_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'BlogApi\\V1\\Rest\\Users\\Controller' => [
            'input_filter' => 'BlogApi\\V1\\Rest\\Users\\Validator',
        ],
        'BlogApi\\V1\\Rest\\Posts\\Controller' => [
            'input_filter' => 'BlogApi\\V1\\Rest\\Posts\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'BlogApi\\V1\\Rest\\Users\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\ToInt::class,
                        'options' => [],
                    ],
                ],
                'name' => 'id',
                'description' => 'primary key',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '3',
                            'max' => '255',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'login',
            ],
            2 => [
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'min' => '8',
                        ],
                    ],
                ],
                'filters' => [],
                'name' => 'senha',
            ],
            3 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'perfil',
            ],
        ],
        'BlogApi\\V1\\Rest\\Posts\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\ToInt::class,
                        'options' => [],
                    ],
                ],
                'name' => 'id',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'title',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'description',
            ],
            3 => [
                'required' => true,
                'validators' => [],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                ],
                'name' => 'text',
            ],
            4 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => \Zend\I18n\Validator\IsInt::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'id_user',
            ],
            5 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'categories',
            ],
        ],
    ],
];

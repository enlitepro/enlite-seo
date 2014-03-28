<?php


namespace EnliteSeo;

return array(

    // Doctrine config
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        ),
        'configuration' => array(
            'orm_default' => array(
                'string_functions' => [
                    'REGEXP' => 'EnliteSeo\Doctrine\Query\Mysql\Regexp',
                ],
            )
        ),
    ),
//    'view_manager' => array(
//        'template_path_stack' => array(
//            __DIR__ . '/../view',
//        ),
//    ),
);
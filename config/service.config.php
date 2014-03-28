<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'EnliteSeoService' => 'EnliteSeo\Service\SeoServiceFactory',
            'EnliteSeoGlobalOptions' => 'EnliteSeo\Options\GlobalOptionsFactory'
        ),
        'invokables' => array(
            
        )
    ),
    'controllers' => array(
        'factories' => array(
            
        ),
        'invokables' => array(
            
        )
    ),
    'view_helpers' => array(
        'invokables' => array(
            'seo' => 'EnliteSeo\View\Helper\Seo'
        )
    )
);
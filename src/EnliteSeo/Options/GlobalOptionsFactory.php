<?php

namespace EnliteSeo\Options;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class GlobalOptionsFactory implements FactoryInterface
{

    /**
     * @
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        return new GlobalOptions(
            isset($config['EnliteSeo'])
                ? $config['EnliteSeo']
                : []
        );
    }


}

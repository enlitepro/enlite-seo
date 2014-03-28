<?php

namespace EnliteSeo\Options;

use EnliteSeo\Options\GlobalOptions;
use EnliteSeo\Exception\RuntimeException;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

trait GlobalOptionsTrait
{

    /**
     * @var GlobalOptions
     */
    protected $globalOptions = null;

    /**
     * @var GlobalOptions
     */
    public function setGlobalOptions(GlobalOptions $globalOptions)
    {
        $this->globalOptions = $globalOptions;
    }

    /**
     * @throws \EnliteSeo\Exception\RuntimeException
     * @return GlobalOptions
     */
    public function getGlobalOptions()
    {
        if (null === $this->globalOptions) {
            if ($this instanceof ServiceLocatorAwareInterface || method_exists($this, 'getServiceLocator')) {
                $this->globalOptions = $this->getServiceLocator()->get('EnliteSeoGlobalOptions');
            } else {
                if (property_exists($this, 'serviceLocator')
                    && $this->serviceLocator instanceof ServiceLocatorInterface
                ) {
                    $this->globalOptions = $this->serviceLocator->get('EnliteSeoGlobalOptions');
                } else {
                    throw new RuntimeException('Service locator not found');
                }
            }
        }
        return $this->globalOptions;
    }


}

<?php

namespace EnliteSeo\Options;

use Zend\Stdlib\AbstractOptions;

class GlobalOptions extends AbstractOptions
{

    /**
     * The defaultTitle
     *
     * @var string
     */
    protected $defaultTitle = 'ZF2';
    
    /**
     * The defaultDescription
     *
     * @var string
     */
    protected $defaultDescription = '';
    
    /**
     * The defaultKeywords
     *
     * @var string
     */
    protected $defaultKeywords = '';

    /**
     * The entity
     *
     * @var string
     */
    protected $entity = 'EnliteSeo\Entity\Seo';

    /**
     * @param string $defaultDescription
     */
    public function setDefaultDescription($defaultDescription)
    {
        $this->defaultDescription = $defaultDescription;
    }

    /**
     * @return string
     */
    public function getDefaultDescription()
    {
        return $this->defaultDescription;
    }

    /**
     * @param string $defaultKeywords
     */
    public function setDefaultKeywords($defaultKeywords)
    {
        $this->defaultKeywords = $defaultKeywords;
    }

    /**
     * @return string
     */
    public function getDefaultKeywords()
    {
        return $this->defaultKeywords;
    }

    /**
     * @param string $defaultTitle
     */
    public function setDefaultTitle($defaultTitle)
    {
        $this->defaultTitle = $defaultTitle;
    }

    /**
     * @return string
     */
    public function getDefaultTitle()
    {
        return $this->defaultTitle;
    }

    /**
     * @param string $entity
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

}

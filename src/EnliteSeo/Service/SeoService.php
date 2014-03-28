<?php

namespace EnliteSeo\Service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\NoResultException;
use EnliteSeo\Entity\Seo;
use EnliteSeo\Entity\SeoInterface;
use EnliteSeo\Exception\NotFoundException;
use EnliteSeo\Options\GlobalOptionsTrait;
use EnliteSeo\Repository\SeoRepositoryTrait;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\ServiceManager\ServiceLocatorInterface;

class SeoService implements ServiceLocatorAwareInterface
{

    use ServiceLocatorAwareTrait,
        SeoRepositoryTrait,
        CityServiceTrait,
        GlobalOptionsTrait;

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function __construct(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
    }

    /**
     * @param int $id
     * @throws NotFoundException
     * @return Seo
     */
    public function loadById($id)
    {
        $model = $this->getSeoRepository()->find($id);
        if (!$model) {
            throw new NotFoundException('Cannot load model (' . $id . ')');
        }

        return $model;
    }

    /**
     * @param array $criteria
     * @return Seo[]
     */
    public function search(array $criteria = array())
    {
        return $this->getSeoRepository()->findBy($criteria);
    }

    /**
     * @param Seo $model
     */
    public function save(Seo $model)
    {
        $this->getEntityManager()->persist($model);
    }

    /**
     * @param Seo $model
     */
    public function delete(Seo $model)
    {
        $this->getEntityManager()->remove($model);
    }

    /**
     * @return Seo
     */
    public function factory()
    {
        return $this->getSeoRepository()->factory();
    }

    /**
     * @param string $url
     * @return bool|SeoInterface
     */
    public function loadByUrl($url)
    {
        try {
            return $this->getSeoRepository()->loadForUrl($url);
        } catch (NoResultException $e) {
            return false;
        }

    }


}

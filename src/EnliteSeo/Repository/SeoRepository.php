<?php

namespace EnliteSeo\Repository;

use Doctrine\ORM\EntityRepository;
use EnliteSeo\Entity\Seo;

class SeoRepository extends EntityRepository
{

    /**
     * @return Seo
     */
    public function factory()
    {
        return new Seo();
    }

    /**
     * @param string $url
     * @return Seo
     */
    public function loadForUrl($url)
    {
        $builder = $this->createQueryBuilder('seo');
        $builder->where(
            'REGEXP(:url, seo.pattern) = 1'
        );
        $builder->setParameter(':url', $url);
        $builder->orderBy('seo.weight', 'desc');
        $builder->setMaxResults(1);

        return $builder->getQuery()->getSingleResult();
    }

}

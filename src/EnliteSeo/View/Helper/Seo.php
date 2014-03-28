<?php
/**
 * @author Evgeny Shpilevsky <evgeny@shpilevsky.com>
 */

namespace EnliteSeo\View\Helper;


use EnliteSeo\Entity\SeoInterface;
use EnliteSeo\Options\GlobalOptionsTrait;
use EnliteSeo\Service\SeoServiceTrait;
use Zend\Form\View\Helper\AbstractHelper;
use Zend\Http\PhpEnvironment\Request;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\ServiceManager\ServiceLocatorInterface;

class Seo extends AbstractHelper implements ServiceLocatorAwareInterface
{

    use SeoServiceTrait,
        ServiceLocatorAwareTrait,
        GlobalOptionsTrait;

    /**
     * @var Request
     */
    protected $request;

    /**
     * @var SeoInterface
     */
    protected $seo;

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator->getServiceLocator();
    }


    /**
     * Set value of Request
     *
     * @param Request $request
     */
    public function setRequest($request)
    {
        $this->request = $request;
    }

    /**
     * Return value of Request
     *
     * @return Request
     */
    public function getRequest()
    {
        if (is_null($this->request)) {
            $this->request = $this->getServiceLocator()->get('request');
        }
        return $this->request;
    }

    /**
     * @return SeoInterface
     */
    public function getSeo()
    {
        if (null === $this->seo) {
            $url = $this->getRequest()->getRequestUri();
            $this->seo = $this->getSeoService()->loadByUrl($url);
        }

        return $this->seo;
    }

    /**
     * @return string
     */
    public function title()
    {
        $seo = $this->getSeo();
        if ($seo) {
            return $seo->getTitle();
        }

        return $this->getGlobalOptions()->getDefaultTitle();
    }

    /**
     * @return string
     */
    public function description()
    {
        $seo = $this->getSeo();
        if ($seo) {
            return $seo->getDescription();
        }

        return $this->getGlobalOptions()->getDefaultDescription();
    }

    /**
     * @return string
     */
    public function keywords()
    {
        $seo = $this->getSeo();
        if ($seo) {
            return $seo->getKeywords();
        }

        return $this->getGlobalOptions()->getDefaultKeywords();
    }

    /**
     * @param null|SeoInterface $seo
     * @return $this
     */
    public function __invoke($seo = null)
    {
        if ($seo) {
            $this->seo = $seo;
        }
        return $this;
    }

}
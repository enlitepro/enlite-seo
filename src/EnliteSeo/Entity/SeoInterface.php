<?php
/**
 * The interface for seo
 *
 * @category   Interface
 * @package    EnliteSeo
 * @author     Vladimir Struts <Sysaninster@gmail.com>
 * @license    LICENSE.txt
 * @date       22.01.14
 */

namespace EnliteSeo\Entity;


interface SeoInterface {

    /**
     * @return string
     */
    public function getKeywords();

    /**
     * Return value of Title
     *
     * @return string
     */
    public function getTitle();

    /**
     * Return value of Description
     *
     * @return string
     */
    public function getDescription();

} 
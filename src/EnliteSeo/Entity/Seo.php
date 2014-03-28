<?php

namespace EnliteSeo\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;

/**
 * @ORM\Entity(repositoryClass="EnliteSeo\Repository\SeoRepository")
 * @ORM\Table(name="seo")
 * @Form\Hydrator("Zend\Stdlib\Hydrator\ClassMethods")
 */
class Seo implements SeoInterface
{

    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Form\Type("hidden")
     * @Form\Exclude
     */
    protected $id = null;

    /**
     * @ORM\Column(type="string")
     * @Form\Options({"label": "Name"})
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     * @Form\Options({"label": "Pattern (regexp)"})
     */
    protected $pattern = '';

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Form\Options({"label": "Title"})
     */
    protected $title = '';

    /**
     * @var string
     * @ORM\Column(type="text")
     * @Form\Type("textarea")
     * @Form\Options({"label": "Meta keywords"})
     */
    protected $keywords = '';

    /**
     * @var string
     * @ORM\Column(type="string", length=1024)
     * @Form\Type("textarea")
     * @Form\Options({"label": "Meta description"})
     */
    protected $description = '';

    /**
     * @ORM\Column(type="integer")
     * @Form\Type("number")
     * @Form\Options({"label": "Weight"})
     * @var int
     */
    protected $weight = 0;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set value of Description
     *
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Return value of Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set value of Pattern
     *
     * @param string $pattern
     */
    public function setPattern($pattern)
    {
        $this->pattern = $pattern;
    }

    /**
     * Return value of Pattern
     *
     * @return string
     */
    public function getPattern()
    {
        return $this->pattern;
    }

    /**
     * Set value of Title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Return value of Title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

}

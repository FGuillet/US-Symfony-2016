<?php

namespace US\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use US\CatalogBundle\Entity\PropertyValue;
use US\CatalogBundle\Entity\Category;

/**
 * Property entity
 *
 * @ORM\Entity(repositoryClass="\US\CatalogBundle\Repository\PropertyRepository")
 */
class Property {

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, minMessage="Le nom doit faire au moins {{ limit }} caractères.", max=255, maxMessage="Le nom ne doit pas faire plus de {{ limit }} caractères.")
     */
    protected $name;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\US\CatalogBundle\Entity\Category", mappedBy="properties")
     */
    protected $categories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\US\CatalogBundle\Entity\PropertyValue", mappedBy="property", cascade={"persist"}, orphanRemoval=true)
     */
    protected $propertyValues;

    /**
     * @var boolean
     *
     * @ORM\Column(type="boolean")
     */
    protected $isSelectable = 0;

    /**
     * To string
     *
     * @return string
     */
    public function __toString() {
        return (string) $this->getName();
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->categories = new ArrayCollection();
        $this->propertyValues = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return \US\CatalogBundle\Entity\Property
     */
    public function setName($name) {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * Add a category
     *
     * @param \US\CatalogBundle\Entity\Category $category
     *
     * @return \US\CatalogBundle\Entity\Property
     */
    public function addCategory(Category $category) {
        $this->categories->add($category);

        return $this;
    }

    /**
     * Remove a category
     *
     * @param \US\CatalogBundle\Entity\Category $category
     */
    public function removeCategory(Category $category) {
        $this->categories->removeElement($category);
    }

    /**
     * Get a category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories() {
        return $this->categories;
    }

    /**
     * Add product values
     *
     * @param \US\CatalogBundle\Entity\PropertyValue $propertyValue
     *
     * @return \US\CatalogBundle\Entity\Property
     */
    public function addPropertyValue(PropertyValue $propertyValue) {
        $this->propertyValues->add($propertyValue);

        $propertyValue->setProperty($this);

        return $this;
    }

    /**
     * Remove product values
     *
     * @param \US\CatalogBundle\Entity\PropertyValue $propertyValue
     */
    public function removePropertyValue(PropertyValue $propertyValue) {
        $this->propertyValues->removeElement($propertyValue);
    }

    /**
     * Get product values
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPropertyValues() {
        return $this->propertyValues;
    }

    /**
     * Set isSelectable
     *
     * @param boolean $isSelectable
     *
     * @return \US\CatalogBundle\Entity\Property
     */
    public function setIsSelectable($isSelectable) {
        $this->isSelectable = $isSelectable;

        return $this;
    }

    /**
     * Get isSelectable
     *
     * @return boolean
     */
    public function getIsSelectable() {
        return $this->isSelectable;
    }

}

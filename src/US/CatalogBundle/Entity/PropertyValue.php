<?php

namespace US\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use US\CatalogBundle\Entity\Property;
use US\CatalogBundle\Entity\Product;

/**
 * Property value entity
 *
 * @ORM\Entity(repositoryClass="\US\CatalogBundle\Repository\PropertyValueRepository")
 */
class PropertyValue {

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
     * @ORM\Column(type="text")
     * @Assert\NotNull()
     */
    protected $content;

    /**
     * @var \US\CatalogBundle\Entity\Property
     *
     * @ORM\ManyToOne(targetEntity="\US\CatalogBundle\Entity\Property", inversedBy="propertyValues")
     * @ORM\JoinColumn(referencedColumnName="id")
     */
    protected $property;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\US\CatalogBundle\Entity\Product", mappedBy="propertyValues")
     * @ORM\JoinColumn(nullable=true)
     */
    protected $products;

    /**
     * To string
     *
     * @return string
     */
    public function __toString() {
        return (string) $this->getProperty()->getName() . '_' . $this->getContent();
    }

    /**
     * Constructor
     */
    public function __construct() {
        $this->products = new ArrayCollection();
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
     * Set content
     *
     * @param string $content
     *
     * @return string
     */
    public function setContent($content) {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     * Set property
     *
     * @param \US\CatalogBundle\Entity\Property $property
     *
     * @return \US\CatalogBundle\Entity\PropertyValue
     */
    public function setProperty(Property $property) {
        $this->property = $property;

        return $this;
    }

    /**
     * Get property
     *
     * @return \US\CatalogBundle\Entity\Property
     */
    public function getProperty() {
        return $this->property;
    }

    /**
     * Add a product
     *
     * @param \US\CatalogBundle\Entity\Product $product
     *
     * @return \US\CatalogBundle\Entity\PropertyValue
     */
    public function addProduct(Product $product) {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove a product
     *
     * @param \US\CatalogBundle\Entity\Product $product
     */
    public function removeProduct(Product $product) {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts() {
        return $this->products;
    }

}

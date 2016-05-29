<?php

namespace US\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use US\CatalogBundle\Entity\Category;
use US\CatalogBundle\Entity\PropertyValue;
use US\CoreBundle\Entity\Image;

/**
 * Product entity
 *
 * @ORM\Entity(repositoryClass="\US\CatalogBundle\Repository\ProductRepository")
 */
class Product {

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
     * @Assert\Length(min=3, minMessage="Le nom doit faire au moins {{ limit }} caractères.", max=255, maxMessage="Le nom ne doit pas faire plus de {{ limit }} caractères.")
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text")
     * @Assert\NotNull()
     */
    protected $description;

    /**
     * @var \US\CatalogBundle\Entity\Category
     *
     * @ORM\ManyToOne(targetEntity="\US\CatalogBundle\Entity\Category", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    protected $category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\US\CatalogBundle\Entity\PropertyValue", inversedBy="products")
     * @ORM\JoinTable(name="products__property_values",
     *      joinColumns={@ORM\JoinColumn(name="property_value_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="product_id", referencedColumnName="id")}
     *      )
     */
    protected $propertyValues;

    /**
     * @var \US\CoreBundle\Entity\Image|null
     *
     * @ORM\ManyToOne(targetEntity="\US\CoreBundle\Entity\Image", inversedBy="products", cascade={"persist"})
     * @ORM\JoinColumn(nullable=true)
     */
    protected $image;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=128, unique=true)
     */
    protected $slug;

    /**
     * @var integer
     */
    protected $idImage;

    /**
     * Constructor
     */
    public function __construct() {
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
     * @return \US\CatalogBundle\Entity\Product
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
     * Set description
     *
     * @param string $description
     *
     * @return \US\CatalogBundle\Entity\Product
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set category
     *
     * @param \US\CatalogBundle\Entity\Category $category
     *
     * @return \US\CatalogBundle\Entity\Product
     */
    public function setCategory(Category $category) {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return \US\CatalogBundle\Entity\Category
     */
    public function getCategory() {
        return $this->category;
    }

    /**
     * Add a property value
     *
     * @param \US\CatalogBundle\Entity\PropertyValue $propertyValue
     *
     * @return \US\CatalogBundle\Entity\Product
     */
    public function addPropertyValue(PropertyValue $propertyValue) {
        $this->propertyValues->add($propertyValue);

        return $this;
    }

    /**
     * Remove a property value
     *
     * @param \US\CatalogBundle\Entity\PropertyValue $propertyValue
     */
    public function removePropertyValue(PropertyValue $propertyValue) {
        $this->propertyValues->removeElement($propertyValue);
    }

    /**
     * Remove all property values
     */
    public function removeAllPropertyValues() {
        $this->propertyValues->clear();
    }

    /**
     * Get property values
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPropertyValues() {
        return $this->propertyValues;
    }

    /**
     * Set image
     *
     * @param \US\CoreBundle\Entity\Image $image
     *
     * @return \US\CatalogBundle\Entity\Product
     */
    public function setImage(Image $image = null) {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \US\CoreBundle\Entity\Image
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Product
     */
    public function setSlug($slug) {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug() {
        return $this->slug;
    }

    /**
     * Set image id
     *
     * @param integer $idImage
     *
     * @return \US\CatalogBundle\Entity\Product
     */
    public function setIdImage($idImage) {
        $this->idImage = $idImage;

        return $this;
    }

    /**
     * Get image id
     *
     * @return integer
     */
    public function getIdImage() {
        return $this->idImage;
    }

}

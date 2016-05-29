<?php

namespace US\CatalogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use US\CoreBundle\Entity\Image;
use US\CatalogBundle\Entity\Product;
use US\CatalogBundle\Entity\Property;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Category entity
 *
 * @ORM\Entity(repositoryClass="\US\CatalogBundle\Repository\CategoryRepository")
 */
class Category {
    const REFERENCE = 'USCatalogBundle:Category';

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
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\Length(min=3, minMessage="Le nom doit faire au moins {{ limit }} caractères.", max=255, maxMessage="Le nom ne doit pas faire plus de {{ limit }} caractères.")
     */
    protected $name;

    /**
     * @var string
     *
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(length=255, unique=true)
     */
    protected $slug;

    /**
     * @var \US\CoreBundle\Entity\Image
     *
     * @ORM\ManyToOne(targetEntity="\US\CoreBundle\Entity\Image", inversedBy="categories")
     */
    protected $image;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="\US\CatalogBundle\Entity\Property", inversedBy="categories", cascade={"persist"})
     * @ORM\JoinTable(name="categories__properties",
     *      joinColumns={@ORM\JoinColumn(name="property_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     *      )
     */
    protected $properties;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="\US\CatalogBundle\Entity\Product", mappedBy="category", orphanRemoval=true)
     */
    protected $products;

    /**
     * @var string
     */
    protected $idImage;

    /**
     * Constructor
     */
    public function __construct() {
        $this->properties = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return \US\CatalogBundle\Entity\TypeProduct
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
     * Add a property
     *
     * @param \US\CatalogBundle\Entity\Property $property
     *
     * @return \US\CatalogBundle\Entity\TypeProduct
     */
    public function addProperty(Property $property) {
        $this->properties[] = $property;

        return $this;
    }

    /**
     * Remove a property
     *
     * @param \US\CatalogBundle\Entity\Property $property
     */
    public function removeProperty(Property $property) {
        $this->properties->removeElement($property);
    }

    /**
     * Get properties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProperties() {
        return $this->properties;
    }

    /**
     * Add a product
     *
     * @param \US\CatalogBundle\Entity\Product $product
     *
     * @return \US\CatalogBundle\Entity\TypeProduct
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

    /**
     * Set image id
     *
     * @param integer $idImage
     *
     * @return \US\CatalogBundle\Entity\Category
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

    /**
     * Set image
     *
     * @param \US\CoreBundle\Entity\Image $image
     *
     * @return Category
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
     * @return Category
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

}

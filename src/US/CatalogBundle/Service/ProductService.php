<?php

namespace US\CatalogBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use US\CatalogBundle\Entity\Product;

/**
 * Product service
 */
class ProductService {

    /**
     * Entity manager
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    public $em;

    const REFERENCE = 'us_product_service';

    /**
     * Constructor
     *
     * @param \Doctrine\ORM\EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * Find one product
     *
     * @return \US\CatalogBundle\Entity\Product|null
     */
    public function find($id) {
        return $this->getProductRepository()->find($id);
    }

    /**
     * Find products by category
     *
     * @param integer $id Category id
     *
     * @return array
     */
    public function findByCategory($id) {
        return $this->getProductRepository()->findByCategory($id);
    }

    /**
     * Find products with category
     *
     * @return array
     */
    public function findWithCategory() {
        return $this->getProductRepository()->findWithCategory();
    }

    /**
     * Find products with category
     *
     * @param string $slug Category slug
     *
     * @return array
     */
    public function findByCategorySlug($slug) {
        return $this->getProductRepository()->findByCategorySlug($slug);
    }

    /**
     * Find one product by slug
     *
     * @param string $slug Product slug
     *
     * @return \US\CatalogBundle\Entity\Product|null
     */
    public function findOneBySlug($slug) {
        return $this->getProductRepository()->findOneBySlug($slug);
    }

    /**
     * Find one product with category and property values
     *
     * @param integer $id Product id
     *
     * @return \US\CatalogBundle\Entity\Product|null
     */
    public function findOneWithCatPropVal($id) {
        return $this->getProductRepository()->findOneWithCatPropVal($id);
    }

    /**
     * Save a product
     *
     * @param \US\CatalogBundle\Entity\Product $product The product
     */
    public function save(Product $product) {
        $this->em->persist($product);
        $this->em->flush();
    }

    /**
     * Removes a product
     *
     * @param \US\CatalogBundle\Entity\Product $product The product
     */
    public function remove(Product $product) {
        $this->em->remove($product);
        $this->em->flush();
    }

    /**
     * Add property values and
     * remove old property values which are no more in the collection
     *
     * @param \US\CatalogBundle\Entity\Product $product The product
     * @param array $propertyValues
     */
    public function addAndRemovePropertyValues(Product $product, array $propertyValues) {
        $this->removePropertyValues($product, $propertyValues);
        $this->addPropertyValues($product, $propertyValues);
    }

    /**
     * Remove property values
     *
     * @param \US\CatalogBundle\Entity\Product $product The product
     * @param array $propertyValues
     */
    protected function removePropertyValues(Product $product, array $propertyValues) {
        $oldPropertyValues = $product->getPropertyValues();

        foreach ($oldPropertyValues as $oldPropertyValue) {
            if (!in_array($oldPropertyValue, $propertyValues)) {
                $product->removePropertyValue($oldPropertyValue);
            }
        }
    }

    /**
     * Add property values
     *
     * @param \US\CatalogBundle\Entity\Product $product The product
     * @param array $propertyValues
     */
    protected function addPropertyValues(Product $product, array $propertyValues) {
        foreach ($propertyValues as $propertyValue) {
            $product->addPropertyValue($propertyValue);
        }
    }

    /**
     * Get product repository
     *
     * @return \US\CatalogBundle\Repository\ProductRepository
     */
    protected function getProductRepository() {
        return $this->em->getRepository('USCatalogBundle:Product');
    }

}

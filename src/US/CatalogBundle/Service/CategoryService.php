<?php

namespace US\CatalogBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use US\CatalogBundle\Entity\Category;
use US\CatalogBundle\Entity\Property;
use Doctrine\Common\Collections\Collection;

/**
 * Category service
 */
class CategoryService {

    const REFERENCE = 'us_category_service';
    // Keys
    const KEY_NAME = 'name';
    const KEY_PROPERTIES = 'properties';
    const KEY_IS_SELECTABLE = 'isSelectable';
    const KEY_VALUES = 'values';

    /**
     * Constructor
     *
     * @param \Doctrine\ORM\EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * Find one category
     *
     * @param integer $id
     *
     * @return \US\CatalogBundle\Entity\Category|null
     */
    public function find($id) {
        return $this->getCategoryRepository()->find($id);
    }

    /**
     * Find a category with properties
     *
     * @param integer $id Category id
     *
     * @return \US\CatalogBundle\Entity\Category|null
     */
    public function findOneWithProperties($id) {
        return $this->getCategoryRepository()->findOneWithProperties($id);
    }

    /**
     * Find category by slug
     *
     * @param string $slug
     *
     * @return \US\CatalogBundle\Entity\Category|null
     */
    public function findOneBySlug($slug) {
        return $this->getCategoryRepository()
                        ->findOneBySlug($slug);
    }

    /**
     * Find category with image and products
     *
     * @return array
     */
    public function findWithImageAndProducts() {
        return $this->getCategoryRepository()->findWithImageAndProducts();
    }

    /**
     * Find categories with products
     *
     * @return array
     */
    public function findWithProducts() {
        return $this->getCategoryRepository()->findWithProducts();
    }

    /**
     * Filter visible categories
     *
     * @param array|null $categories
     *
     * @return array
     */
    public function filterVisible($categories) {
        $categoriesVisible = array();

        if (!is_null($categories)) {
            foreach ($categories as $category) {
                if (count($category->getProducts()) > 0) {
                    $categoriesVisible[] = $category;
                }
            }
        }

        return $categoriesVisible;
    }

    /**
     * Get category data (for JSON)
     *
     * @param \US\CatalogBundle\Entity\Category $category The category
     *
     * @return array
     */
    public function getCategoryData(Category $category) {
        $categoryData = [
            self::KEY_NAME => $category->getName()
        ];

        $properties = $category->getProperties();

        if ($properties->count() > 0) {
            $this->setPropToCatData($properties, $categoryData);
        }

        return $categoryData;
    }

    /**
     * Set properties to category data
     *
     * @param \Doctrine\Common\Collections\Collection $properties Category properties
     * @param array $categoryData Category data
     */
    protected function setPropToCatData(Collection $properties, array &$categoryData) {
        /* @var $property \US\CatalogBundle\Entity\Property */
        foreach ($properties as $key => $property) {
            $categoryData[self::KEY_PROPERTIES][$property->getId()] = [
                self::KEY_NAME => $property->getName(),
                self::KEY_IS_SELECTABLE => $property->getIsSelectable()
            ];

            $this->setPropValToCatDataIfNeeded($property, $categoryData);
        }
    }

    /**
     * Set property values to category data if property is selectable and
     * if it has property values
     *
     * @param \US\CatalogBundle\Entity\Property $property The property
     * @param array $categoryData Category data
     */
    protected function setPropValToCatDataIfNeeded(Property $property, array &$categoryData) {
        if ($property->getIsSelectable() && $property->getPropertyValues()->count() > 0) {
            $this->setPropValToCatData($property, $categoryData);
        }
    }

    /**
     * Set property values to category data
     *
     * @param \US\CatalogBundle\Entity\Property $property The property
     * @param array $categoryData Category data
     */
    protected function setPropValToCatData(Property $property, array &$categoryData) {
        /* @var $propertyValue \US\CatalogBundle\Entity\PropertyValue */
        foreach ($property->getPropertyValues() as $propertyValue) {
            $categoryData[self::KEY_PROPERTIES][$property->getId()][self::KEY_VALUES][$propertyValue->getId()] = $propertyValue->getContent();
        }
    }

    /**
     * Remove deleted property values from products
     *
     * @param \US\CatalogBundle\Entity\Category $category The category
     * @param array $products
     */
    public function removeProductsPropValues(Category $category, array $products) {
        /* @var $product \US\CatalogBundle\Entity\Product */
        foreach ($products as $product) {
            $this->removePropValues($category, $product->getPropertyValues());
        }
    }

    /**
     * Remove deleted property values
     *
     * @param \US\CatalogBundle\Entity\Category $category The category
     * @param Collection $propertyValues
     */
    protected function removePropValues(Category $category, Collection $propertyValues) {
        /* @var $propertyValue \US\CatalogBundle\Entity\PropertyValue */
        foreach ($propertyValues as $propertyValue) {
            if (!$category->getProperties()->contains($propertyValue->getProperty())) {
                $this->em->remove($propertyValue);
            }
        }
    }

    /**
     * Save a category
     *
     * @param \US\CatalogBundle\Entity\Category $category The category
     */
    public function save(Category $category) {
        $this->em->persist($category);
        $this->em->flush();
    }

    /**
     * Removes a category
     *
     * @param \US\CatalogBundle\Entity\Category $category The category
     */
    public function remove(Category $category) {
        $this->em->remove($category);
        $this->em->flush();
    }

    /**
     * Get category repository
     *
     * @return \US\CatalogBundle\Repository\CategoryRepository
     */
    protected function getCategoryRepository() {
        return $this->em->getRepository(Category::REFERENCE);
    }

}

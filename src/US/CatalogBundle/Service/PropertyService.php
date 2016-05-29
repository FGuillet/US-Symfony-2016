<?php

namespace US\CatalogBundle\Service;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Session\Session;
use US\CatalogBundle\Entity\Category;
use US\CatalogBundle\Entity\Property;

/**
 * Property service
 */
class PropertyService {

    /**
     * Entity manager
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    public $em;

    /**
     * Session
     *
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    public $session;

    const REFERENCE = 'us_property_service';
    const HAS_CHILDS_PROP_VAL = 'You cannot delete this property value (%s) since it is referenced by at least one product.';
    const HAS_CHILDS_PROPERTY = 'You cannot delete this property (%s) since some of his property values are referenced by at least one product.';
    const FL_TYPE_ERROR = 'error';

    /**
     * Constructor
     *
     * @param \Doctrine\ORM\EntityManagerInterface $em
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     */
    public function __construct(EntityManagerInterface $em, Session $session) {
        $this->em = $em;
        $this->session = $session;
    }

    /**
     * Find one property
     *
     * @return \US\CatalogBundle\Entity\Property|null
     */
    public function find($id) {
        return $this->getPropertyRepository()->find($id);
    }

    /**
     * Find all properties
     *
     * @return array
     */
    public function findAll() {
        return $this->getPropertyRepository()->findAll();
    }

    /**
     * Find a property with values
     *
     * @param integer $id
     *
     * @return \US\CatalogBundle\Entity\Property|null
     */
    public function findOneWithValues($id) {
        return $this->getPropertyRepository()->findOneWithValues($id);
    }

    /**
     * Find properties by category
     *
     * @param \US\CatalogBundle\Entity\Category $category
     *
     * @return array
     */
    public function findByCategory(Category $category) {
        return $this->getPropertyRepository()->findByCategory($category);
    }

    /**
     * Set isSelectable if the property has property values
     *
     * @param \US\CatalogBundle\Entity\Property $property The property
     */
    public function setIsSelectableIfPropVal(Property $property) {
        if ($property->getPropertyValues()->count()) {
            $property->setIsSelectable(1);
        }
    }

    /**
     * Save a property
     *
     * @param \US\CatalogBundle\Entity\Property $property The property
     */
    public function save(Property $property) {
        $this->em->persist($property);
        $this->em->flush();
    }

    /**
     * Removes a property
     *
     * @param \US\CatalogBundle\Entity\Property $property The property
     */
    public function remove(Property $property) {
        if ($this->hasProductsUsingPropValues($property)) {
            $this->session->getFlashBag()
                    ->add(self::FL_TYPE_ERROR, sprintf(self::HAS_CHILDS_PROPERTY, $property));
        } else {
            $this->em->remove($property);
            $this->em->flush();
        }
    }

    /**
     * Checks if products are using property values
     *
     * @param \US\CatalogBundle\Entity\Property $property The property
     */
    public function hasProductsUsingPropValues(Property $property) {
        /* @var $propertyValue \US\CatalogBundle\Entity\PropertyValue */
        foreach ($property->getPropertyValues() as $propertyValue) {
            if ($propertyValue->getProducts()->count()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Clear property values
     *
     * @param \US\CatalogBundle\Entity\Property $property The property
     */
    public function clearPropertyValues(Property $property) {
        foreach ($property->getPropertyValues() as $propertyValue) {
            $this->em->remove($propertyValue);
        }

        $this->em->flush();
    }

    /**
     * Add new property values
     *
     * @param \US\CatalogBundle\Entity\Property $property The property
     * @param \Doctrine\Common\Collections\Collection $oldPropertyValues
     */
    public function addPropertyValues(Property $property) {
        foreach ($property->getPropertyValues() as $propertyValue) {
            $property->addPropertyValue($propertyValue);
        }
    }

    /**
     * Get property repository
     *
     * @return \US\CatalogBundle\Repository\PropertyRepository
     */
    protected function getPropertyRepository() {
        return $this->em->getRepository('USCatalogBundle:Property');
    }

}

<?php

namespace US\CatalogBundle\Service;

use Doctrine\ORM\EntityManagerInterface;

/**
 * Property value service
 */
class PropertyValueService {

    /**
     * Entity manager
     *
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    public $em;

    const REFERENCE = 'us_property_value_service';

    /**
     * Constructor
     *
     * @param \Doctrine\ORM\EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * Find all property values by ids
     *
     * @return \US\CatalogBundle\Entity\Property|null
     */
    public function findById(array $ids) {
        return $this->getPropertyValueRepository()->findById($ids);
    }

    /**
     * Get property value repository
     *
     * @return \US\CatalogBundle\Repository\PropertyValueRepository
     */
    protected function getPropertyValueRepository() {
        return $this->em->getRepository('USCatalogBundle:PropertyValue');
    }

}

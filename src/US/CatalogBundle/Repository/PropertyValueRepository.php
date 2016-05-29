<?php

namespace US\CatalogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Product value repository
 */
class PropertyValueRepository extends EntityRepository {

    /**
     * Find product values by product
     *
     * @param integer $id Product id
     *
     * @return array
     */
    public function findWithProduct($id) {
        $queryBuilder = $this->createQueryBuilder('pv')
                ->leftJoin('pv.products', 'ps')
                ->addSelect('ps')
                ->where('ps.id = :id_product')
                ->setParameter('id_product', $id)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find product values by property
     *
     * @param type $id Property id
     *
     * @return array
     */
    public function findWithProperty($id) {
        $queryBuilder = $this->createQueryBuilder('pv')
                ->leftJoin('pv.property', 'prop')
                ->addSelect('prop')
                ->where('prop.id = :id_property')
                ->setParameter('id_property', $id)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find a product value with property and products
     *
     * @param integer $id Value id
     *
     * @return \US\CatalogBundle\Entity\PropertyValue|null
     */
    public function findOneWithPropAndProd($id) {
        $queryBuilder = $this->createQueryBuilder('pv')
                ->leftJoin('pv.property', 'prop')
                ->addSelect('prop')
                ->leftJoin('pv.products', 'p')
                ->addSelect('p')
                ->where('pv.id = :id_value')
                ->setParameter('id_value', $id)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

}

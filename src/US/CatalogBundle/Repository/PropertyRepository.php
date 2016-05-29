<?php

namespace US\CatalogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Property repository
 */
class PropertyRepository extends EntityRepository {

    /**
     * Find properties by category
     *
     * @param integer $id Category id
     *
     * @return array
     */
    public function findByCategory($id) {
        $queryBuilder = $this->createQueryBuilder('p')
                ->leftJoin('p.categories', 'c')
                ->addSelect('c')
                ->leftJoin('p.propertyValues', 'pv')
                ->addSelect('pv')
                ->where('c.id = :id_c')
                ->setParameter('id_c', $id)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find a property with values
     *
     * @param integer $id Property id
     *
     * @return \US\CatalogBundle\Entity\Property|null
     */
    public function findOneWithValues($id) {
        $queryBuilder = $this->createQueryBuilder('p')
                ->leftJoin('p.propertyValues', 'c')
                ->addSelect('c')
                ->where('p.id = :id_p')
                ->setParameter('id_p', $id)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

}

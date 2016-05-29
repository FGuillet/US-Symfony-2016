<?php

namespace US\CatalogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Category repository
 */
class CategoryRepository extends EntityRepository {

    /**
     * Find a category with properties
     *
     * @param integer $id Category id
     *
     * @return \US\CatalogBundle\Entity\Category|null
     */
    public function findOneWithProperties($id) {
        $queryBuilder = $this->createQueryBuilder('c')
                ->leftJoin('c.properties', 'p')
                ->addSelect('p')
                ->where('c.id = :id')
                ->setParameter('id', $id)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * Find categories with image and products
     *
     * @return array
     */
    public function findWithImageAndProducts() {
        $queryBuilder = $this->createQueryBuilder('c')
                ->leftJoin('c.image', 'i')
                ->addSelect('i')
                ->leftJoin('c.products', 'p')
                ->addSelect('p')
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find a category by slug
     *
     * @param string $slug
     *
     * @return \US\CatalogBundle\Entity\Category|null
     */
    public function findOneBySlug($slug) {
        $queryBuilder = $this->createQueryBuilder('c')
                ->leftJoin('c.image', 'i')
                ->addSelect('i')
                ->leftJoin('c.products', 'p')
                ->addSelect('p')
                ->where('c.slug = :c_slug')
                ->setParameter('c_slug', $slug)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * Find categories with products
     *
     * @return array
     */
    public function findWithProducts() {
        $queryBuilder = $this->createQueryBuilder('c')
                ->leftJoin('c.products', 'p')
                ->addSelect('p')
        ;

        return $queryBuilder->getQuery()->getResult();
    }

}

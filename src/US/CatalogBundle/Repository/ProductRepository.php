<?php

namespace US\CatalogBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Product repository
 */
class ProductRepository extends EntityRepository {

    /**
     * Find products by category
     *
     * @param integer $id Category id
     *
     * @return array
     */
    public function findByCategory($id) {
        $queryBuilder = $this->createQueryBuilder('p')
                ->leftJoin('p.category', 'c')
                ->addSelect('c')
                ->where('c.id = :id_c')
                ->setParameter('id_c', $id)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find products by category
     *
     * @param string $slug Category slug
     *
     * @return array
     */
    public function findByCategorySlug($slug) {
        $queryBuilder = $this->createQueryBuilder('p')
                ->leftJoin('p.category', 'c')
                ->addSelect('c')
                ->leftJoin('p.image', 'i')
                ->addSelect('i')
                ->leftJoin('p.propertyValues', 'v')
                ->addSelect('v')
                ->where('c.slug = :slug_c')
                ->setParameter('slug_c', $slug)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find one product by slug
     *
     * @param string $slug Product slug
     *
     * @return \US\CatalogBundle\Entity\Product|null
     */
    public function findOneBySlug($slug) {
        $queryBuilder = $this->createQueryBuilder('p')
                ->leftJoin('p.category', 'c')
                ->addSelect('c')
                ->leftJoin('p.propertyValues', 'v')
                ->addSelect('v')
                ->where('p.slug = :slug_p')
                ->setParameter('slug_p', $slug)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * Find one product
     *
     * @param integer $id Product id
     *
     * @return \US\CatalogBundle\Entity\Product|null
     */
    public function findOneWithCatPropVal($id) {
        $queryBuilder = $this->createQueryBuilder('p')
                ->leftJoin('p.category', 'c')
                ->addSelect('c')
                ->leftJoin('p.propertyValues', 'v')
                ->addSelect('v')
                ->where('p.id = :id_p')
                ->setParameter('id_p', $id)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

    /**
     * Find products by image
     *
     * @param integer $id Image id
     *
     * @return array
     */
    public function findWithImage($id) {
        $queryBuilder = $this->createQueryBuilder('p')
                ->leftJoin('p.image', 'i')
                ->addSelect('i')
                ->where('p.image = :id_i')
                ->setParameter('id_i', $id)
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * Find products with category
     *
     * @return array
     */
    public function findWithCategory() {
        $queryBuilder = $this->createQueryBuilder('p')
                ->leftJoin('p.category', 'c')
                ->addSelect('c')
        ;

        return $queryBuilder->getQuery()->getResult();
    }

}

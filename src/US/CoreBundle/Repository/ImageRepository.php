<?php

namespace US\CoreBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Image repository
 */
class ImageRepository extends EntityRepository {

    /**
     * Find one with products, news and categories
     *
     * @param integer $id
     *
     * @return \US\CoreBundle\Entity\Image|null
     */
    public function findOneWithProdNewsCat($id) {
        $queryBuilder = $this->createQueryBuilder('i')
                ->leftJoin('i.products', 'p')
                ->addSelect('p')
                ->leftJoin('i.news', 'n')
                ->addSelect('n')
                ->leftJoin('i.categories', 'c')
                ->addSelect('c')
                ->where('i.id = :id_i')
                ->setParameter('id_i', $id)
        ;

        return $queryBuilder->getQuery()->getOneOrNullResult();
    }

}

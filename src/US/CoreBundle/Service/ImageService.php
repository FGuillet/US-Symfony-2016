<?php

namespace US\CoreBundle\Service;

use Doctrine\ORM\EntityManagerInterface;
use US\CoreBundle\Entity\Image;
use US\CatalogBundle\Entity\Product;
use US\CatalogBundle\Entity\Category;

/**
 * Image service
 */
class ImageService {

    const REFERENCE = 'us_image_service';

    /**
     * Constructor
     *
     * @param \Doctrine\ORM\EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }

    /**
     * Find one image
     *
     * @param integer $id
     *
     * @return \US\CoreBundle\Entity\Image|null
     */
    public function find($id) {
        return $this->getImageRepository()->find($id);
    }

    /**
     * Set product image
     *
     * @param \US\CatalogBundle\Entity\Product $product
     */
    public function setProductImage(Product $product) {
        $imageId = $product->getIdImage();

        if (!is_null($imageId)) {
            $image = $this->getImageRepository()
                    ->find($imageId);

            if (!is_null($image)) {
                $product->setImage($image);
            }
        }
    }

    /**
     * Set category image
     *
     * @param \US\CatalogBundle\Entity\Category $category
     */
    public function setCategoryImage(Category $category) {
        $imageId = $category->getIdImage();

        if (!is_null($imageId)) {
            $image = $this->getImageRepository()
                    ->find($imageId);

            if (!is_null($image)) {
                $category->setImage($image);
            }
        }
    }

    /**
     * Get image repository
     *
     * @return \US\CoreBundle\Repository\ImageRepository
     */
    protected function getImageRepository() {
        return $this->em->getRepository(Image::REFERENCE);
    }

}

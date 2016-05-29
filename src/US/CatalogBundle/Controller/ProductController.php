<?php

namespace US\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use US\CatalogBundle\Entity\Product;
use US\CatalogBundle\Entity\Category;
use US\CatalogBundle\Form\ProductType;
use US\CatalogBundle\Service\CategoryService;
use US\CatalogBundle\Service\ProductService;
use US\CatalogBundle\Service\PropertyService;
use US\CatalogBundle\Service\PropertyValueService;
use US\CoreBundle\Service\ImageService;
use US\CatalogBundle\Interfaces\ControllerInterface;

/**
 * Product controller
 */
class ProductController extends Controller implements ControllerInterface {

    // Routes
    const ROUTE_INDEX_MANAGE = 'product_index_manage';
    const ROUTE_VIEW_MANAGE = 'product_view_manage';
    const ROUTE_VIEW = 'product_view';
    // Views
    const VIEW_INDEX = 'USCatalogBundle:Catalog:index.html.twig';
    const VIEW_VIEW = 'USCatalogBundle:Catalog:view.html.twig';
    const VIEW_INDEX_MANAGE = 'USCatalogBundle:Manage:indexManage.html.twig';
    const VIEW_VIEW_MANAGE = 'USCatalogBundle:Manage:viewManage.html.twig';
    const VIEW_VIEW_CAT = 'USCatalogBundle:Catalog:viewProductsCategory.html.twig';
    const VIEW_ADD_MANAGE = 'USCatalogBundle:Manage:addProductManage.html.twig';
    const VIEW_EDIT_MANAGE = 'USCatalogBundle:Manage:editManage.html.twig';
    const VIEW_DELETE_MANAGE = 'USCatalogBundle:Manage:deleteManage.html.twig';
    // Parameters
    const PARAM_PROP_VAL = 'propertyValues';

    /**
     * List all products
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction() {
        $categories = $this->getCategoryService()
                ->findWithImageAndProducts();

        $categoriesVisible = $this->getCategoryService()
                ->filterVisible($categories);

        return $this->render(self::VIEW_INDEX, array(
                    self::KEY_CATEGORIES => $categoriesVisible
        ));
    }

    /**
     * List all products in the backoffice
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexManageAction() {
        $products = $this->getProductService()->findWithCategory();

        return $this->render(self::VIEW_INDEX_MANAGE, array(
                    self::KEY_PRODUCTS => $products
        ));
    }

    /**
     * See product in the backoffice
     *
     * @param integer $id Product id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function viewManageAction($id) {
        $product = $this->getProductService()->findOneWithCatPropVal($id);

        if (!$product instanceof Product) {
            throw new NotFoundHttpException(self::MSG_PRODUCT_NOT_FOUND);
        }

        return $this->render(self::VIEW_VIEW_MANAGE, array(
                    self::KEY_PRODUCT => $product
        ));
    }

    /**
     * See product
     *
     * @param string $slug Product slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function viewAction($slug) {
        $product = $this->getProductService()->findOneBySlug($slug);

        if (!$product instanceof Product) {
            throw new NotFoundHttpException(self::MSG_PRODUCT_NOT_FOUND);
        }

        return $this->render(self::VIEW_VIEW, array(
                    self::KEY_PRODUCT => $product
        ));
    }

    /**
     * List products by category
     *
     * @param string $slug Category slug
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function listByCategoryAction($slug) {
        $products = $this->getProductService()
                ->findByCategorySlug($slug);

        $category = $this->getCategoryService()->findOneBySlug($slug);

        if (!$category instanceof Category) {
            throw new NotFoundHttpException(self::MSG_CATEGORY_NOT_FOUND);
        }

        return $this->render(self::VIEW_VIEW_CAT, array(
                    self::KEY_PRODUCTS => $products,
                    self::KEY_CATEGORY => $category
        ));
    }

    /**
     * Add a product
     *
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction(Request $request) {
        $product = new Product();
        $form = $this->createForm(new ProductType(), $product);

        if ($request->getMethod() === Request::METHOD_POST) {

            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->getImageService()->setProductImage($product);

                $this->getProductService()->save($product);

                return $this->redirect($this->generateUrl(self::ROUTE_VIEW_MANAGE, array(
                                    self::KEY_ID => $product->getId()
                )));
            }
        }

        return $this->render(self::VIEW_ADD_MANAGE, array(
                    self::KEY_FORM => $form->createView()
        ));
    }

    /**
     * Edit a product
     *
     * @param integer $id Product id
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction($id, Request $request) {
        $product = $this->getProductService()->findOneWithCatPropVal($id);

        if (!$product instanceof Product) {
            throw new NotFoundHttpException(self::MSG_PRODUCT_NOT_FOUND);
        }

        $form = $this->createForm(new ProductType(), $product);

        if ($request->getMethod() === Request::METHOD_POST) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $propertyValuesIds = $request->request->get(self::PARAM_PROP_VAL);
                $propertyValues = $this->getPropertyValueService()
                        ->findById($propertyValuesIds);

                $this->getProductService()
                        ->addAndRemovePropertyValues($product, $propertyValues);
                $this->getProductService()->save($product);

                return $this->redirect($this->generateUrl(self::ROUTE_VIEW, array(
                                    self::KEY_SLUG => $product->getSlug()
                )));
            }
        }

        $category = $product->getCategory();
        $properties = $this->getPropertyService()
                ->findByCategory($category);

        return $this->render(self::VIEW_EDIT_MANAGE, array(
                    self::KEY_FORM => $form->createView(),
                    self::KEY_PRODUCT => $product,
                    self::KEY_PROPERTIES => $properties
        ));
    }

    /**
     * Delete a product
     *
     * @param integer $id Product id
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction($id, Request $request) {
        $product = $this->getProductService()->find($id);

        if (!$product instanceof Product) {
            throw new NotFoundHttpException(self::MSG_PRODUCT_NOT_FOUND);
        }

        $form = $this->createFormBuilder()->getForm();

        if ($request->getMethod() === Request::METHOD_POST) {
            $form->submit($request);

            if ($form->isValid()) {
                $product->removeAllPropertyValues();

                $this->getProductService()->remove($product);

                return $this->redirect($this->generateUrl(self::ROUTE_INDEX_MANAGE));
            }
        }

        return $this->render(self::VIEW_DELETE_MANAGE, array(
                    self::KEY_FORM => $form->createView(),
                    self::KEY_PRODUCT => $product
        ));
    }

    /**
     * Get product service
     *
     * @return \US\CatalogBundle\Service\ProductService
     */
    protected function getProductService() {
        return $this->get(ProductService::REFERENCE);
    }

    /**
     * Get category service
     *
     * @return \US\CatalogBundle\Service\CategoryService
     */
    protected function getCategoryService() {
        return $this->get(CategoryService::REFERENCE);
    }

    /**
     * Get property service
     *
     * @return \US\CatalogBundle\Service\PropertyService
     */
    protected function getPropertyService() {
        return $this->get(PropertyService::REFERENCE);
    }

    /**
     * Get property value service
     *
     * @return \US\CatalogBundle\Service\PropertyValueService
     */
    protected function getPropertyValueService() {
        return $this->get(PropertyValueService::REFERENCE);
    }

    /**
     * Get image service
     *
     * @return \US\CoreBundle\Service\ImageService
     */
    protected function getImageService() {
        return $this->get(ImageService::REFERENCE);
    }

}

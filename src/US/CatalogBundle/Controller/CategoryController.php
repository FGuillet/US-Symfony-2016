<?php

namespace US\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use US\CatalogBundle\Entity\Category;
use US\CatalogBundle\Form\AddCategoryType;
use US\CatalogBundle\Service\CategoryService;
use US\CatalogBundle\Service\ProductService;
use US\CoreBundle\Service\ImageService;
use US\CatalogBundle\Interfaces\ControllerInterface;

/**
 * Category controller
 */
class CategoryController extends Controller implements ControllerInterface {

    // Views
    const VIEW_INDEX_MANAGE = 'USCatalogBundle:Manage:indexCategoriesManage.html.twig';
    const VIEW_VIEW_MANAGE = 'USCatalogBundle:Manage:viewCategoryManage.html.twig';
    const VIEW_ADD_MANAGE = 'USCatalogBundle:Manage:addCategoryManage.html.twig';
    const VIEW_EDIT_MANAGE = 'USCatalogBundle:Manage:editCategoryManage.html.twig';
    const VIEW_DELETE_MANAGE = 'USCatalogBundle:Manage:deleteCategoryManage.html.twig';
    // Messages
    const MSG_CATEGEORY_SAVED = 'Categorie bien enregistrée.';
    // Routes
    const ROUTE_VIEW = 'view_category';
    const ROUTE_INDEX_MANAGE = 'category_index_manage';

    /**
     * List all categories in the backoffice
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexManageAction() {
        $categories = $this->getCategoryService()
                ->findWithProducts();

        return $this->render(self::VIEW_INDEX_MANAGE, array(
                    self::KEY_CATEGORIES => $categories
        ));
    }

    /**
     * See a category in the backoffice
     *
     * @param integer $id Category id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function viewAction($id) {
        $category = $this->getCategoryService()->findOneWithProperties($id);

        if (!$category instanceof Category) {
            throw new NotFoundHttpException(self::MSG_CATEGORY_NOT_FOUND);
        }

        return $this->render(self::VIEW_VIEW_MANAGE, array(
                    self::KEY_CATEGORY => $category
        ));
    }

    /**
     * Add a category
     *
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction(Request $request) {
        $category = new Category();

        $form = $this->createForm(new AddCategoryType(), $category);

        if ($form->handleRequest($request)->isValid()) {
            $this->getImageService()->setCategoryImage($category);
            $this->getCategoryService()->save($category);

            $this->addFlash(self::FL_TYPE_NOTICE, self::MSG_CATEGEORY_SAVED);

            return $this->redirect($this->generateUrl(self::ROUTE_VIEW, array(
                                self::KEY_ID => $category->getId()
            )));
        }

        return $this->render(self::VIEW_ADD_MANAGE, array(
                    self::KEY_FORM => $form->createView()
        ));
    }

    /**
     * Edit a category
     *
     * @param integer $id Category id
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction($id, Request $request) {
        $category = $this->getCategoryService()->find($id);

        if (!$category instanceof Category) {
            throw new NotFoundHttpException(self::MSG_CATEGORY_NOT_FOUND);
        }

        $form = $this->createForm(new AddCategoryType(), $category);

        if ($request->getMethod() === Request::METHOD_POST) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $products = $this->getProductService()->findByCategory($id);

                $this->getCategoryService()->removeProductsPropValues($category, $products);
                $this->getCategoryService()->save($category);

                return $this->redirect($this->generateUrl(self::ROUTE_VIEW, array(
                                    self::KEY_ID => $id
                )));
            }
        }

        return $this->render(self::VIEW_EDIT_MANAGE, array(
                    self::KEY_FORM => $form->createView(),
                    self::KEY_CATEGORY => $category
        ));
    }

    /**
     * Delete a category
     *
     * @param integer $id Category id
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id, Request $request) {
        $category = $this->getCategoryService()->find($id);

        if (!$category instanceof Category) {
            throw new NotFoundHttpException(self::MSG_CATEGORY_NOT_FOUND);
        }

        $form = $this->createFormBuilder()->getForm();

        if ($request->getMethod() === Request::METHOD_POST) {
            $form->submit($request);

            if ($form->isValid()) {
                $this->getCategoryService()->remove($category);

                return $this->redirect($this->generateUrl(self::ROUTE_INDEX_MANAGE));
            }
        }

        return $this->render(self::VIEW_DELETE_MANAGE, array(
                    self::KEY_FORM => $form->createView(),
                    self::KEY_CATEGORY => $category
        ));
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
     * Get image service
     *
     * @return \US\CoreBundle\Service\ImageService
     */
    protected function getImageService() {
        return $this->get(ImageService::REFERENCE);
    }

    /**
     * Get product service
     *
     * @return \US\CatalogBundle\Service\ProductService
     */
    protected function getProductService() {
        return $this->get(ProductService::REFERENCE);
    }

}

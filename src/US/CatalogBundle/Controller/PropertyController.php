<?php

namespace US\CatalogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\JsonResponse;
use US\CatalogBundle\Entity\Property;
use US\CatalogBundle\Entity\Category;
use US\CatalogBundle\Form\PropertyType;
use US\CatalogBundle\Service\CategoryService;
use US\CatalogBundle\Service\PropertyService;
use US\CatalogBundle\Interfaces\ControllerInterface;

/**
 * Property controller
 */
class PropertyController extends Controller implements ControllerInterface {

    // Views
    const VIEW_INDEX_MANAGE = 'USCatalogBundle:Manage:indexPropertiesManage.html.twig';
    const VIEW_VIEW_MANAGE = 'USCatalogBundle:Manage:viewPropertyManage.html.twig';
    const VIEW_ADD_MANAGE = 'USCatalogBundle:Manage:addPropertyManage.html.twig';
    const VIEW_EDIT_MANAGE = 'USCatalogBundle:Manage:editPropertyManage.html.twig';
    const VIEW_DELETE_MANAGE = 'USCatalogBundle:Manage:deletePropertyManage.html.twig';
    // Routes
    const ROUTE_VIEW = 'view_property';
    const ROUTE_INDEX_MANAGE = 'property_index_manage';

    /**
     * List all properties in the backoffice
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexManageAction() {
        $properties = $this->getPropertyService()->findAll();

        return $this->render(self::VIEW_INDEX_MANAGE, array(
                    self::KEY_PROPERTIES => $properties
        ));
    }

    /**
     * See property in the backoffice
     *
     * @param integer $id Property id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     * 
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function viewAction($id) {
        $property = $this->getPropertyService()->findOneWithValues($id);

        if (!$property instanceof Property) {
            throw new NotFoundHttpException(self::MSG_PROPERTY_NOT_FOUND);
        }

        return $this->render(self::VIEW_VIEW_MANAGE, array(
                    self::KEY_PROPERTY => $property
        ));
    }

    /**
     * Return all properties and values for the category in the product
     *
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addForProductAction(Request $request) {
        $categoryData = array();

        if ($request->isXmlHttpRequest()) {
            $id = $request->get(self::PARAM_ID);

            if (!is_null($id)) {
                $category = $this->getCategoryService()->find($id);

                if (!$category instanceof Category) {
                    throw new NotFoundHttpException(self::MSG_CATEGORY_NOT_FOUND);
                }

                $categoryData = $this->getCategoryService()
                        ->getCategoryData($category);
            }
        }

        return new JsonResponse($categoryData);
    }

    /**
     * Add a property
     *
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function addAction(Request $request) {
        $property = new Property();
        $form = $this->createForm(new PropertyType(), $property);

        if ($request->getMethod() === Request::METHOD_POST) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->getPropertyService()->save($property); // To get an id
                $this->getPropertyService()->setIsSelectableIfPropVal($property);
                $this->getPropertyService()->addPropertyValues($property);
                $this->getPropertyService()->save($property);

                return $this->redirect($this->generateUrl(self::ROUTE_VIEW, array(
                                    self::KEY_ID => $property->getId()
                )));
            }
        }

        return $this->render(self::VIEW_ADD_MANAGE, array(
                    self::KEY_FORM => $form->createView()
        ));
    }

    /**
     * Edit a property
     *
     * @param integer $id Property id
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function editAction($id, Request $request) {
        $property = $this->getPropertyService()->find($id);

        if (!$property instanceof Property) {
            throw new NotFoundHttpException(self::MSG_PROPERTY_NOT_FOUND);
        }

        $form = $this->createForm(new PropertyType(), $property);

        if ($request->getMethod() === Request::METHOD_POST) {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $this->getPropertyService()->setIsSelectableIfPropVal($property);
                $this->getPropertyService()->addPropertyValues($property);
                $this->getPropertyService()->save($property);

                return $this->redirect($this->generateUrl(self::ROUTE_INDEX_MANAGE));
            }
        }

        return $this->render(self::VIEW_EDIT_MANAGE, array(
                    self::KEY_FORM => $form->createView(),
                    self::KEY_PROPERTIES => $this->getPropertyService()
                            ->findAll(),
                    self::KEY_PROPERTY => $property
        ));
    }

    /**
     * Delete a property
     *
     * @param integer $id Property id
     * @param \Symfony\Component\HttpFoundation\Request $request The request
     *
     * @return \Symfony\Component\HttpFoundation\Response|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id, Request $request) {
        $property = $this->getPropertyService()->find($id);

        if (!$property instanceof Property) {
            throw new NotFoundHttpException(self::MSG_PROPERTY_NOT_FOUND);
        }

        $form = $this->createFormBuilder()->getForm();

        if ($request->getMethod() === Request::METHOD_POST) {
            $form->submit($request);

            if ($form->isValid()) {
                $this->getPropertyService()->remove($property);

                return $this->redirect($this->generateUrl(self::ROUTE_INDEX_MANAGE));
            }
        }

        return $this->render(self::VIEW_DELETE_MANAGE, array(
                    self::KEY_FORM => $form->createView(),
                    self::KEY_PROPERTY => $property
        ));
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
     * Get category service
     *
     * @return \US\CatalogBundle\Service\CategoryService
     */
    protected function getCategoryService() {
        return $this->get(CategoryService::REFERENCE);
    }

}

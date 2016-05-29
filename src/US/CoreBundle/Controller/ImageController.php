<?php

namespace US\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use US\CoreBundle\Entity\Image;
use US\CoreBundle\Form\AddImageType;

class ImageController extends Controller {

    // Show all the images in the backoffice
    public function indexAction() {
        // get the EntityManager
        $em = $this->getDoctrine()->getManager();

        // Find all images
        $images = $em
                ->getRepository('USCoreBundle:Image')
                ->findAll()
        ;

        // Clear cache of the service LiipImagineBundle
        $cacheManager = $this->container->get('liip_imagine.cache.manager');
        $cacheManager->remove();

        // Return all images
        return $this->render('USCoreBundle:Image:index.html.twig', array(
                    'images' => $images
        ));
    }

    public function viewAction($id) {
        // get the EntityManager
        $em = $this->getDoctrine()->getManager();

        $image = $em
                ->getRepository('USCoreBundle:Image')
                ->find($id)
        ;

        return $this->render('USCoreBundle:Image:view.html.twig', array(
                    'image' => $image
        ));
    }

    public function addAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $image = new Image();

        $form = $this->createForm(new AddImageType(), $image);

        if ($form->handleRequest($request)->isValid()) {

            $em->persist($image);
            $em->flush();

            return $this->redirect($this->generateUrl('image_index'));
        }

        return $this->render('USCoreBundle:Image:add.html.twig', array(
                    'form' => $form->createView()
        ));
    }

    public function editAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $image = $em
                ->getRepository('USCoreBundle:Image')
                ->find($id)
        ;

        if ($image === null) {
            throw new NotFoundHttpException('Cette image n\'existe pas');
        }

        $form = $this->createForm(new AddImageType(), $image);

        if ($form->handleRequest($request)->isValid()) {
            $em->persist($image);
            $em->flush();

            $cacheManager = $this->container->get('liip_imagine.cache.manager');
            $cacheManager->remove();

            return $this->redirect($this->generateUrl('image_index'));
        }

        return $this->render('USCoreBundle:Image:edit.html.twig', array(
                    'form' => $form->createView(),
                    'image' => $image
        ));
    }

    public function deleteAction($id) {

        $em = $this->getDoctrine()->getManager();

        $image = $em
                ->getRepository('USCoreBundle:Image')
                ->getImage($id)
        ;

        if ($image === null) {
            throw new NotFoundHttpException('Cette image n\'existe pas');
        }

        $form = $this->createFormBuilder()->getForm();
        $request = $this->getRequest();

        if ($request->getMethod() == 'POST') {
            $form->bind($request);

            if ($form->isValid()) {
                $products = $image->getProducts();
                $categories = $image->getCategories();
                $news = $image->getNews();

                foreach ($products as $product) {
                    $product->setimage(null);
                    $em->persist($product);
                }

                foreach ($categories as $category) {
                    $category->setimage(null);
                    $em->persist($category);
                }

                foreach ($news as $singleNews) {
                    $singleNews->setimage(null);
                    $em->persist($singleNews);
                }

                $em->remove($image);
                $em->flush();
            }

            return $this->redirect($this->generateUrl('image_index'));
        }

        return $this->render('USCoreBundle:Image:delete.html.twig', array(
                    'form' => $form->createView(),
                    'image' => $image
        ));
    }

    public function viewImagesRessourcesAction(Request $request) {
        if ($request->isXmlHttpRequest()) { // pour vérifier la présence d'une requete Ajax
            $em = $this->getDoctrine()->getManager();

            $images = $em
                    ->getRepository('USCoreBundle:Image')
                    ->findAll();

            $imagesReturn = [ "name" => "imagesRessources"];

            if ($images !== null) {
                foreach ($images as $image) {
                    if ($image->getExt() !== 'pdf') {
                        $imagesReturn['images'][$image->getId()] = [
                            "url" => $this->container->get('liip_imagine.cache.manager')->getBrowserPath($image->getWebPath(), 'productFilter'),
                            "alt" => $image->getAlt()
                        ];
                    }
                }
            }



            return new JsonResponse($imagesReturn);
        }
    }

}

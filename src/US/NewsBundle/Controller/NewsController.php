<?php

namespace US\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use US\NewsBundle\Entity\News;
use US\NewsBundle\Form\NewsType;

class NewsController extends Controller
{
    public function indexAction()
    {
      $em = $this->getDoctrine()->getManager();

      $news = $em
                ->getRepository('USNewsBundle:News')
                ->findNews()
      ;

      $cacheManager = $this->container->get('liip_imagine.cache.manager');
      $cacheManager->remove();

        return $this->render('USNewsBundle:News:index.html.twig', array(
                'news' => $news
            ));    }

    public function viewAction($slug)
    {
      $em = $this->getDoctrine()->getManager();

      $news = $em
                ->getRepository('USNewsBundle:News')
                ->findSingleNewsWithSlug($slug)
      ;

      if($news === null)
      {
        throw new NotFoundHttpException('Cette actualité n\'existe pas');
      }


        return $this->render('USNewsBundle:News:view.html.twig', array(
          'news' => $news
        ));
    }

    public function viewManageAction($id)
    {
      $em = $this->getDoctrine()->getManager();

      $news = $em
                ->getRepository('USNewsBundle:News')
                ->findSingleNews($id)
      ;

      if($news === null)
      {
        throw new NotFoundHttpException('Cette actualité n\'existe pas');
      }


        return $this->render('USNewsBundle:News:viewManage.html.twig', array(
          'news' => $news
        ));
    }

    public function viewNewsWidgetAction()
    {
      $em = $this->getDoctrine()->getManager();

      $news = $em
                ->getRepository('USNewsBundle:News')
                ->getNews()
      ;

      return $this->render('USNewsBundle:News:viewNewsWidget.html.twig', array(
        'news' => $news
          ));
    }

    public function addAction(Request $request)
    {
      $em = $this->getDoctrine()->getManager();

      $news = new News();

      $form = $this->createForm(new NewsType(), $news);

      if ($form->handleRequest($request)->isValid())
      {

        if($news->getIdImage() !== null)
        {
          $image = $em
                      ->getRepository('USCoreBundle:Image')
                      ->find($news->getIdImage())
          ;

          if($image !== null)
          {
            $news->setImage($image);
          }
        }

        $em->persist($news);
        $em->flush();

        return $this->redirect($this->generateUrl('us_news_index'));
      }

      return $this->render('USNewsBundle:News:add.html.twig', array(
              'form' => $form->createView()
          ));
    }

    public function editAction(Request $request, $id)
    {

      $em = $this->getDoctrine()->getManager();

      $news = $em
                ->getRepository('USNewsBundle:News')
                ->findSingleNews($id)
      ;

      $news->setIdImage($news->getImage()->getId());

      $form = $this->createForm(new NewsType(), $news);

      if ($form->handleRequest($request)->isValid())
      {

        if($news->getIdImage() !== null)
        {
          $image = $em
                      ->getRepository('USCoreBundle:Image')
                      ->find($news->getIdImage())
          ;

          if($image !== null)
          {
            $news->setImage($image);
          }
        }

        $em->persist($news);
        $em->flush();

        return $this->redirect($this->generateUrl('us_news_index'));
      }

        return $this->render('USNewsBundle:News:edit.html.twig', array(
                'form' => $form->createView(),
                'news' => $news
            ));    }

    public function deleteAction($id, Request $request)
    {
      $em = $this->getDoctrine()->getManager();

      $news = $em
                  ->getRepository('USNewsBundle:News')
                  ->find($id)
      ;

      $form = $this->createFormBuilder()->getForm();
      $request = $this->getRequest();

      if ($request->getMethod() == 'POST')
      {
        $form->bind($request);

        if ($form->isValid())
        {
          $em->remove($news);
          $em->flush();

          // Puis on redirige vers l'accueil
          return $this->redirect($this->generateUrl('us_news_index'));
        }
      }

        return $this->render('USNewsBundle:News:delete.html.twig', array(
          'form' => $form->createView(),
          'news' => $news
        ));
    }
}

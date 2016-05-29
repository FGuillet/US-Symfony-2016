<?php
namespace US\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainMenu(RequestStack $requestStack)
    {
        $menu = $this->factory->createItem('root');

        $menu->addChild('Home', array('route' => 'homepage'));
        // ... add more children

        return $menu;
    }

    public function createManageMenu(RequestStack $requestStack)
    {
      $menu = $this->factory->createItem('root');

      $menu->addChild('Accueil', array('route' => 'manage_index'));

      $menu->addChild('Articles');

      $menu->addChild('Catalogue');

      $menu['Catalogue']->addChild('Produits', array('route' => 'product_add'));
      $menu['Catalogue']->addChild('Catégories', array('route' => 'product_add'));
      $menu['Catalogue']->addChild('Propriétés', array('route' => 'product_add'));

      $menu->addChild('Actualités', array('route' => 'us_news_index'));

      $menu->addChild('Ressources', array('route' => 'image_index'));

      return $menu;
    }
}

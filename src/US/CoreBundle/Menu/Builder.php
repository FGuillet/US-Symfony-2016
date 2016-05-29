<?php
namespace US\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function manageMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

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

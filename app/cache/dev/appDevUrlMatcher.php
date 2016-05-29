<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/css/5c42856')) {
            // _assetic_5c42856
            if ($pathinfo === '/css/5c42856.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '5c42856',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_5c42856',);
            }

            if (0 === strpos($pathinfo, '/css/5c42856_part_1_')) {
                // _assetic_5c42856_0
                if ($pathinfo === '/css/5c42856_part_1_flexslider_1.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5c42856',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_5c42856_0',);
                }

                // _assetic_5c42856_1
                if ($pathinfo === '/css/5c42856_part_1_styles_2.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5c42856',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_5c42856_1',);
                }

                // _assetic_5c42856_2
                if ($pathinfo === '/css/5c42856_part_1_z-media_3.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5c42856',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_5c42856_2',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js')) {
            if (0 === strpos($pathinfo, '/js/5f2d023')) {
                // _assetic_5f2d023
                if ($pathinfo === '/js/5f2d023.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5f2d023',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_5f2d023',);
                }

                // _assetic_5f2d023_0
                if ($pathinfo === '/js/5f2d023_modernizr.custom.14671_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '5f2d023',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_5f2d023_0',);
                }

            }

            if (0 === strpos($pathinfo, '/js/2ad5a9f')) {
                // _assetic_2ad5a9f
                if ($pathinfo === '/js/2ad5a9f.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '2ad5a9f',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_2ad5a9f',);
                }

                if (0 === strpos($pathinfo, '/js/2ad5a9f_part_1_')) {
                    // _assetic_2ad5a9f_0
                    if ($pathinfo === '/js/2ad5a9f_part_1_jquery.flexslider_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '2ad5a9f',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_2ad5a9f_0',);
                    }

                    // _assetic_2ad5a9f_1
                    if ($pathinfo === '/js/2ad5a9f_part_1_script_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '2ad5a9f',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_2ad5a9f_1',);
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/css/33a7130')) {
            // _assetic_33a7130
            if ($pathinfo === '/css/33a7130.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '33a7130',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_33a7130',);
            }

            // _assetic_33a7130_0
            if ($pathinfo === '/css/33a7130_part_1_styles_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '33a7130',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_33a7130_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js/bcbb3cd')) {
            // _assetic_bcbb3cd
            if ($pathinfo === '/js/bcbb3cd.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'bcbb3cd',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_bcbb3cd',);
            }

            // _assetic_bcbb3cd_0
            if ($pathinfo === '/js/bcbb3cd_modernizr.custom.14671_1.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'bcbb3cd',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_bcbb3cd_0',);
            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // us_section_index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'us_section_index');
            }

            return array (  '_controller' => 'US\\SectionBundle\\Controller\\SectionController::indexAction',  '_route' => 'us_section_index',);
        }

        // us_section_view
        if (preg_match('#^/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'us_section_view')), array (  '_controller' => 'US\\SectionBundle\\Controller\\SectionController::viewAction',));
        }

        // us_section_add
        if ($pathinfo === '/addSection') {
            return array (  '_controller' => 'US\\SectionBundle\\Controller\\SectionController::addAction',  '_route' => 'us_section_add',);
        }

        // us_section_edit
        if ($pathinfo === '/editSection') {
            return array (  '_controller' => 'US\\SectionBundle\\Controller\\SectionController::editAction',  '_route' => 'us_section_edit',);
        }

        // us_section_delete
        if ($pathinfo === '/deleteSection') {
            return array (  '_controller' => 'US\\SectionBundle\\Controller\\SectionController::deleteAction',  '_route' => 'us_section_delete',);
        }

        // us_news_index
        if ($pathinfo === '/manage/news') {
            return array (  '_controller' => 'US\\NewsBundle\\Controller\\NewsController::indexAction',  '_route' => 'us_news_index',);
        }

        // us_news_view
        if (0 === strpos($pathinfo, '/actualite') && preg_match('#^/actualite/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'us_news_view')), array (  '_controller' => 'US\\NewsBundle\\Controller\\NewsController::viewAction',));
        }

        if (0 === strpos($pathinfo, '/manage')) {
            // us_news_view_manage
            if (0 === strpos($pathinfo, '/manage/fiche') && preg_match('#^/manage/fiche/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'us_news_view_manage')), array (  '_controller' => 'US\\NewsBundle\\Controller\\NewsController::viewManageAction',));
            }

            // us_news_add
            if ($pathinfo === '/manage/news/add') {
                return array (  '_controller' => 'US\\NewsBundle\\Controller\\NewsController::addAction',  '_route' => 'us_news_add',);
            }

            // us_news_edit
            if (0 === strpos($pathinfo, '/manage/edit-news') && preg_match('#^/manage/edit\\-news/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'us_news_edit')), array (  '_controller' => 'US\\NewsBundle\\Controller\\NewsController::editAction',));
            }

            // us_news_delete
            if (0 === strpos($pathinfo, '/manage/delete-news') && preg_match('#^/manage/delete\\-news/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'us_news_delete')), array (  '_controller' => 'US\\NewsBundle\\Controller\\NewsController::deleteAction',));
            }

            if (0 === strpos($pathinfo, '/manage/ressources')) {
                // image_index
                if (rtrim($pathinfo, '/') === '/manage/ressources') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'image_index');
                    }

                    return array (  '_controller' => 'US\\CoreBundle\\Controller\\ImageController::indexAction',  '_route' => 'image_index',);
                }

                if (0 === strpos($pathinfo, '/manage/ressourcesimages')) {
                    // image_view
                    if (0 === strpos($pathinfo, '/manage/ressourcesimages/view') && preg_match('#^/manage/ressourcesimages/view/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_view')), array (  '_controller' => 'US\\CoreBundle\\Controller\\ImageController::viewAction',));
                    }

                    // us_image_add
                    if ($pathinfo === '/manage/ressourcesimages/add') {
                        return array (  '_controller' => 'US\\CoreBundle\\Controller\\ImageController::addAction',  '_route' => 'us_image_add',);
                    }

                    // image_edit
                    if (0 === strpos($pathinfo, '/manage/ressourcesimages/edit') && preg_match('#^/manage/ressourcesimages/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_edit')), array (  '_controller' => 'US\\CoreBundle\\Controller\\ImageController::editAction',));
                    }

                }

                // image_delete
                if (0 === strpos($pathinfo, '/manage/ressources/images/delete') && preg_match('#^/manage/ressources/images/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_delete')), array (  '_controller' => 'US\\CoreBundle\\Controller\\ImageController::deleteAction',));
                }

                // view_images_ressources
                if ($pathinfo === '/manage/ressources/view/ressources') {
                    return array (  '_controller' => 'US\\CoreBundle\\Controller\\ImageController::viewImagesRessourcesAction',  '_route' => 'view_images_ressources',);
                }

            }

            // manage_index
            if (rtrim($pathinfo, '/') === '/manage') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'manage_index');
                }

                return array (  '_controller' => 'US\\CoreBundle\\Controller\\ManageController::indexAction',  '_route' => 'manage_index',);
            }

        }

        // product_index
        if (rtrim($pathinfo, '/') === '/catalog') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'product_index');
            }

            return array (  '_controller' => 'US\\CatalogBundle\\Controller\\ProductController::indexAction',  '_route' => 'product_index',);
        }

        // product_index_manage
        if ($pathinfo === '/manage/catalog/products') {
            return array (  '_controller' => 'US\\CatalogBundle\\Controller\\ProductController::indexManageAction',  '_route' => 'product_index_manage',);
        }

        // product_view
        if (0 === strpos($pathinfo, '/catalog/product') && preg_match('#^/catalog/product/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_view')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\ProductController::viewAction',));
        }

        // product_view_manage
        if (0 === strpos($pathinfo, '/manage/catalog/product') && preg_match('#^/manage/catalog/product/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'product_view_manage')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\ProductController::viewManageAction',));
        }

        // view_products_category
        if (0 === strpos($pathinfo, '/catalog') && preg_match('#^/catalog/(?P<slug>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_products_category')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\ProductController::listByCategoryAction',));
        }

        if (0 === strpos($pathinfo, '/manage/catalog')) {
            // product_add
            if ($pathinfo === '/manage/catalog/add') {
                return array (  '_controller' => 'US\\CatalogBundle\\Controller\\ProductController::addAction',  '_route' => 'product_add',);
            }

            // edit_product
            if (0 === strpos($pathinfo, '/manage/catalog/edit') && preg_match('#^/manage/catalog/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_product')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\ProductController::editAction',));
            }

            // delete_product
            if (0 === strpos($pathinfo, '/manage/catalog/delete') && preg_match('#^/manage/catalog/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_product')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\ProductController::deleteAction',));
            }

            if (0 === strpos($pathinfo, '/manage/catalog/categor')) {
                // category_index_manage
                if ($pathinfo === '/manage/catalog/categories') {
                    return array (  '_controller' => 'US\\CatalogBundle\\Controller\\CategoryController::indexManageAction',  '_route' => 'category_index_manage',);
                }

                // view_category
                if (0 === strpos($pathinfo, '/manage/catalog/category') && preg_match('#^/manage/catalog/category/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_category')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\CategoryController::viewAction',));
                }

            }

            // add_product_category
            if ($pathinfo === '/manage/catalog/addCategory') {
                return array (  '_controller' => 'US\\CatalogBundle\\Controller\\CategoryController::addAction',  '_route' => 'add_product_category',);
            }

            // edit_category
            if (0 === strpos($pathinfo, '/manage/catalog/edit/category') && preg_match('#^/manage/catalog/edit/category/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_category')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\CategoryController::editAction',));
            }

            // delete_category
            if (0 === strpos($pathinfo, '/manage/catalog/category/delete') && preg_match('#^/manage/catalog/category/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_category')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\CategoryController::deleteAction',));
            }

            if (0 === strpos($pathinfo, '/manage/catalog/propert')) {
                // property_index_manage
                if ($pathinfo === '/manage/catalog/properties') {
                    return array (  '_controller' => 'US\\CatalogBundle\\Controller\\PropertyController::indexManageAction',  '_route' => 'property_index_manage',);
                }

                // view_property
                if (0 === strpos($pathinfo, '/manage/catalog/property') && preg_match('#^/manage/catalog/property/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'view_property')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\PropertyController::viewAction',));
                }

            }

            // add_property
            if ($pathinfo === '/manage/catalog/addProperty') {
                return array (  '_controller' => 'US\\CatalogBundle\\Controller\\PropertyController::addAction',  '_route' => 'add_property',);
            }

            // edit_property
            if (0 === strpos($pathinfo, '/manage/catalog/edit/Property') && preg_match('#^/manage/catalog/edit/Property/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'edit_property')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\PropertyController::editAction',));
            }

            // delete_property
            if (0 === strpos($pathinfo, '/manage/catalog/property/delete') && preg_match('#^/manage/catalog/property/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'delete_property')), array (  '_controller' => 'US\\CatalogBundle\\Controller\\PropertyController::deleteAction',));
            }

        }

        // add_properties_for_product
        if ($pathinfo === '/catalog/change/values') {
            return array (  '_controller' => 'US\\CatalogBundle\\Controller\\PropertyController::addForProductAction',  '_route' => 'add_properties_for_product',);
        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        if (0 === strpos($pathinfo, '/m')) {
            if (0 === strpos($pathinfo, '/media/cache/resolve')) {
                // liip_imagine_filter_runtime
                if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/rc/(?P<hash>[^/]++)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_liip_imagine_filter_runtime;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter_runtime')), array (  '_controller' => 'liip_imagine.controller:filterRuntimeAction',));
                }
                not_liip_imagine_filter_runtime:

                // liip_imagine_filter
                if (preg_match('#^/media/cache/resolve/(?P<filter>[A-z0-9_\\-]*)/(?P<path>.+)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_liip_imagine_filter;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'liip_imagine_filter')), array (  '_controller' => 'liip_imagine.controller:filterAction',));
                }
                not_liip_imagine_filter:

            }

            if (0 === strpos($pathinfo, '/manage')) {
                if (0 === strpos($pathinfo, '/manager/login')) {
                    // fos_user_security_login
                    if ($pathinfo === '/manager/login') {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_fos_user_security_login;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                    }
                    not_fos_user_security_login:

                    // fos_user_security_check
                    if ($pathinfo === '/manager/login_check') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_fos_user_security_check;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                    }
                    not_fos_user_security_check:

                }

                // fos_user_security_logout
                if ($pathinfo === '/manage/logout') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_security_logout;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
                }
                not_fos_user_security_logout:

            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_fos_user_profile_edit;
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }
            not_fos_user_profile_edit:

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_registration_register;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }
                not_fos_user_registration_register:

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

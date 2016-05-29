<?php

namespace US\CatalogBundle\Interfaces;

/**
 * Controller interface
 */
interface ControllerInterface {

    // Parameters
    const PARAM_ID = 'id';
    // Keys
    const KEY_CATEGORIES = 'categories';
    const KEY_CATEGORY = 'category';
    const KEY_PRODUCTS = 'products';
    const KEY_PRODUCT = 'product';
    const KEY_PROPERTIES = 'properties';
    const KEY_PROPERTY = 'property';
    const KEY_ID = 'id';
    const KEY_FORM = 'form';
    const KEY_SLUG = 'slug';
    // Messages
    const MSG_PRODUCT_NOT_FOUND = 'Ce produit n’existe pas';
    const MSG_CATEGORY_NOT_FOUND = 'Cette catégorie n’existe pas';
    const MSG_PROPERTY_NOT_FOUND = 'Cette propriété n’existe pas';
    // Flash message types
    const FL_TYPE_NOTICE = 'notice';
    const FL_TYPE_ERROR = 'error';
    const FL_TYPE_INFO = 'info';
    const FL_TYPE_SUCCESS = 'success';
    const FL_TYPE_WARNING = 'warning';

}

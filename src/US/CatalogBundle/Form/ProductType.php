<?php

namespace US\CatalogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text')
                ->add('description', 'textarea')
                ->add('slug', 'text', array('required' => false))
                ->add('idImage', 'hidden')
                ->add('category', 'entity', array(
                    'class' => 'USCatalogBundle:Category',
                    'choice_label' => 'name',
                    'multiple' => false,
                    'expanded' => false
                ))
                ->add('propertyValues', 'collection', array(
                    'type' => new PropertyValueType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,
                    'required' => false
                ))
                ->add('save', 'submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'US\CatalogBundle\Entity\Product'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'us_catalogbundle_product';
    }

}

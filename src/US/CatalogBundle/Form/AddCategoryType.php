<?php

namespace US\CatalogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddCategoryType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text')
                ->add('slug', 'text', array('required' => false))
                ->add('properties', 'entity', array(
                    'class' => 'USCatalogBundle:Property',
                    'choice_label' => 'name',
                    'multiple' => true,
                    'expanded' => false,
                    'required' => false
                ))
                ->add('idImage', 'hidden')
                ->add('save', 'submit')
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'US\CatalogBundle\Entity\Category'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'us_catalogbundle_addcategory';
    }

}

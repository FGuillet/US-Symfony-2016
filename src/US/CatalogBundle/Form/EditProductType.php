<?php

namespace US\CatalogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditProductType extends AbstractType {

    /**
     * Build form
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('name', 'text')
                ->add('description', 'textarea')
                ->add('idImage', 'hidden')
        ;

        $builder->add('category', 'entity', array(
            'class' => 'USCatalogBundle:TypeProduct',
            'choice_label' => 'name',
            'multiple' => false,
            'expanded' => false
        ));

        $builder->add('propertyValues', 'collection', array(
            'type' => new PropertyValueType(),
            'allow_add' => true,
            'allow_delete' => true,
            'by_reference' => true,
            'required' => true
        ));

        $builder->add('save', 'submit');
    }

    /**
     * Configure options
     *
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'US\CatalogBundle\Entity\Product'
        ));
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName() {
        return 'us_catalogbundle_edit_product';
    }

}

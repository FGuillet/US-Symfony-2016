<?php

namespace US\CatalogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use US\CatalogBundle\Form\PropertyValueType;

class PropertyType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', 'text')
                ->add('propertyValues', 'collection', array(
                    'type' => new PropertyValueType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => true,
                    'cascade_validation' => true,
                    'required' => false
        ));

        $builder->add('save', 'submit');
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'US\CatalogBundle\Entity\Property'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'us_catalogbundle_property';
    }

}

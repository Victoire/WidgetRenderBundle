<?php

namespace Victoire\Widget\RenderBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\CmsBundle\Form\EntityProxyFormType;
use Victoire\CmsBundle\Form\WidgetType;
use Victoire\Widget\RenderBundle\DataTransformer\JsonToArrayTransformer;


/**
 * WidgetRender form type
 */
class WidgetRenderType extends WidgetType
{

    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //choose form mode
        if ($this->entity_name === null) {
            //if no entity is given, we generate the static form
            $transformer = new JsonToArrayTransformer();
            $builder
                ->add('mode', 'choice', array(
                    'choices'  => array(
                        'route'            => 'form.render.mode.choice.route',
                        'widget_reference' => 'form.render.mode.choice.widget_reference'
                    )
                ))
                ->add('route')
                ->add($builder->create('params', 'text')->addModelTransformer($transformer))
                ->add('widget');

        } else {
            //else, WidgetType class will embed a EntityProxyType for given entity
            parent::buildForm($builder, $options);
        }


    }


    /**
     * bind form to WidgetRender entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\RenderBundle\Entity\WidgetRender',
            'widget'             => 'render',
            'translation_domain' => 'victoire'
        ));
    }


    /**
     * get form name
     */
    public function getName()
    {
        return 'appventus_victoirecmsbundle_widgetrendertype';
    }
}

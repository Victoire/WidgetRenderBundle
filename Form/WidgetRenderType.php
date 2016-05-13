<?php

namespace Victoire\Widget\RenderBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Widget\RenderBundle\DataTransformer\JsonToArrayTransformer;
use Victoire\Widget\RenderBundle\Entity\WidgetRender;

/**
 * WidgetRender form type.
 */
class WidgetRenderType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //
        parent::buildForm($builder, $options);

        $namespace = $options['namespace'];
        $businessEntityId = $options['businessEntityId'];

        if ($businessEntityId !== null) {
            if ($namespace === null) {
                throw new \Exception('The namespace is mandatory if the business_entity_id is given.');
            }
        }

        //if no entity is given, we generate the static form
        $transformer = new JsonToArrayTransformer();
        $builder
            ->add('kind', ChoiceType::class, [
                'label'    => 'form.render.kind.label',
                'choices'  => [
                    'form.render.kind.choice.route'            => WidgetRender::KIND_ROUTE,
                    'form.render.kind.choice.widget_reference' => WidgetRender::KIND_WIDGET_REFERENCE,
                ],
                'choices_as_values' => true,
            ])
            ->add('route', null, ['label' => 'form.render.route.label'])
            ->add($builder->create('params', 'text', [
                'label'          => 'form.render.route.params.label',
                'vic_help_block' => 'form.appventus_victoirecorebundle_widgetrendertype.children.params.vic_help_block',
                ]
            )->addModelTransformer($transformer))
            ->add('relatedWidget', null, ['label' => 'form.render.widget_reference.label']);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\RenderBundle\Entity\WidgetRender',
            'widget'             => 'render',
            'translation_domain' => 'victoire',
        ]);
    }
}

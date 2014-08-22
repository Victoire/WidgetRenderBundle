<?php

namespace Victoire\Widget\RenderBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class VictoireWidgetRenderExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');

        //  Given I am in a BEPP
        //   When I use a render widget with a route containing parameters such as the id of the entity
        //   Then I should see a static content (the path without the parameter) instead of the error "invalid route parameter '' given"
        //     So I override the "path" twig function
        $container->setParameter('twig.extension.routing.class', 'Victoire\Widget\RenderBundle\Twig\VicRoutingExtension');
    }
}

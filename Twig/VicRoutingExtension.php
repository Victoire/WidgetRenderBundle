<?php
namespace Victoire\Widget\RenderBundle\Twig;

use Symfony\Bridge\Twig\Extension\RoutingExtension;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * class VicRoutingExtension
 */
class VicRoutingExtension extends RoutingExtension
{
    protected $myGenerator;

    public function __construct(UrlGeneratorInterface $myGenerator)
    {
        $this->myGenerator = $myGenerator;
        parent::__construct($myGenerator);
    }

    public function getPath($name, $parameters = array(), $relative = false)
    {
        foreach($parameters as $_key => $_value) {
            //if the value contains a curly bracket, it means that there is no entity to render with
            if(strstr($_value, '{') != null) {
                return $this->myGenerator->generate('vic_widget_render_getStaticContent', array('path' => $name), $relative ? UrlGeneratorInterface::RELATIVE_PATH : UrlGeneratorInterface::ABSOLUTE_PATH);
            }
        }

        return $this->myGenerator->generate($name, $parameters, $relative ? UrlGeneratorInterface::RELATIVE_PATH : UrlGeneratorInterface::ABSOLUTE_PATH);
    }
}
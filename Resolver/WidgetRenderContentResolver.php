<?php

namespace Victoire\Widget\RenderBundle\Resolver;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Victoire\Bundle\QueryBundle\Helper\QueryHelper;
use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\FilterBundle\Filter\Chain\FilterChain;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;
use Victoire\Widget\RenderBundle\DataTransformer\JsonToArrayTransformer;

class WidgetRenderContentResolver extends BaseWidgetContentResolver
{
    /**
     * Get the business entity content
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetBusinessEntityContent(Widget $widget)
    {
        if($entity = $widget->getEntity()) {
            //Read into route parameters with twig
            $this->readIntoWidgetRouteParameters($widget);
        }

        $parameters = $this->getWidgetStaticContent($widget);
        $this->populateParametersWithWidgetFields($widget, $entity, $parameters);

        return $parameters;
    }

    /**
     * Get the content of the widget by the entity linked to it
     *
     * @param Widget $widget
     *
     * @return string
     *
     */
    public function getWidgetEntityContent(Widget $widget)
    {
        if($entity = $widget->getEntity()) {
            //Read into route parameters with twig
            $this->readIntoWidgetRouteParameters($widget);
        }

        $parameters = $this->getWidgetStaticContent($widget);
        $this->populateParametersWithWidgetFields($widget, $entity, $parameters);

        return $parameters;
    }

    public function readIntoWidgetRouteParameters(Widget $widget)
    {
        $entity = $widget->getEntity();

        //Creates a new twig environment
        $twig = new \Twig_Environment(new \Twig_Loader_String());

        //add global values for `entity` and `businessEntityName`
        $twig->addGlobal('entity', $entity);
        $twig->addGlobal($widget->getBusinessEntityName(), $entity);

        //Get widget route parameters
        $params = array();
        foreach ($widget->getParams() as $key => $_routeParameter) {
            $params[$key] = $twig->render($_routeParameter);
        }
        $widget->setParams($params);
    }
}

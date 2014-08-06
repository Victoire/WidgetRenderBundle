<?php
namespace Victoire\Widget\RenderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetRender
 *
 * @ORM\Table("vic_widget_render")
 * @ORM\Entity
 */
class WidgetRender extends Widget
{
    const KIND_ROUTE = 'route';
    const KIND_WIDGET_REFERENCE = 'relatedWidget_reference';

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", nullable=true)
     */
    protected $route;

    /**
     * @var array
     *
     * @ORM\Column(name="params", type="array", nullable=true)
     */
    protected $params;

    /**
     * @var array
     *
     * @ORM\Column(name="kind", type="string", nullable=true)
     */
    protected $kind = self::KIND_ROUTE;

    /**
     * @var array
     *
     * @ORM\ManyToOne(targetEntity="\Victoire\Bundle\WidgetBundle\Entity\Widget")
     * @ORM\JoinColumn(name="related_widget_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     */
    protected $relatedWidget;

    /**
     * route getter
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * route settter
     *
     * @param string $route
     *
     * @return WidgetRender
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * params settter
     *
     * @return WidgetRender
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * params settter
     *
     * @param array $params
     *
     * @return WidgetRender
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * kind gettter
     * @return string kind name
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * kind settter
     *
     * @param string $kind
     *
     * @return WidgetRender
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * relatedWidget gettter
     * @return Widget relatedWidget
     */
    public function getRelatedWidget()
    {
        return $this->relatedWidget;
    }

    /**
     * relatedWidget settter
     *
     * @param Widget $relatedWidget
     *
     * @return WidgetRender
     */
    public function setRelatedWidget($relatedWidget)
    {
        $this->relatedWidget = $relatedWidget;

        return $this;
    }
}

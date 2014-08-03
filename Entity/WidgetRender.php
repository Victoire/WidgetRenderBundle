<?php
namespace Victoire\Widget\RenderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\CoreBundle\Entity\Widget;

/**
 * WidgetRender
 *
 * @ORM\Table("vic_widget_render")
 * @ORM\Entity
 */
class WidgetRender extends Widget
{
    const MODE_ROUTE = 'route';
    const MODE_WIDGET_REFERENCE = 'widget_reference';

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
     * @ORM\Column(name="mode", type="string", nullable=true)
     */
    protected $mode = self::MODE_ROUTE;

    /**
     * @var array
     *
     * @ORM\ManyToOne(targetEntity="\Victoire\Bundle\CoreBundle\Entity\Widget")
     * @ORM\JoinColumn(name="widget_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     */
    protected $widget;

    /**
     * initialize params
     */
    public function __construct()
    {
        $this->params = array();
    }

    /**
     * route gettter
     * @return string route name
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * route settter
     *
     * @param string route name
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
     * @param array params name
     * @return WidgetRender
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * params settter
     *
     * @param array params name
     * @return WidgetRender
     */
    public function setParams($params)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * mode gettter
     * @return string mode name
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * mode settter
     *
     * @param string mode name
     * @return WidgetRender
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * widget gettter
     * @return Widget widget
     */
    public function getWidget()
    {
        return $this->widget;
    }

    /**
     * widget settter
     *
     * @param Widget widget name
     * @return WidgetRender
     */
    public function setWidget($widget)
    {
        $this->widget = $widget;

        return $this;
    }
}

<?php
namespace Victoire\RenderBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\CmsBundle\Entity\Widget;

/**
 * WidgetRender
 *
 * @ORM\Table("cms_widget_render")
 * @ORM\Entity
 */
class WidgetRender extends Widget
{
    use \Victoire\CmsBundle\Entity\Traits\WidgetTrait;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string")
     */
    protected $route;

    /**
     * @var array
     *
     * @ORM\Column(name="param", type="array")
     */
    protected $params;

    public function __construct() {
        $this->params = array();
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function setRoute($route)
    {
        $this->route = $route;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function setParams($params)
    {
        $this->params = $params;
    }
}


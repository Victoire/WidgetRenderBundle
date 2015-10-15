<?php

namespace Victoire\Widget\RenderBundle\Controller;

use AppVentus\Awesome\ShortcutsBundle\Controller\AwesomeController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * WidgetRender controller.
 *
 * @Route("/vic/widget/render")
 */
class WidgetRenderController extends AwesomeController
{
    /**
     * Render static content.
     *
     * @Route("/{path}", name="vic_widget_render_getStaticContent")
     * @Template("VictoireWidgetRenderBundle::_staticContent.html.twig")
     *
     * @return array|Response the response
     */
    public function getStaticContentAction($path)
    {
        return ['path' => $path];
    }
}

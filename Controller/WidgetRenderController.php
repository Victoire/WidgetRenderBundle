<?php

namespace Victoire\Widget\RenderBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * WidgetRender controller.
 *
 * @Route("/vic/widget/render")
 */
class WidgetRenderController extends Controller
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

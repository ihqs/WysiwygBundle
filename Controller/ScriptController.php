<?php

namespace IHQS\WysiwygBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

/**
 * A simple controller to write script markups
 *
 * @author  Antoine Berranger <antoine@ihqs.net>
 */
class ScriptController extends BaseController
{
    /**
     * Intialization of script markups.
     * Loading the proper libraries depending on the configuration and specifying settings and theme.
     * 
     * @return  Response    A Response instance
     */
    public function initAction()
    {
        return $this->render(
            'IHQSWysiwygBundle:Script:init.html.twig',
            array(
                'selector'      => $this->container->getParameter('ihqs_wysiwyg.selector'),
				'editor'		=> $this->container->get('ihqs_wysiwyg.editor'),
            )
        );
    }
}
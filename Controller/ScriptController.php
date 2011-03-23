<?php

namespace IHQS\WysiwygBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as BaseController;

class ScriptController extends BaseController
{
    public function initAction()
    {
        return $this->render(
            'IHQSWysiwygBundle:Script:init.html.twig',
            array(
                'library_src'   => $this->container->get('ihqs_wysiwyg.editor')->getLibPath(),
 
                'selector'      => $this->container->getParameter('ihqs_wysiwyg.selector'),
                'library'       => $this->container->getParameter('ihqs_wysiwyg.editor.library'),
                'set'           => $this->container->getParameter('ihqs_wysiwyg.editor.set'),
                'theme'         => $this->container->getParameter('ihqs_wysiwyg.editor.theme'),
            )
        );
    }
}
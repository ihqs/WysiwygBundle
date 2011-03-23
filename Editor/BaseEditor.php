<?php

namespace IHQS\WysiwygBundle\Editor;

abstract class BaseEditor
{
    protected $baseUri = '/bundles/ihqswysiwyg/js';
    protected $libUri;
    
    public function getLibPath()
    {
        return $this->baseUri . '/' . $this->libUri;
    }

    function isThemeAvailable($theme)
    {

    }

    function isSetAvailable($set)
    {
        
    }

    public static function factory($editor)
    {
        $editor = 'IHQS\\WysiwygBundle\\Editor\\' . $editor;
        return$editor;
    }
}
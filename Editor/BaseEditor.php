<?php

namespace IHQS\Editor\BaseEditor;

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
}
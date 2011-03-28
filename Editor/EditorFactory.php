<?php

namespace IHQS\WysiwygBundle\Editor;

/**
 * Providing a generic factory to create proper Editor instances
 *
 * @todo	clean this
 * 
 * @author	Antoine Berranger <antoine@ihqs.net>
 */
class EditorFactory
{
	/**
	 * "Factory" method to get class for specified editor
	 *
	 * @todo	remove or upgrade this factory to enable custom Editor classes written by users and clean this ugly method
	 *
	 * @param	string	$editor	Name of the editor we want to use
	 * @return	string			Path to the class for this editor
	 */
    public static function factory($editor)
    {
        $editor = 'IHQS\\WysiwygBundle\\Editors\\' . $editor;
        return $editor;
    }
}

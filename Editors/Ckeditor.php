<?php

namespace IHQS\WysiwygBundle\Editors;

use IHQS\WysiwygBundle\Editor\Editor as BaseEditor;

/**
 * Class Editor for the Ckeditor library
 *
 * @author	Antoine Berranger <antoine@ihqs.net>
 */
class Ckeditor extends BaseEditor
{
	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	public function getLibUri()
	{
		return $this->baseUri . '/vendor/ckeditor/ckeditor_basic.js';
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	public function getAvailableThemes()
	{
		return array(

		);
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	public function getAvailableSets()
	{
		return array(

		);
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	public function getName()
	{
		return 'Ckeditor';
	}
}
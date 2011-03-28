<?php

namespace IHQS\WysiwygBundle\Editor;

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
	protected function getLibUri()
	{
		return $this->basePath . '/vendor/ckeditor/ckeditor_basic.js';
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	protected function getAvailableThemes()
	{
		return array(

		);
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	protected function getAvailableSets()
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
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
		return $this->baseUri . '/vendor/ckeditor/ckeditor.js';
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	public function getAvailableThemes()
	{
		return array(
			'default',
			'kama',
			'office2003',
			'v2',
		);
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	public function getAvailableSets()
	{
		return array(
			'default',
			'full'
		);
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	public function getName()
	{
		return 'ckeditor';
	}
}
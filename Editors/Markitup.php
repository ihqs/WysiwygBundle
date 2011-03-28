<?php

namespace IHQS\WysiwygBundle\Editors;

use IHQS\WysiwygBundle\Editor\Editor as BaseEditor;

/**
 * Class Editor for the markitup! library
 *
 * @author	Antoine Berranger <antoine@ihqs.net>
 */
class Markitup extends BaseEditor
{
	/**
     * @see \IHQS\WysiwygBundle\Editor\EditorInterface
     */
	public function getLibUri()
	{
		return $this->basePath . '/vendor/markitup/markitup/jquery.markitup.js';
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\EditorInterface
     */
	public function getAvailableThemes()
	{
		return array(
			'default',
			'markitup',
		);
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\EditorInterface
     */
	public function getAvailableSets()
	{
		return array(
			'default',
		);
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\EditorInterface
     */
	public function getName()
	{
		return 'markitup';
	}
}
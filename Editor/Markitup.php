<?php

namespace IHQS\WysiwygBundle\Editor;

/**
 * Class Editor for the markitup! library
 *
 * @author	Antoine Berranger <antoine@ihqs.net>
 */
class Markitup extends BaseEditor
{
	/**
     * @see \IHQS\WysiwygBundle\Editor\BaseEditor
     */
	protected function getLibUri()
	{
		return $this->basePath . '/vendor/markitup/markitup/jquery.markitup.js';
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
}
<?php

namespace IHQS\WysiwygBundle\Editor;

/**
 * Astract Editor.
 * 
 * @author	Antoine Berranger <antoine@ihqs.net>
 */
abstract class Editor implements EditorInterface
{
	/** @var string	$baseUri	Base uri where to find our javascript files */
    protected $baseUri = '/bundles/ihqswysiwyg/js';

	/** @var string	$settings	Settings we wanna use */
	protected $settings;

	/** @var string	$theme		Theme we wanna use */
	protected $theme;

	/**
	 * Class constructor
	 *
	 * @param	string	$settings	Settings we wanna use
	 * @param	string	$theme		Theme we wanna use
	 */
	public function __construct($settings, $theme)
	{
		$this->setTheme($theme);
		$this->setSettings($settings);
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\EditorInterface
     */
	public function getTheme()
	{
		return $this->theme;
	}

	/**
     * @see \IHQS\WysiwygBundle\Editor\EditorInterface
     */
	public function getSettings()
	{
		return $this->settings;
	}

	/**
     * Checking if specified theme is available for this editor,
	 * then set it as class attribute.
     *
     * @param	string	name of the theme we want to use
	 * @return	EditorInterface
	 *
	 * @throws	\InvalidArgumentException	Theme is unknown for this library
     */
    public function setTheme($theme)
    {
		if(!in_array($theme, $this->getAvailableThemes()))
		{
			throw new \InvalidArgumentException('Theme "' . $theme . '" is unknown for this library');
		}

		$this->theme = $theme;
		return $this;
    }
 
	/**
     * Checking if specified settings are available for this editor,
	 * then set it as class attribute.
     *
     * @param	string	name of the set we want to use
	 * @return	EditorInterface
	 * 
	 * @throws	\InvalidArgumentException	Set is unknown for this library
     */
    public function setSettings($set)
    {
		if(!in_array($set, $this->getAvailableSets()))
		{
			throw new \InvalidArgumentException('Set "' . $set . '" is unknown for this library');
		}

		$this->settings = $set;
		return $this;
    }
}
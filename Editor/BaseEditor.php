<?php

namespace IHQS\WysiwygBundle\Editor;

/**
 * Astract Editor.
 * Also provides a static factory method to build the proper class.
 *
 * @author	Antoine Berranger <antoine@ihqs.net>
 */
abstract class BaseEditor
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
		$this->settings = $settings;
		$this->theme = $theme;

		$this->checkSettings();
		$this->checkTheme();
	}


	/**
     * Where we'll find the library uri ?
     *
     * @return	string	uri of the library
     */
	abstract protected function getLibUri();

	/**
     * Get available themes for this library
     *
     * @return	array	Available themes
     */
	abstract protected function getAvailableThemes();

	/**
     * Get available sets for this library
     *
     * @return	array	Available sets
     */
	abstract protected function getAvailableSets();

	/**
     * Checking if specified theme is available for this editor
     *
	 * @todo	implement it :p
     *
     * @param	string	name of the theme we want to use
	 * @throws	\InvalidationArgumentException	Theme is unknown for this library
     */
    public function checkTheme($theme)
    {

    }

	/**
     * Checking if specified settings are available for this editor
     *
	 * @todo	implement it :p
     *
     * @param	string	name of the set we want to use
	 * @throws	\InvalidationArgumentException	Set is unknown for this library
     */
    public function checkSettings($set)
    {
        
    }

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
        $editor = 'IHQS\\WysiwygBundle\\Editor\\' . $editor;
        return $editor;
    }
}
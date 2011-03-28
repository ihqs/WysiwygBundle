<?php

namespace IHQS\WysiwygBundle\Editor;

interface EditorInterface
{
	/**
	 * Get current theme's name
	 *
	 * @return string
	 */
	function getTheme();
	
	/**
	 * Get current settings' name
	 *
	 * @return string
	 */
	function getSettings();
	
	/**
     * Where we'll find the library uri ?
     *
     * @return	string	uri of the library
     */
	function getLibUri();

	/**
     * Get available themes for this library
     *
     * @return	array	Available themes
     */
	function getAvailableThemes();

	/**
     * Get available sets for this library
     *
     * @return	array	Available sets
     */
	function getAvailableSets();

	/**
	 * Get library name
	 *
	 * @return	string	Name of the javascript library
	 */
	function getName();
}

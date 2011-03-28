# WysiwygBundle

This Symfony2 Bundle is supported by "Vu Par Digital..." (http://www.vupar.fr), french web and communication agency in Nantes, France.

The aim of this bundle is to nest miscellanous wysiwyg editors to allow you to use them with minimum configuration

## TODO

This bundle is in DEVEL mode
 * enable custom editors, custom sets, custom themes
 * add other editors, sets and themes

## Installation

 git submodule add git://github.com/ihqs/WysiwygBundle.git src/IHQS/WysiwygBundle

Modify your autoloader if you didn't installer another IHQS Bundle yet.
Register namespace :
 
    // app/autoload.php
    $loader->registerNamespaces(array(   
	 'IHQS' => __DIR__,
         // ...
    ));

Instantiate Bundle in your app/AppKernel.hpp file

    public function registerBundles()
    {
        $bundles = array(
            // ...
            new IHQS\WysiwygBundle\IHQSWysiwygBundle(),
        );
    }

## Configuration

Configure your application

    // app/config.yml
    ihqs_wysiwyg:
	selector: wysiwyg_editor	// default class for the textarea you want to improve
	editor:
		library: xxxx		// the editor you want. Default : markitup. Also available : ckeditor
		set: xxxx		// the settings you want to apply to the editor, meaning its configuration
		theme: xxxx		// the theme you want to apply to the editor

Add script to your templates at the bottom of your page (for faster page display).

    // anyfile.html.twig
    {% render "IHQSWysiwygBundle:Script:init" %}

## Available editors
 
"°" means it's default configuration

* markitup [°]
  * themes : default [°]
  * sets : markitup [°], default 

* ckeditor (being added)

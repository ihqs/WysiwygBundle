<?php

namespace IHQS\WysiwygBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Config\Definition\Processor;

use Symfony\Component\Finder\Finder;
use IHQS\WysiwygBundle\Editor\BaseEditor;

/**
 * Configuration of our Bundle
 *
 * @author  Antoine Berranger <antoine@ihqs.net>
 */
class IHQSWysiwygExtension extends Extension
{
	/**
     * Loading own configuration and overrinding it by user ones.
	 * Configuration defaults :
	 *  - selector : 'wysiwyg_editor'
	 *  - editor :
	 *    - library : 'markitup'
	 *    - set : 'default'
	 *    - theme : 'markitup'
     *
     * @author  Antoine Berranger <antoine@ihqs.net>
     *
     * @param	array            $config    An array of configuration settings
     * @param	ContainerBuilder $container A ContainerBuilder instance
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('wysiwyg.xml');

        $configuration  = new Configuration();
        $processor      = new Processor();
        $config         = $processor->process($configuration->getConfigTree($container->getParameter('kernel.debug')), $configs);


        if(isset($config['selector'])) { $container->setParameter('ihqs_wysiwyg.selector', $config['selector']); }

        if(isset($config['editor']))
        {
            if(isset($config['editor']['library'])) { $container->setParameter('ihqs_wysiwyg.editor.library', $config['editor']['library']); }
            if(isset($config['editor']['set']))     { $container->setParameter('ihqs_wysiwyg.editor.set',     $config['editor']['set']); }
            if(isset($config['editor']['theme']))   { $container->setParameter('ihqs_wysiwyg.editor.theme',   $config['editor']['theme']); }
        }

        $editor = new Definition(BaseEditor::factory(ucfirst($container->getParameter('ihqs_wysiwyg.editor.library'))));
        $container->setDefinition('ihqs_wysiwyg.editor', $editor);
    }
	
    /**
     * @see Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function getXsdValidationBasePath()
    {
        return null;
    }

    /**
     * @see Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function getNamespace()
    {
        return 'http://www.symfony.com/shemas/dic/symfony';
    }

    /**
     * @see Symfony\Component\DependencyInjection\Extension\ExtensionInterface
     */
    public function getAlias()
    {
        return "ihqs_wysiwyg";
    }
}
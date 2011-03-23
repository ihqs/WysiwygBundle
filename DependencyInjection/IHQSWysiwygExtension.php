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

class IHQSWysiwygExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('wysiwyg.xml');

        $configuration  = new Configuration();
        $processor      = new Processor();
        $config         = $processor->process($configuration->getConfigTree($container->getParameter('kernel.debug')), $configs);


        $container->setParameter('ihqs_wysiwyg.selector',       $config['selector']);
        $container->setParameter('ihqs_wysiwyg.editor.library', $config['editor']['library']);
        $container->setParameter('ihqs_wysiwyg.editor.set',     $config['editor']['set']);
        $container->setParameter('ihqs_wysiwyg.editor.theme',   $config['editor']['theme']);
    }

    public function getXsdValidationBasePath()
    {
        return null;
    }

    public function getNamespace()
    {
        return 'http://www.symfony.com/shemas/dic/symfony';
    }

    public function getAlias()
    {
        return "ihqs_wysiwyg";
    }
}
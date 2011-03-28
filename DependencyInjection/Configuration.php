<?php

namespace IHQS\WysiwygBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Configuration wanted by the bundle
 *
 * @author  Antoine Berranger <antoine@ihqs.net>
 */
class Configuration
{
	/**
     * Builds a configuration tree in order to ensure that yml configuration is well formatted
     *
     * @author  Antoine Berranger <antoine@ihqs.net>
     *
	 * @param	boolean	$kernelDebug	Debugging or not ?
	 *
     * @return  \Symfony\Component\Config\Definition\NodeInterface    A Tree build into an array
     */
    public function getConfigTree($kernelDebug)
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('ihqs_wysiwyg', 'array');

        $rootNode
            ->children()
                ->scalarNode('selector')
                ->end()
                ->arrayNode('editor')
                    ->children()
                        ->scalarNode('library')->cannotBeEmpty()->end()
                        ->scalarNode('set')->cannotBeEmpty()->end()
                        ->scalarNode('theme')->cannotBeEmpty()->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder->buildTree();
    }
}

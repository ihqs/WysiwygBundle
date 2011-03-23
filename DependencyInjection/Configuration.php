<?php

namespace IHQS\WysiwygBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder;

use Symfony\Component\Config\Definition\Builder\NodeBuilder;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

class Configuration
{
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

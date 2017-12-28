<?php

namespace TroubleticketBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('troubleticket');

        $rootNode
            ->children()
                ->arrayNode('sistech_api')
                    ->children()
                        ->scalarNode('url')->end()
                        ->integerNode('limit')->end()
                    ->end()
                ->end()
                ->integerNode('overdue_limit')
                ->end()
                ->integerNode('overdue_last_update')
                ->end()
                ->arrayNode('user_exception')
                    ->prototype('scalar')->end()
                ->end()
                ->arrayNode('toa')
                    ->children()
                        ->scalarNode('url')->end()
                        ->scalarNode('url_corp')->end()
                        ->scalarNode('user_toa_id')->end()
                        ->scalarNode('authversion')->end()
                        ->scalarNode('access_token')->end()
                        ->scalarNode('toa_api')->end()
                    ->end()
                ->end()
            ->end();
                
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}

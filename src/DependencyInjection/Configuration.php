<?php

/*
 * This file is part of the Scribe Batch Uploader Bundle.
 *
 * (c) Scribe Inc. <scribe@scribenet.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Scribe\FileUploaderBundle\DependencyInjection;

use Scribe\WonkaBundle\Component\DependencyInjection\AbstractConfiguration;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;

/**
 * Class Configuration
 */
class Configuration extends AbstractConfiguration
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('file_uploader');

        $rootNode
            ->children()
                ->scalarNode('base_filepath')
                    ->defaultValue('%kernel.root_dir%/../web/uploads/')
                    ->info('The path that uploads should be saved to')
                ->end()
                ->scalarNode('base_webpath')
                    ->defaultValue('/uploads/')
                    ->info('The web url the above files can be found at')
                ->end()
                ->integerNode('filecount_max')
                    ->defaultValue(100)
                    ->info('The max file count for uploads')
                ->end()
                ->integerNode('filesize_max')
                    ->defaultValue(1024)
                    ->info('The max filesize for uploaded files')
                ->end()
                ->enumNode('filesize_type')
                    ->defaultValue('mb')
                    ->values(['kb', 'mb', 'gb'])
                    ->info('The max filesize type')
                ->end()
                ->arrayNode('allowed_extensions')
                    ->prototype('scalar')->end()
                    ->defaultValue(['jpg', 'jpeg', 'png'])
                    ->info('An array of acceptable file extensions')
                ->end()
                ->arrayNode('image_processing')
                    ->addDefaultsIfNotSet()
                    ->info('Settings on how image processing is handled')
                    ->children()
                        ->booleanNode('enable_all')
                            ->defaultFalse()
                            ->info('Enable or disable all image processing sizes')
                        ->end()
                        ->arrayNode('thumbnails')
                            ->addDefaultsIfNotSet()
                            ->info('The configuration of thumbnails image processing')
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultTrue()
                                    ->info('Enable or disable this image processing size')
                                ->end()
                                ->scalarNode('folder')
                                    ->defaultValue('thumbnails')
                                    ->info('The name of the folder to put thumbnails into after processing')
                                ->end()
                                ->integerNode('width')
                                    ->min(10)
                                    ->defaultValue(480)
                                    ->info('The width (in pixels) to scale the image to')
                                ->end()
                                ->integerNode('height')
                                    ->min(10)
                                    ->defaultValue(480)
                                    ->info('The height (in pixels) to scale the image to')
                                ->end()
                                ->booleanNode('square')
                                    ->defaultTrue()
                                    ->info('Centers a square selection in the center of the longer axis and crops to produce a square image.')
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('small')
                            ->addDefaultsIfNotSet()
                            ->info('The configuration of small sized image processing')
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultTrue()
                                    ->info('Enable or disable this image processing size')
                                ->end()
                                ->scalarNode('folder')
                                    ->defaultValue('small')
                                    ->info('The name of the folder to put the small images into after processing')
                                ->end()
                                ->integerNode('width')
                                    ->min(10)
                                    ->defaultValue(1280)
                                    ->info('The width (in pixels) to scale the image to')
                                ->end()
                                ->integerNode('height')
                                    ->min(10)
                                    ->defaultValue(960)
                                    ->info('The height (in pixels) to scale the image to')
                                ->end()
                                ->booleanNode('square')
                                    ->defaultFalse()
                                    ->info('Centers a square selection in the center of the longer axis and crops to produce a square image.')
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('medium')
                            ->addDefaultsIfNotSet()
                            ->info('The configuration of medium sized image processing')
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultTrue()
                                    ->info('Enable or disable this image processing size')
                                ->end()
                                ->scalarNode('folder')
                                    ->defaultValue('medium')
                                    ->info('The name of the folder to put the medium images into after processing')
                                ->end()
                                ->integerNode('width')
                                    ->min(10)
                                    ->defaultValue(2560)
                                    ->info('The width (in pixels) to scale the image to')
                                ->end()
                                ->integerNode('height')
                                    ->min(10)
                                    ->defaultValue(1920)
                                    ->info('The height (in pixels) to scale the image to')
                                ->end()
                                ->booleanNode('square')
                                    ->defaultFalse()
                                    ->info('Centers a square selection in the center of the longer axis and crops to produce a square image.')
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('large')
                            ->addDefaultsIfNotSet()
                            ->info('The configuration of large size image processing')
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultTrue()
                                    ->info('Enable or disable this image processing size')
                                ->end()
                                ->scalarNode('folder')
                                    ->defaultValue('thumbnails')
                                    ->info('The name of the folder to put the large images into after processing')
                                ->end()
                                ->integerNode('width')
                                    ->min(10)
                                    ->defaultValue(3264)
                                    ->info('The width (in pixels) to scale the image to')
                                ->end()
                                ->integerNode('height')
                                    ->min(10)
                                    ->defaultValue(2448)
                                    ->info('The height (in pixels) to scale the image to')
                                ->end()
                                ->booleanNode('square')
                                    ->defaultFalse()
                                    ->info('Centers a square selection in the center of the longer axis and crops to produce a square image.')
                                ->end()
                            ->end()
                        ->end()
                        ->arrayNode('extreme')
                            ->addDefaultsIfNotSet()
                            ->info('The configuration of extremely large image processing')
                            ->children()
                                ->booleanNode('enabled')
                                    ->defaultTrue()
                                    ->info('Enable or disable this image processing size')
                                ->end()
                                ->scalarNode('folder')
                                    ->defaultValue('extreme')
                                    ->info('The name of the folder to put the extreme images into after processing')
                                ->end()
                                ->integerNode('width')
                                    ->min(10)
                                    ->defaultValue(4000)
                                    ->info('The width (in pixels) to scale the image to')
                                ->end()
                                ->integerNode('height')
                                    ->min(10)
                                    ->defaultValue(3000)
                                    ->info('The height (in pixels) to scale the image to')
                                ->end()
                                ->booleanNode('square')
                                    ->defaultFalse()
                                    ->info('Centers a square selection in the center of the longer axis and crops to produce a square image.')
                                ->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}

/* EOF */

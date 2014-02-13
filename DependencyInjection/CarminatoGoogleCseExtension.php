<?php

/**
 * This file is part of the CarminatoGoogleCseBundle
 *
 * (c) Willian Campideli Carminato <williancarminato@gmail.com>
 *
 */
namespace Carminato\GoogleCseBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;

/**
 * Initializes extension
 *
 * @author Willian Campideli Carminato <williancarminato@gmail.com>
 */
class CarminatoGoogleCseExtension extends Extension
{
    /**
     * Loads configuration
     *
     * @param array            $configs
     * @param ContainerBuilder $container
     * @return void
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('service.xml');
    }
}

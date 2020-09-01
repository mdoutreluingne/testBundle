<?php

namespace KnpU\LoremIpsumBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class KnpULoremIpsumExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        
        $configuration = $this->getConfiguration($configs, $container);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
        $config = $this->processConfiguration($configuration, $configs);
        var_dump($config);
        die;
        $definition = $container->getDefinition('knpu_lorem_ipsum.knpu_ipsum');
        $definition->setArgument(0, $config['unicorns_are_real']);
        $definition->setArgument(1, $config['min_sunshine']);
        
    }

    //Changement d'alias dans le fichier de configuration du bundle
    public function getAlias()
    {
        return 'knpu_lorem_ipsum';
    }
}
?>
<?php

namespace TroubleticketBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class TroubleticketExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $sistechApi = array();
        if (isset($config['sistech_api'])) {
            $sistechApi = (array)$config['sistech_api'];
        }
        $toaApi = array(); 
        if (isset($config['toa'])) {
        	$toaApi = (array)$config['toa'];
        }
        $overdueLimit = 0;
        if (isset($config['overdue_limit'])) {
            $overdueLimit = (integer)$config['overdue_limit'];
        }

        $userCrvException = 0;
        if (isset($config['user_exception'])) {
            $userCrvException = $config['user_exception'];
        }

        $container->setParameter('troubleticket_sistech_api', $sistechApi);
        $container->setParameter('troubleticket_overdue_limit', $overdueLimit);
        $container->setParameter('troubleticket_user_exception', $userCrvException);
        $container->setParameter('troubleticket_toa', $toaApi);

        $loader = new Loader\PhpFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.php');

    }
}

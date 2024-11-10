<?php

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use HBN\Plugin\System\PgRobotTag\Extension\PgRobotTag;

return new class() implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $config = (array) PluginHelper::getPlugin('system', 'pgrobottag');
                $dispatcher = $container->get(DispatcherInterface::class);
                $app = Factory::getApplication();

                $plugin = new PgRobotTag($dispatcher, $config);
                $plugin->setApplication($app);

                return $plugin;
            }
        );
    }
};

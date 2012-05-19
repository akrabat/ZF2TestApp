<?php

namespace Simple;

use Zend\Mvc\MvcEvent;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),            
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function onBootstrap(MvcEvent $e)
    {
        $application        = $e->getParam('application');
        $sharedEventManager = $application->events()->getSharedManager();
        $sharedEventManager->attach(__NAMESPACE__, 'dispatch', array($this, 'onModuleDispatched'));
    }

    public function onModuleDispatched($e)
    {
        // This is only called if a controller within our module has been dispatched

        // Set the layout template for every action in this module
        $viewModel = $e->getViewModel();
        $viewModel->setTemplate('layout/simple');
    }

}

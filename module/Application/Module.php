<?php

namespace Application;

use Zend\ModuleManager\ModuleManager,
    Zend\EventManager\StaticEventManager;

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
    
    public function onBootstrap($e)
    {
        $application    = $e->getParam('application');
        $serviceManager = $application->getServiceManager();
        $view           = $serviceManager->get('Zend\View\View');
        // $jsonStrategy   = $serviceManager->get('Zend\View\Strategy\JsonStrategy');
        // $view->events()->attach($jsonStrategy, 100);        

        // Store "layout" config to the layout view model.
        $config    = $serviceManager->get('config');
        $viewModel = $application->getMvcEvent()->getViewModel();
        $viewModel->config = $config->layout;        

    }

}

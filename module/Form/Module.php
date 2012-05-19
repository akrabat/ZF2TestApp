<?php

namespace Form;

use Zend\Form\View\HelperLoader as FormHelperLoader;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
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
        $application        = $e->getParam('application');
        $sharedEventManager = $application->events()->getSharedManager();
        $sharedEventManager->attach(__NAMESPACE__, 'dispatch', array($this, 'onModuleDispatched'));
    }

    public function onModuleDispatched($e)
    {
        $application    = $e->getParam('application');
        $serviceManager = $application->getServiceManager();
        $helperLoader   = $serviceManager->get('Zend\View\HelperLoader');

        $helperLoader->registerPlugins(new FormHelperLoader());
    }




}

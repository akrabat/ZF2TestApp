<?php

namespace Form;

use Zend\EventManager\Event,
    Zend\Module\Consumer\AutoloaderProvider,
    Zend\Module\Consumer\BootstrapListenerInterface,
    Zend\Form\View\HelperLoader as FormHelperLoader;

class Module implements AutoloaderProvider, BootstrapListenerInterface
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

    public function onBootstrap(Event $e)
    {
        $application = $e->getParam('application');
        $locator     = $application->getLocator();
        $this->helperLoader = $locator->get('Zend\View\HelperLoader');

        $application->events()->attach('route', array($this, 'onRouteFinish'));
    }

    public function onRouteFinish($e)
    {
        $matches    = $e->getRouteMatch();
        $controller = $matches->getParam('controller');
        $namespace  = substr($controller, 0, strpos($controller, '\\'));

        if ($namespace !== __NAMESPACE__) {
            return;
        }
        
        // only register form view helpers for this namespace
        $this->helperLoader->registerPlugins(new FormHelperLoader());
    }




}

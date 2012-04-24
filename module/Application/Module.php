<?php

namespace Application;

use Zend\Module\Manager,
    Zend\EventManager\StaticEventManager,
    Zend\Module\Consumer\AutoloaderProvider;

class Module implements AutoloaderProvider
{
    public function init(Manager $moduleManager)
    {
        $sharedEvents = $moduleManager->events()->getSharedCollections();
        $sharedEvents->attach('bootstrap', 'bootstrap', array($this, 'initializeView'), 100);
        $sharedEvents->attach('bootstrap', 'bootstrap', array($this, 'onBootstrap'));
    }

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
        $application = $e->getParam('application');
        $locator      = $application->getLocator();
        $view         = $locator->get('Zend\View\View');
        $jsonStrategy = $locator->get(
                     'Zend\View\Strategy\JsonStrategy');
        $view->events()->attach($jsonStrategy, 100);        
        // $application = $e->getParam('application');
        // $application->events()->attach('render', array($this, 'registerJsonStrategy'), 100);

    }

    public function initializeView($e)
    {
        $application  = $e->getParam('application');
        $basePath     = $application->getRequest()->getBasePath();
        $locator      = $application->getLocator();
        $renderer     = $locator->get('Zend\View\Renderer\PhpRenderer');

        $renderer->doctype('HTML5');
        $renderer->plugin('url')->setRouter($application->getRouter());
        $renderer->doctype()->setDoctype('HTML5');
        $renderer->plugin('basePath')->setBasePath($basePath);

        // // We can get at the view model here if we need to use logic to set
        // // the layout template for instance by doing this:
        // $viewModel = $application->getMvcEvent()->getViewModel();
        // $viewModel->setTemplate('layout/layout');

        $config      = $e->getParam('config');
        $container = $renderer->placeholder('view_config');
        foreach ($config->view as $var => $value) {
            $container->{$var} = $value;
        }
    }

    public function registerJsonStrategy($e)
    {
        $application  = $e->getTarget();
        $locator      = $application->getLocator();
        $view         = $locator->get('Zend\View\View');
        $jsonStrategy = $locator->get('Zend\View\Strategy\JsonStrategy');

        // Attach strategy, which is a listener aggregate, at high priority
        $view->events()->attach($jsonStrategy, 100);
    }    


}

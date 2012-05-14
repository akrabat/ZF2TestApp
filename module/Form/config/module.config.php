<?php
return array(
    // DI setup 
    'di' => array(
        'instance' => array(
            'Zend\View\Resolver\TemplatePathStack' => array(
                'parameters' => array(
                    'paths'  => array(
                        'form' => __DIR__ . '/../view',
                    ),
                ),
            ),

            // Setup the 'form' route
            'Zend\Mvc\Router\RouteStackInterface' => array(
                'parameters' => array(
                    'routes' => array(
                        'form' => array(
                            'type'    => 'Zend\Mvc\Router\Http\Segment',
                            'options' => array(
                                'route'    => '/form[/:action]',
                                'constraints' => array(
                                    'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                ),
                                'defaults' => array(
                                    'controller' => 'Form\Controller\FormController',
                                    'action'     => 'index',
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);


<?php
return array(
    'router' => array(
        'routes' => array(
            'simple' => array(
                'type'    => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/simple[/:action]',
                    'constraints' => array(
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'simple/simple',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),    
    'controller' => array(
        'classes' => array(
            'simple/simple' => 'Simple\Controller\SimpleController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'simple' => __DIR__ . '/../view',
        ),
    ),
);

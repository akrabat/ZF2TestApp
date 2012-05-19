<?php
return array(
    'router' => array(
        'routes' => array(
            'form' => array(
                'type'    => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/form[/:action]',
                    'constraints' => array(
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                    ),
                    'defaults' => array(
                        'controller' => 'form/form',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),    
    'controller' => array(
        'classes' => array(
            'form/form' => 'Form\Controller\FormController'
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'form' => __DIR__ . '/../view',
        ),
    ),
);

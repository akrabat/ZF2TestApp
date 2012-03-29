<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
    Zend\View\Model\ViewModel,
    Zend\View\Model\JsonModel;

class JsonController extends ActionController
{
    public function indexAction()
    {
        $matches[] = array('distance' => 10, 'playground' => array('a'=>1));
        $matches[] = array('distance' => 20, 'playground' => array('a'=>2));
        $matches[] = array('distance' => 30, 'playground' => array('a'=>3));

        $result = new JsonModel(array(
            'success'=>true,
            'results' => $matches,
        ));
        return $result;
    }

    public function anotherAction()
    {
        $matches[] = array('distance' => 10, 'playground' => array('a'=>1));
        $matches[] = array('distance' => 20, 'playground' => array('a'=>2));
        $matches[] = array('distance' => 30, 'playground' => array('a'=>3));

        $result = new ViewModel(array(
            'success'=>true,
            'results' => $matches,
        ));
        return $result;
    }
}

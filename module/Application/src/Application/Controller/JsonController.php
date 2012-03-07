<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
    Zend\View\Model\JsonModel;

class JsonController extends ActionController
{
    public function indexAction()
    {
        $result = new JsonModel(array(
            'success'=>true,
        ));
        return $result;
    }

}

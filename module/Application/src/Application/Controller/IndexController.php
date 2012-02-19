<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
    Zend\View\Model\ViewModel;

class IndexController extends ActionController
{
    public function indexAction()
    {
        $result = new ViewModel();
        return $result;
    }

}

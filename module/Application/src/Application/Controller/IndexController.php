<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
    Zend\View\Model\ViewModel;

class IndexController extends ActionController
{
    public function indexAction()
    {
        // retrieve param from route match
        $routeMatch = $this->getEvent()->getRouteMatch();
        $paramValue = $routeMatch->getParam('a_param');

        // retrieve param from request
        $request = $this->getEvent()->getRequest();
        $paramValue = $request->query()->get('a_param');

        $result = new ViewModel(array('a_param' => $paramValue));
        return $result;
    }

}

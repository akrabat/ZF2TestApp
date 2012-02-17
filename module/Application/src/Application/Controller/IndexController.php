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

    public function respondAction()
    {
        $response = $this->getResponse();
        $response->setStatusCode(501);
        return $response;
    }    

    function alternateAction()
    {
        // Alternative layout
        $e = $this->getEvent();
        $e->getViewModel()->setTemplate('layout/another');

        $sidebar = new ViewModel();
        $sidebar->setTemplate('layout/sidebar_one');
        $sidebar->setCaptureTo('sidebar');
        $e->getViewModel()->addChild($sidebar);


        $result = new ViewModel();
        $result->setTemplate('index/another-action');

        $comments = new ViewModel();
        $comments->setTemplate('index/child-comments');
        $comments->setCaptureTo('child-comments');
        $result->addChild($comments);

        return $result;
    }

}

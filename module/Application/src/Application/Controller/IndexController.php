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
    
    public function nolayoutAction()
    {
        $result = new ViewModel();
        $result->setTerminal(true);
        return $result;
    }

    public function addAnotherViewModelToLayoutAction()
    {
        // Alternative layout
        $this->layout()->setLayout('layout/another');

        $sidebar = new ViewModel();
        $sidebar->setTemplate('layout/sidebar_one');
        $sidebar->setCaptureTo('sidebar');

        $e = $this->getEvent();
        $e->getViewModel()->addChild($sidebar);

        return new ViewModel();
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
        $this->layout('layout/another');
        // $e = $this->getEvent();
        // $e->getViewModel()->setTemplate('layout/another');

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

        $comments = new ViewModel();
        $comments->setTemplate('index/another-child');
        $comments->setCaptureTo('another-child');
        $result->addChild($comments);

        return $result;
    }

}

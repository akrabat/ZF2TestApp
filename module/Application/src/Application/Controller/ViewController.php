<?php

namespace Application\Controller;

use Zend\Mvc\Controller\ActionController,
    Zend\View\Model\ViewModel;

class ViewController extends ActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }

    public function respondAction()
    {
        // Send a 501 response
        // Note that we don't need a action view script and the layout script isn't called

        $response = $this->getResponse();
        $response->setStatusCode(501);
        return $response;
    }   

    public function nolayoutAction()
    {
        // Turn off the layout. i.e. only render the view script.
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        return $viewModel;
    }
    
    public function differentLayoutAction()
    {
        // Use a different layout
        $this->layout()->setLayout('layout/different');
        
        return new ViewModel();
    }

    public function differentViewScriptAction()
    {
        // Use a different view script
        
        $viewModel = new ViewModel();
        $viewModel->setTemplate('view/arbitrary');
        return $viewModel;
    }

    public function addAnotherViewModelToLayoutAction()
    {
        // Use an alternative layout
        $this->layout()->setLayout('layout/another');

        // add an additional layout to the root view model (layout)
        $sidebar = new ViewModel();
        $sidebar->setTemplate('layout/footer_one');
        $sidebar->setCaptureTo('footer');

        $e = $this->getEvent();
        $e->getViewModel()->addChild($sidebar);

        return new ViewModel();
    }

    function multipleViewModelsAction()
    {
        // Alternative layout
        //$this->layout('layout/another');
        $this->layout()->setLayout('layout/another');

        $sidebar = new ViewModel();
        $sidebar->setTemplate('layout/footer_one');
        $sidebar->setCaptureTo('footer');
        $e = $this->getEvent();
        $e->getViewModel()->addChild($sidebar);


        $result = new ViewModel();
        $result->setTemplate('view/another-action');

        $comments = new ViewModel();
        $comments->setTemplate('view/child-comments');
        $comments->setCaptureTo('child-comments');
        $result->addChild($comments);

        $comments = new ViewModel();
        $comments->setTemplate('view/another-child');
        $comments->setCaptureTo('another-child');
        $result->addChild($comments);

        return $result;
    }

}

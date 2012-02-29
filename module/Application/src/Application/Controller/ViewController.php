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
        $this->layout('layout/different');
        
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
        $layoutViewModel = $this->layout();
        $layoutViewModel->setTemplate('layout/another');

        // add an additional layout to the root view model (layout)
        $sidebar = new ViewModel();
        $sidebar->setTemplate('layout/footer_one');
        $layoutViewModel->addChild($sidebar, 'footer');

        return new ViewModel();
    }

    function multipleViewModelsAction()
    {
        // Alternative layout
        $layoutViewModel = $this->layout();
        $layoutViewModel->setTemplate('layout/another');

        $sidebar = new ViewModel();
        $sidebar->setTemplate('layout/footer_one');
        $layoutViewModel->addChild($sidebar, 'footer');

        // set up action view model and associated child view models
        $result = new ViewModel();
        $result->setTemplate('view/another-action');

        $comments = new ViewModel();
        $comments->setTemplate('view/child-comments');
        $result->addChild($comments, 'child_comments');

        $comments = new ViewModel();
        $comments->setTemplate('view/another-child');
        $result->addChild($comments, 'another_child');

        return $result;
    }

}

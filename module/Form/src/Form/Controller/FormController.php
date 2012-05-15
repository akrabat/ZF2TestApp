<?php

namespace Form\Controller;

use Zend\Mvc\Controller\ActionController;
use Zend\View\Model\ViewModel;
use Form\Form\Mega as MegaForm;
use Form\Form\MegaInputFilter;

class FormController extends ActionController
{
    public function indexAction()
    {
        $form = new MegaForm();
        $form->get('submit')->setAttribute('label', 'Add');
        $form->prepare();

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setInputFilter(new MegaInputFilter());
            $form->setData($request->post());
            if ($form->isValid())
            {
                // success
                die('test');
            }
        }

        return array('form' => $form);
    }

}

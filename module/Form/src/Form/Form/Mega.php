<?php
namespace Form\Form;

use Zend\Form\Form;
use Zend\Form\Element;
use Zend\Captcha\Dumb as DumbCaptchaAdapter;

class Mega extends Form
{
    public function __construct()
    {
        parent::__construct();

        $this->setName('mega');
        $this->setAttribute('method', 'post');

        // hidden
        $this->add(array(
            'name' => 'one',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));

        // Text        
        $this->add(array(
            'name' => 'two',
            'attributes' => array(
                'type'  => 'text',
                'label' => 'Two',
            ),
        ));

        // Textarea
        $this->add(array(
            'name' => 'three',
            'attributes' => array(
                'type'  => 'textarea',
                'label' => 'Three',
            ),
        ));

        // MultiCheckbox
        $this->add(array(
            'name' => 'four',
            'attributes' => array(
                'type'  => 'multiCheckbox',
                'label' => 'Four',
                'options' => array(
                    'one' => '1',
                    'two' => '2',
                ),
            ),
        ));

        // Radio
        $this->add(array(
            'name' => 'five',
            'attributes' => array(
                'type'  => 'radio',
                'label' => 'Five',
                'options' => array(
                    'one' => '1',
                    'two' => '2',
                ),

            ),
        ));

        // Select
        $this->add(array(
            'name' => 'six',
            'attributes' => array(
                'type'  => 'select',
                'label' => 'Six',
                'options' => array(
                    'one' => '1',
                    'two' => '2',
                ),                
            ),
        ));

        // Captcha
        $captcha = new Element\Captcha('seven');
        $captcha->setCaptcha(new DumbCaptchaAdapter);
        $captcha->setAttribute('label', 'Seven');
        $this->add($captcha);

        // // Csrf
        $this->add(new Element\Csrf('csrf'));

        // Submit button
        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type'  => 'submit',
                'label' => 'Go',
            ),
        ));

    }
}

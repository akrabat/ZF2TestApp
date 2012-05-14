<?php

namespace Form\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;


class MegaInputFilter extends InputFilter
{
    public function __construct()
    {
        $factory = new InputFactory();

        $this->add($factory->createInput(array(
            'name'       => 'one',
            'required'   => true,
        )));    
 }
}
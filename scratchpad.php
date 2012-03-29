<?php
namespace My;
use Zend\Db\TableGateway\TableGateway;

function doSomething() 
{
}

$table = new TableGateway('album', $adapter);

// select
$rowset = $table->select(array('id' => 2));
$row = $rowset->current();

// update
$result = $table->update(
        array('name' => 'Adele'), 
        array('id' => 2));

// delete
$table->delete(array('id' => 2));
<?php

//require '../vendor/autoload.php';
require '../classes/Manufacturer.php';
require '../includes/util.php';

$manufacturer = new Manufacturer();

$name                 = cleanValue(getPost('name'));

if( $name== 'null' )
{
    echo "Please enter Manufacturer Name";
}
else {
    echo $manufacturer->insert(["name"=>$name]);
}


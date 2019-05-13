<?php

header('Access-Control-Allow-Origin: *');  
require '../classes/Inventory.php';

$inventory = new Inventory();
if(isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
    echo json_encode($inventory->select($_REQUEST['id']));
} else {
    echo json_encode($inventory->selectAll());
}

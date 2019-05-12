<?php

require '../classes/Manufacturer.php';

$manufacturer = new Manufacturer();

echo json_encode($manufacturer->selectAll());
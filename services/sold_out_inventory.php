<?php

require '../classes/Manufacturer.php';
require '../includes/util.php';

$model = new Model();

echo $model->soldOut($_REQUEST['id']);
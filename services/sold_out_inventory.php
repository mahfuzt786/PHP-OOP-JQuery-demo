<?php

require '../classes/Model.php';
require '../includes/util.php';

$model = new Model();

echo $model->soldOut($_REQUEST['id']);
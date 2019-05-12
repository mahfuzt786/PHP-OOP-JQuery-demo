<?php

require '../classes/Manufacturer.php';
require '../includes/util.php';

if(isset($_REQUEST['model_id']) && $_REQUEST['action'] == 'add') {
    echo DB::insert('sold_out_notifications', ["model_id" => $_REQUEST['model_id'], "status" => 0]);
}

if(isset($_REQUEST['model_id']) && $_REQUEST['action'] == 'update') {
    echo DB::update('sold_out_notifications', ["status" => 1], "model_id = $_REQUEST[model_id]");
}


if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'get') {

    $sql = "SELECT CONCAT(mf.name, ' ', m.name) AS name, son.model_id 
            FROM sold_out_notifications son LEFT JOIN model m ON son.model_id = m.id 
            LEFT JOIN manufacturer mf ON mf.id = m.manufacturer_id 
            WHERE son.status = 0";
    $result = DB::select_sql($sql);
    $sold_model_arr = [];
    foreach($result as $row) {
        $sold_model_arr[] = $row['name'];
        $result = DB::update('sold_out_notifications', ["status" => 1], "model_id = $row[model_id]");
    }
    
    echo json_encode($sold_model_arr);
    
    //echo "get notification";
}

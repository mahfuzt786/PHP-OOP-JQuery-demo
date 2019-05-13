<?php
require_once 'DB.php';

class Inventory {
    
    public function select($id) {
        $sql = "SELECT m.id AS id, m.name AS model_name, mf.name AS manufacturer_name, m.color AS color,
                m.year, m.registration_number, m.note, m.image_url, m.count AS count
                FROM manufacture mf LEFT JOIN models m ON mf.id = m.manufacturer_id
                WHERE m.id = '$id'";
        $result = DB::select_sql($sql);
        return $result;
    }

    public function selectAll(){
        $sql = "SELECT m.id AS id, m.name AS model_name, 
                        mf.name AS manufacturer_name, 
                        IF(m.count = NULL OR m.count = '0', 'Sold Out', m.count) AS count 
                        FROM models m INNER JOIN manufacture mf ON mf.id = m.manufacturer_id";
        $result = DB::select_sql($sql);
        return $result;
    }

    public function insert($columns = []) {

        $result = DB::insert($this->table, $columns);
        if($result) {
            return "success";
        } else {
            return "failure";
        }
    }
}

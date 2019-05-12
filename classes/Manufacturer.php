<?php

require_once 'DB.php';

class Manufacturer {
    private $table = 'manufacture';

    public function select() {

    }
    public function selectAll(){
        $result = DB::select($this->table, ["id", "name"]);
        return $result;
    }

    public function insert($columns = []) {

        $result = DB::select($this->table, ["name"], "name = '$columns[name]'");
        
        if(count($result) > 0) {
            return "duplicate";
        }

        $result = DB::insert($this->table, $columns);
        if($result) {
            return "success";
        } else {
            return "failure";
        }
    }
}

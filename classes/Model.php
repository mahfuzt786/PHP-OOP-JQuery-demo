<?php
require_once 'DB.php';

class Model {
    private $table = 'models';

    public function select() {

    }
    public function selectAll(){
        $result = DB::select($this->table);
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

    public function soldOut($id) {
        $result = DB::update($this->table, ["count" => 0], "id = $id");
        if($result) {
            return "success";
        } else {
            return "failure";
        }
    }
}

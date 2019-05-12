<?php

class DB {

    private static $dbase;

    private final function  __construct() {
        
    }

    private static function dbConnect() {
        $dbname = "alegra6_hdms";
        $server = "localhost";
        $dbusername   = 'root';
        $dbpassword   = '';
        try {
            DB::$dbase = new PDO("mysql:host=".$server.";dbname=".$dbname, $dbusername, $dbpassword);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public static function insert($table, $column = []) {
        DB::dbConnect();
        $col_list    = "";
        $val_list    = "";

        if(!empty($column)) {
            foreach($column as $col => $val) {
                $col_list .= "`$col`, ";
                $val_list .= "'$val', ";
            }
            
            $col_list = $col_list . "added_date, updated_date";
            $val_list = $val_list . "NOW(), NOW()";
        }

        $sql = "INSERT INTO $table ($col_list) VALUES ($val_list)";

        $sql_stmt = DB::$dbase->prepare($sql);
        return ($sql_stmt->execute());
    }

    public static function select_sql($sql) {
        DB::dbConnect();
        $sql_stmt = DB::$dbase->prepare($sql);
        $sql_stmt->execute();
        $result = $sql_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public static function select($table, $column = [], $where = "") {
        DB::dbConnect();
        $column_list    = "";
        
        if(!empty($column)) {
            foreach($column as $col) {
                $column_list .= "`$col`, ";
            }
            
            $column_list = trim($column_list, ", ");
        } else {
            $column_list = "*";
        }

        if($where === "") {
            $where = "1 = 1";
        }

        $sql = "SELECT $column_list FROM $table WHERE $where";
        $sql_stmt = DB::$dbase->prepare($sql);
        $sql_stmt->execute();
        $result = $sql_stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }    

    public static function update($table, $column = [], $where) {
        DB::dbConnect();
        $column_list    = "";

        if(!empty($column)) {
            foreach($column as $col => $val) {
                $column_list .= "$col = '$val', ";
            }
            $column_list = trim($column_list, ", ") . ", updated_date = NOW()";
        }

        if($where === "") {
            $where = "1 = 1";
        }

        $sql = "UPDATE $table SET $column_list WHERE $where";

        $sql_stmt = DB::$dbase->prepare($sql);
        return ($sql_stmt->execute());
    }

    
}

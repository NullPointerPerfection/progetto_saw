<?php

    session_start();

    include_once 'connessione.php';

    function get_info($table, $column, $condition){
         global $con;

        $query = "SELECT".$column." FROM ".$table." WHERE ".$condition.";";
        $res = mysqli_query($con, $query);
        return $res;
    }

    function insert_info($table, $elem){
        global $con;

        $query ="INSERT INTO ".$table." VALUES (";

        foreach ($elem as $value) {
            $query .= "\"".$value."\",";
        }
        $query = rtrim($query,','). ");";

        $res = mysqli_query($con,$query);

        if($res){
            return true;
        }else
            return false;
    }

?>
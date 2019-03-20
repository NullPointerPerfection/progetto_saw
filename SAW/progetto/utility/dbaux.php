<?php

    session_start();

    include_once 'connessione.php';

    function get_info($table, $column, $condition){
        global $con;

        $query = "SELECT".$column." FROM ".$table." WHERE ".$condition.";";
        $res = mysqli_query($con, $query);
        return $res;
    }

    function insert_info($table, $key, $elem){
        global $con;

        if(!isset($con) && empty($con)){
            $_SESSION['error'] = "connessione assente";
            header("Location: pagina_errore.php");
            exit();
        }

        $query ="INSERT INTO ".$table."(";

        foreach ($key as $value) $query .= $value.",";

        $query = rtrim($query, ",");
        $query .= ")"." VALUES (";

        foreach ($elem as $value) {
            $query .= "\"".$value."\",";
        }
        $query = rtrim($query,','). ");";
        stripslashes($query);

        //$_SESSION['error'] = $query;
        //header("Location: pagina_errore.php");
        //exit();

        $res = mysqli_query($con,$query);

        if($res){
            return true;
        }else
            return false;
    }

?>
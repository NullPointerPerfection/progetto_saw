<?php
    //session_start();
    include_once 'connessione.php';

    function search($value){
        global $con;
        $query = "SELECT *, MATCH(nome, descrizione) AGAINST('+".$value."' IN BOOLEAN MODE) AS attinenza FROM articoli WHERE MATCH(nome, descrizione) AGAINST('+".$value."' IN BOOLEAN MODE) ORDER BY attinenza DESC";
        return mysqli_query($con, $query);
    }

    function get_info($table, $column, $condition){
        global $con;
        if(empty($condition))
            $query = "SELECT ".$column." FROM ".$table.";";
        else
            $query = "SELECT ".$column." FROM ".$table." WHERE ".$condition.";";
        return mysqli_query($con, $query);
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
        $res = mysqli_query($con,$query);
        if($res){
            return true;
        }else
            return false;
    }
?>

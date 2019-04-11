<?php
    //session_start();
    include_once 'connessione.php';

    function search($value){
        global $con;

        Controllo_Connessione($con);

        $query = "SELECT *, MATCH(nome, descrizione) AGAINST('+".$value."' IN BOOLEAN MODE) AS attinenza FROM articoli WHERE MATCH(nome, descrizione) AGAINST('+".$value."' IN BOOLEAN MODE) ORDER BY attinenza DESC";
        return mysqli_query($con, $query);
    }

    function Query_select($table, $colonne, $condition){
        global $con;

        Controllo_Connessione($con);

        if(empty($condition))
            $query = "SELECT $colonne FROM $table;";
        else
            $query = "SELECT $colonne FROM $table WHERE $condition;";

        return mysqli_query($con, $query);
    }

    function Query_insert($table, $key, $elem){
        global $con;

        Controllo_Connessione($con);

        if(empty($key)){
            $query = "INSERT INTO $table VALUES (";
        }else{
            $query = "INSERT INTO $table(";
            foreach ($key as $value) $query .= "$value,";

            $query = rtrim($query, ",");
            $query .= ") VALUES (";
        }

        foreach ($elem as $value){
            $query .= "'$value',";
        }

        $query = rtrim($query, ",");
        $query .= ");";

        return mysqli_query($con,$query); //boolean
    }

    function Query_delete($table, $key, $value){
        global $con;

        Controllo_Connessione($con);

        $query = "DELETE FROM $table WHERE $key = '$value';";
        return mysqli_query($con, $query);


    }

    function Controllo_Connessione($connessione){
        if(!isset($connessione) && empty($connessione)){
            $_SESSION['error'] = "connessione assente, riprova più tardi";
            header("Location: pagina_errore.php");
            exit();
        }
    }
?>

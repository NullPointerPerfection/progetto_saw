<?php
    //session_start();
    include_once 'connessione.php';

    function search($value, $ordinamento, $segno, $categorie){
        global $con;

        Controllo_Connessione($con);

        if(empty($value)){
            $condition = "";
            foreach ($categorie as $aux)
                $condition .= "categoria = '$aux' OR ";
            $condition = substr( $condition, 0, -3);
            $condition .= " ORDER BY $ordinamento $segno";
            if(empty($categorie)) $_SESSION['cond'] = "non ci sono categorie";
            else $_SESSION['cond'] = $condition;
            return Query_select("articoli", '*', $condition, true);
        }

        $query = "SELECT *, MATCH(nome, descrizione) AGAINST('+$value' IN BOOLEAN MODE) AS attinenza FROM articoli WHERE (";
        $condition = "";
        foreach ($categorie as $aux)
            $condition .= "categoria = '$aux' OR ";
        $condition = substr( $condition, 0, -3);
        $query .= $condition;
        $query .= ") and MATCH(nome, descrizione) AGAINST('+$value' IN BOOLEAN MODE) ORDER BY $ordinamento $segno";
        $_SESSION['query'] = $query;
        return mysqli_query($con, $query);
    }

    function Query_select($table, $colonne, $condition, $order=false, $ordinamento=null, $join=null){
        global $con;

        Controllo_Connessione($con);
        if(!empty($join))
			$query = "SELECT $colonne FROM $table $join;";
		else{
			if(empty($ordinamento))
				if(empty($condition) && !$order)
					$query = "SELECT $colonne FROM $table;";
				else $query = "SELECT $colonne FROM $table WHERE $condition;";
			else $query = "SELECT $colonne FROM $table $ordinamento;";
		}
        $_SESSION['query'] = $query;
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

    function Query_delete($table, $key, $value, $condition = null){
        global $con;

        Controllo_Connessione($con);
		if(empty($condition))        $query = "DELETE FROM $table WHERE $key = '$value';";
			else $query = "DELETE FROM $table WHERE $condition;";
        return mysqli_query($con, $query);
    }

    function Query_update($table, $colonne, $value, $key, $elem){
        global $con;

        Controllo_Connessione($con);

        $query = "UPDATE $table SET ";

        foreach ($colonne as $indice => $var){
            $query .= "$var = '". $value["$indice"]."',";
        }

        $query = rtrim($query, ",");
        $query .= " WHERE $key = '$elem';";
        return mysqli_query($con,$query);

    }

    function Controllo_Connessione($connessione){
        if(!isset($connessione) && empty($connessione)){
            $_SESSION['error'] = "connessione assente, riprova più tardi";
            header("Location: pagina_errore.php");
            exit();
        }
    }
?>

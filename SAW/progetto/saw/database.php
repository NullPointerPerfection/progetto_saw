<?php

    class database
    {
        public $connessione;

        public function __construct($con)
        {
            $this->connessione = $con;
        }

        public function search($value){
            $query = "SELECT *, MATCH(nome, descrizione) AGAINST('".$value."') AS attinenza FROM articoli WHERE MATCH(nome, descrizione) AGAINST('".$value."') ORDER BY attinenza DESC";
            return mysqli_query($this->connessione, $query);
        }

        public function select($table, $column, $key, $value){
            $query = "SELECT".$column." FROM ".$table." WHERE '".$key."' = '".$value."';";
            $res = mysqli_query($this->connessione, $query);
            return $res;
        }

        public function insert($table, $key, $elem){
            if(!isset($this->connessione) && empty($this->connessione)){
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

            $res = mysqli_query($this->connessione,$query);

            if($res){
                return true;
            }else
                return false;
        }
    }
?>